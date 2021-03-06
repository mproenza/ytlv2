<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Conversation;

/**
 * Conversations Controller
 *
 * @property \App\Model\Table\ConversationsTable $Conversations
 * @method \App\Model\Entity\Conversation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConversationsController extends AppController
{
    const SEARCH_FILTERS = [
        'SEARCH_ALL'            => 'all',
        'SEARCH_NEW_MESSAGES'   => 'new-messages',
        'SEARCH_FOLLOWING'      => 'following',
        'SEARCH_DONE'           => 'done',
        'SEARCH_PAID'           => 'paid',
    ];
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Drivers', 'Travels', 'Users', /*'ChildConversations',*/ 'DiscountRides'],
        ];
        $conversations = $this->paginate($this->Conversations);

        $this->set(compact('conversations'));
    }

    /**
     * View method
     *
     * @param string|null $id Conversation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conversation = $this->Conversations->get($id, [
            'contain' => ['Drivers', 'Travels', 'Users', 'ChildConversations', 'DiscountRides', 'ConversationsMeta', 'ApiSyncQueue2driverConversations', 'ArchiveDriverTravelerConversations', 'ArchiveTravelsConversationsMeta', 'ConversationMessages', 'Testimonials'],
        ]);

        $this->set('conversation', $conversation);
    }
    
    public function admin($conversationID) {
        $conversation = $this->Conversations->get(
                $conversationID,
                [
                    'contain' => array_merge(Conversation::$myCommonRelatedModels, ['ConversationMessages', 'Testimonials', 'DiscountRides'])
                ]);
        
        $this->set('conversation', $conversation);
        
        $this->viewBuilder()->setTheme('AdminTheme')->setClassName('AdminTheme.AdminTheme');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conversation = $this->Conversations->newEmptyEntity();
        if ($this->request->is('post')) {
            $conversation = $this->Conversations->patchEntity($conversation, $this->request->getData());
            if ($this->Conversations->save($conversation)) {
                $this->Flash->success(__('The conversation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conversation could not be saved. Please, try again.'));
        }
        $drivers = $this->Conversations->Drivers->find('list', ['limit' => 200]);
        $travels = $this->Conversations->Travels->find('list', ['limit' => 200]);
        $users = $this->Conversations->Users->find('list', ['limit' => 200]);
        $childConversations = $this->Conversations->ChildConversations->find('list', ['limit' => 200]);
        $discountRides = $this->Conversations->DiscountRides->find('list', ['limit' => 200]);
        $this->set(compact('conversation', 'drivers', 'travels', 'users', 'childConversations', 'discountRides'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conversation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conversation = $this->Conversations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conversation = $this->Conversations->patchEntity($conversation, $this->request->getData());
            if ($this->Conversations->save($conversation)) {
                $this->Flash->success(__('The conversation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conversation could not be saved. Please, try again.'));
        }
        $drivers = $this->Conversations->Drivers->find('list', ['limit' => 200]);
        $travels = $this->Conversations->Travels->find('list', ['limit' => 200]);
        $users = $this->Conversations->Users->find('list', ['limit' => 200]);
        $childConversations = $this->Conversations->ChildConversations->find('list', ['limit' => 200]);
        $discountRides = $this->Conversations->DiscountRides->find('list', ['limit' => 200]);
        $this->set(compact('conversation', 'drivers', 'travels', 'users', 'childConversations', 'discountRides'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conversation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conversation = $this->Conversations->get($id);
        if ($this->Conversations->delete($conversation)) {
            $this->Flash->success(__('The conversation has been deleted.'));
        } else {
            $this->Flash->error(__('The conversation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    /**
     * ADMIN
     */
    
    public function list($filter) {
        
        if($filter == self::SEARCH_FILTERS['SEARCH_NEW_MESSAGES']) {
            /**
             * Las conversaciones que no se ha marcado ninguno como leido y al menos tiene un mensaje
             * 
             * OR
             * 
             * Las conversaciones que tienen leídos, pero hay más mensajes que leídos
             */
            $conditions['OR'] = [
               [
                   'AND'=>[
                        'ConversationsMeta.read_entry_count IS' => null,
                        'Conversations.message_count >' => 0
                    ]
                ],
                [
                    'AND'=>[
                        'ConversationsMeta.read_entry_count IS NOT ' => null,
                        'Conversations.message_count > ConversationsMeta.read_entry_count'
                    ]
                ]
            ];
            $this->paginate = [
                'contain'=> Conversation::$myCommonRelatedModels,
                'conditions' => $conditions,
                'order'=>['Conversations.due_date'=>'ASC'],
            ];
                    
        } else if($filter == self::SEARCH_FILTERS['SEARCH_FOLLOWING']) {
            $this->paginate = [
                'contain'=> Conversation::$myCommonRelatedModels,
                'conditions'=>['ConversationsMeta.following' => true, 'ConversationsMeta.archived' => false],
                'order'=>[
                    'Conversations.due_date'=>'ASC',
                    'Conversations.user_id'=>'ASC'],
                'limit'=>50
            ];
        } else if($filter == self::SEARCH_FILTERS['SEARCH_DONE']) {
            $this->paginate = [
                'contain'=> Conversation::$myCommonRelatedModels,
                'conditions'=>['ConversationsMeta.state' => Conversation::STATES['DONE'], 'ConversationsMeta.archived' => false],
                'order'=>['Conversations.due_date'=>'DESC'],
                'limit'=>100
            ];
            /*$this->paginate = array('order'=>array('DriverTravel.travel_date'=>'DESC'), 'limit'=>100);// Paginacion grande para ver todos los viajes realizados y hacer resumenes de cobros de comisiones facilmente sin tener que cambiar de paginas
            $conditions['TravelConversationMeta.state'] = DriverTravelerConversation::$STATE_TRAVEL_DONE;
            $conditions['TravelConversationMeta.archived'] = 0; //Que no este archivado*/
        } else if($filter == self::SEARCH_FILTERS['SEARCH_PAID']) {
            $this->paginate = [
                'contain'=> Conversation::$myCommonRelatedModels,
                'conditions'=>['ConversationsMeta.state' => Conversation::STATES['PAID']],
                'order'=>['Conversations.due_date'=>'DESC'],
                'limit'=>50
            ];
            /*$this->paginate = array('order'=>array('DriverTravel.travel_date'=>'DESC'), 'limit'=>50);
            $conditions['TravelConversationMeta.state'] = DriverTravelerConversation::$STATE_TRAVEL_PAID;*/
        } else if($filter == DriverTravel::$SEARCH_DIRECT_MESSAGES) {
            $this->paginate = array('order'=>array('DriverTravel.travel_date'=>'DESC'), 'limit'=>50);
            $conditions['DriverTravel.notification_type'] = DriverTravel::$NOTIFICATION_TYPE_DIRECT_MESSAGE;
        } else if($filter == DriverTravel::$SEARCH_PINNED) {
            $this->paginate = array('order'=>array('DriverTravel.travel_date'=>'ASC'), 'limit'=>50);
            $conditions['TravelConversationMeta.flag_type !='] = null;
        } else if($filter == DriverTravel::$SEARCH_ARCHIVED) {
            $this->paginate = array('order'=>array('DriverTravel.travel_date'=>'ASC'));
            $conditions['TravelConversationMeta.archived'] = 1;
        }
        else if($filter == DriverTravel::$SEARCH_DISCOUNT_OFFER) {
            $this->paginate = array('order'=>array('DriverTravel.travel_date'=>'ASC'));
            $conditions['DriverTravel.notification_type'] = DriverTravel::$NOTIFICATION_TYPE_DISCOUNT_OFFER_REQUEST;
        }
        
        /*if(AuthComponent::user('role') == 'operator')
            $this->DriverTravel->Behaviors->load('Operations.OperatorScope', array('match'=>'Driver.operator_id', 'action'=>'C')); // Restringir ver conversaciones*/
        
        $conversations = $this->paginate($this->Conversations);
        
        $this->set('conversations', $conversations);
        
        $this->viewBuilder()->setTheme('AdminTheme')->setClassName('AdminTheme.AdminTheme');
    }
    
    public function notifyDriver($travelID, $notificationType = 'M') {
        
        // ONLY AJAX IS ALLOWED
        if(!$this->request->is('ajax')) throw new MethodNotAllowedException();
            
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $data = $this->data;
        } else if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
        }

        $driverId = $data['Driver']['driver_id'];

        $this->Driver->id = $driverId;
        if (!$this->Driver->exists()) {
            throw new NotFoundException('Chofer inválido.');
        }
        $this->Travel->id = $travelID;
        if (!$this->Travel->exists()) {
            throw new NotFoundException('Viaje inválido.');
        }

        $driver = $this->Driver->findById($driverId);
        $travel = $this->Travel->findById($travelID);

        $config = null;

        // Dump all the data that comes from TravelConversationMeta in custom variables
        if( isset ($data['TravelConversationMeta'])) {
            $config = array('custom_variables'=>$data['TravelConversationMeta']);
            $config['template'] = 'arranged_travel';
        }

        $datasource = $this->Driver->getDataSource();
        $datasource->begin();            

        $this->TravelLogic->prepareForSendingToDrivers('Travel');
        $OK = $this->TravelLogic->sendTravelToDriver($driver, $travel, $notificationType, $config);
        if(is_array($OK) && isset ($OK['success']) && $OK['success']) {
            $conversation_id = $OK['conversation_id'];
            $OK = true;
        }

        // Save TravelConversationMeta
        if( isset ($data['TravelConversationMeta'])) {
            $data['TravelConversationMeta']['conversation_id'] = $conversation_id;

            // Hay que ponerle following a los viajes que son arreglados
            if(isset ($data['TravelConversationMeta']['arrangement']) && !empty($this->request->data['TravelConversationMeta']['arrangement'])) 
                    $data['TravelConversationMeta']['following'] = true;

            $OK = $this->TravelConversationMeta->save($data);
        }

        if($OK) {
            $datasource->commit();
        } else {
            $datasource->rollback();
            $this->setErrorMessage('Error notificando el viaje.');
        }
        
        if ($this->request->is('ajax')) {
            $driverName = $driver['Driver']['username'];
            if(isset ($driver['DriverProfile']) && !empty ($driver['DriverProfile']) && !empty($driver['DriverProfile']['driver_name'])) 
                $driverName = $driver['DriverProfile']['driver_name'];
            
            echo json_encode(array('object'=>array(
                'conversation_id'=>$conversation_id, 
                'driver_email'=>$driver['Driver']['username'],
                'notification_type'=>$notificationType,
                'driver_name'=>$driverName)));
            return;
        }
        
        return $this->redirect($this->referer().'#travel-'.$travelID);
    }
}
