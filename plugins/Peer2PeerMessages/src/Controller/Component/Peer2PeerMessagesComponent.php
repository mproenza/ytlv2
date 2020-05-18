<?php
namespace Peer2PeerMessages\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

use Cake\ORM\Entity;

class Peer2PeerMessagesComponent extends Component {
    
    public function __construct(ComponentRegistry $registry, array $config = [])
    {
        $defaults = [
            'peer1_id_field' => 'peer1_id',
            'peer2_id_field' => 'peer2_id',
            'peer1_role' => 'peer1',
        ];
        $config = array_merge($defaults, $config);
        
        parent::__construct($registry, $config);
    }
    
    /**
     * @param array $settings
     * Options:
     * 
     * 
     * 
     * @throws NotFoundExcetion when a conversation with $conversationID does not exist
     */
    public function sendMessage_PeerA_to_PeerB($conversationID, $message) {
        
        $ConversationsTable = TableRegistry::getTableLocator()->get('Conversations');
        $MessagesTable = TableRegistry::getTableLocator()->get('ConversationMessages');
        $AttachmentsTable = TableRegistry::getTableLocator()->get('ConversationMessageAttachments');
        
        $conversation = $ConversationsTable->get($conversationID);
        
        if($conversation == null) throw new NotFoundException();
        
        // Create and save new message
        $messageModel = $MessagesTable->newEmptyEntity();
        $messageModel = $MessagesTable->patchEntity($messageModel, 
                [
                    'conversation_id'=> $conversationID,
                    'response_by'=> $this->getConfig('peer1_role'),
                    'message_text'=> $message['text'],
                ]
        );
        if(!$MessagesTable->save($messageModel)) throw new NotFoundException ();
        
        // Create and save attachments
        $attachments = [];
        foreach ($message['attachments'] as $att) {
            $attachment = $AttachmentsTable->newEmptyEntity();
            $attachment = $AttachmentsTable->patchEntity($attachment, $att);
            
            $attachments[] = $attachment;
        }
        if(!$AttachmentsTable->saveMany($attachments)) throw new NotFoundException ();
        
        $eventAfterSend = new \Cake\Event\Event('Model.ConversationMessages.afterSend', $this, [
                'conversation' => $conversation,
                'message' => $messageModel,
                'attachments' => $attachments
            ]);
        $this->getEventManager()->dispatch($eventAfterSend);
        
    }
    
    /**
     * @param $data: The additional data you want to put in the DB. The entity Conversation will be patched with this additional data
     * ex. due_date, travel_id, etc.
     */
    public function openNewConversation(Entity $peer1, Entity $peer2, array $data = []) {
        
        $ConversationsTable = TableRegistry::getTableLocator()->get('Conversations');
        
        $basicData = [
            $this->getConfig('peer1_id_field') => $peer1->id,
            $this->getConfig('peer2_id_field') => $peer2->id,
        ];
        
        $conversationData = array_merge($basicData, $data);
        
        $conversation = $ConversationsTable->newEmptyEntity();
        $conversation = $ConversationsTable->patchEntity($conversation, $conversationData);
        
        if(!$ConversationsTable->save($conversation)) throw new NotFoundException ();
        
        return $conversation;
        
        /*$eventAfterSend = new \Cake\Event\Event('Model.Conversation.afterCreated', $this, [
                'conversation' => $conversation
            ]);
        $this->getEventManager()->dispatch($eventAfterSend);*/
    }
    
}
