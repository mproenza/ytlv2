<?php
namespace Peer2PeerMessages\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class Peer2PeerMessagesComponent extends Component {
    
    /**
     * @param array $aliasSenderRole the alias of the role of the peer that sends this messahe, ie. the role it plays in the conversation (driver, traveler, ...). 
     * 
     * 
     * @throws NotFoundExcetion when a conversation with $conversationID does not exist
     */
    public function sendMessage_PeerA_to_PeerB($aliasSenderRole, $conversationID, $messageText, array $messageAttachments = [], array $settings = []) {
        
        $ConversationsTable = TableRegistry::getTableLocator()->get('Conversations');
        $MessagesTable = TableRegistry::getTableLocator()->get('ConversationMessages');
        $AttachmentsTable = TableRegistry::getTableLocator()->get('ConversationMessageAttachments');
        
        $conversation = $ConversationsTable->get($conversationID);
        
        if($conversation == null) throw new NotFoundException();
        
        // Create and save new message
        $message = $MessagesTable->newEmptyEntity();
        $message = $MessagesTable->patchEntity($message, 
                [
                    'conversation_id'=> $conversationID,
                    'response_by'=> $aliasSenderRole,
                    'message_text'=> $messageText,
                ]
        );
        if(!$MessagesTable->save($message)) throw new NotFoundException ();
        
        // Create and save attachments
        $attachments = [];
        foreach ($messageAttachments as $att) {
            $attachment = $AttachmentsTable->newEmptyEntity();
            $attachment = $AttachmentsTable->patchEntity($attachment, $att);
            
            $attachments[] = $attachment;
        }
        if(!$AttachmentsTable->saveMany($attachments)) throw new NotFoundException ();
        
        $eventAfterSend = new \Cake\Event\Event('Model.ConversationMessages.afterSend', $this, [
                'message' => $message,
                'attachments' => $attachments
            ]);
        $this->getEventManager()->dispatch($eventAfterSend);
        
    }
    
}
