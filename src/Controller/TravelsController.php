<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Travel;

class TravelsController extends AppController
{
    const SEARCH_FILTERS = [
        'SEARCH_ALL'                => 'all',
        'SEARCH_CLOSER_TO_EXPIRE'   => 'closer-to-expire',
        'SEARCH_EXPIRED_NEWEST'     => 'expired-newest',
        'SEARCH_OFFER_SHARE'        => 'offer-share',
        'SEARCH_ADMINS'             => 'admins',
    ];
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OriginLocalities', 'DestinationLocalities', 'Users', 'Operators'],
        ];
        $travels = $this->paginate($this->Travels);

        $this->set(compact('travels'));
    }

    /**
     * View method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $travel = $this->Travels->get($id, [
            'contain' => ['OriginLocalities', 'DestinationLocalities', 'Users', 'Operators', 'TravelsConversationsMeta', 'TravelsByEmail', 'ArchiveDriversTravels', 'Conversations'],
        ]);

        $this->set(compact('travel'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $travel = $this->Travels->newEmptyEntity();
        if ($this->request->is('post')) {
            $travel = $this->Travels->patchEntity($travel, $this->request->getData());
            if ($this->Travels->save($travel)) {
                $this->Flash->success(__('The travel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel could not be saved. Please, try again.'));
        }
        $originLocalities = $this->Travels->OriginLocalities->find('list', ['limit' => 200]);
        $destinationLocalities = $this->Travels->DestinationLocalities->find('list', ['limit' => 200]);
        $users = $this->Travels->Users->find('list', ['limit' => 200]);
        $operators = $this->Travels->Operators->find('list', ['limit' => 200]);
        $travelsConversationsMeta = $this->Travels->TravelsConversationsMeta->find('list', ['limit' => 200]);
        $travelsByEmail = $this->Travels->TravelsByEmail->find('list', ['limit' => 200]);
        $this->set(compact('travel', 'originLocalities', 'destinationLocalities', 'users', 'operators', 'travelsConversationsMeta', 'travelsByEmail'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $travel = $this->Travels->get($id, [
            'contain' => ['TravelsConversationsMeta', 'TravelsByEmail'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $travel = $this->Travels->patchEntity($travel, $this->request->getData());
            if ($this->Travels->save($travel)) {
                $this->Flash->success(__('The travel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel could not be saved. Please, try again.'));
        }
        $originLocalities = $this->Travels->OriginLocalities->find('list', ['limit' => 200]);
        $destinationLocalities = $this->Travels->DestinationLocalities->find('list', ['limit' => 200]);
        $users = $this->Travels->Users->find('list', ['limit' => 200]);
        $operators = $this->Travels->Operators->find('list', ['limit' => 200]);
        $travelsConversationsMeta = $this->Travels->TravelsConversationsMeta->find('list', ['limit' => 200]);
        $travelsByEmail = $this->Travels->TravelsByEmail->find('list', ['limit' => 200]);
        $this->set(compact('travel', 'originLocalities', 'destinationLocalities', 'users', 'operators', 'travelsConversationsMeta', 'travelsByEmail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $travel = $this->Travels->get($id);
        if ($this->Travels->delete($travel)) {
            $this->Flash->success(__('The travel has been deleted.'));
        } else {
            $this->Flash->error(__('The travel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    public function list($filter = self::SEARCH_FILTERS['SEARCH_AL']) {
        /*Travel::prepareFullConversations($this);
        
        $users_order = array(
            Travel::$SEARCH_ALL              => 'max(Travel.id)   desc',
            Travel::$SEARCH_CLOSER_TO_EXPIRE => 'min(Travel.date) asc,  max(Travel.id) desc',
            Travel::$SEARCH_EXPIRED_NEWEST   => 'max(Travel.date) desc, max(Travel.id) desc',
            Travel::$SEARCH_ADMINS           => 'max(Travel.id)   desc',
            Travel::$SEARCH_TESTERS          => 'max(Travel.id)   desc',
            Travel::$SEARCH_OPERATORS        => 'max(Travel.id)   desc',
            Travel::$SEARCH_MAYBE_SHARE      => 'min(Travel.date) asc,  max(Travel.id) desc',
        );*/
        
        $contain = Travel::$myCommonRelatedModels + 
                [
                    'Conversations' => ['sort'=>['Conversations.message_count' => 'DESC']],
                    'Conversations' =>['Drivers', 'ConversationsMeta']
                ];
        $conditions = ['User.role'=>'regular'];
        
        $querySettings = [];
        if($filter == self::SEARCH_FILTERS['SEARCH_ALL']) {
            $querySettings = [
                'contain' => $contain,
                'conditions' => $conditions,
                'order' => ['Travels.id' => 'DESC'],
                'limit'=>30
            ];
        } else if($filter == Travel::$SEARCH_CLOSER_TO_EXPIRE) {
            //$this->paginate = array('order'=>array('Travel.date'=>'ASC'));
            $this->paginate = array('order'=>array('Travel.date'=>'ASC', 'Travel.id' => 'DESC'));
            $conditions['Travel.date >='] = date('Y-m-d', mktime());
        } else if($filter == Travel::$SEARCH_EXPIRED_NEWEST) {
            //$this->paginate = array('order'=>array('Travel.date'=>'DESC'));
            $this->paginate = array('order'=>array('Travel.date'=>'DESC', 'Travel.id' => 'DESC'));
            $conditions['Travel.date <'] = date('Y-m-d', mktime());
        } else if($filter == Travel::$SEARCH_ADMINS) {
            $conditions['User.role'] = 'admin';
        } else if($filter == Travel::$SEARCH_TESTERS) {
            $conditions['User.role'] = 'tester';
        } else if($filter == Travel::$SEARCH_OPERATORS) {
            $conditions['User.role'] = 'operator';
        } else if($filter == Travel::$SEARCH_MAYBE_SHARE) {
            
            $conditions['User.shared_ride_offered'] = false;
            $conditions['Travel.people_count >='] = 1;
            $conditions['Travel.people_count <='] = 3;
        
            $today = date('Y-m-d', strtotime('today'));
            $conditions['Travel.date >='] = $today;
            $conditions['Travel.date <='] = date('Y-m-d', strtotime("$today + 60 days"));
            $conditions['Travel.created <='] = date('Y-m-d', strtotime("$today - 2 days"));
            
            $this->paginate = array('order'=>array('Travel.date'=>'ASC', 'Travel.id' => 'ASC'));
        }
        
        $this->set('users', $this->_paginateByUser($querySettings, $this->request->getQuery('page') | 1));
        
        $this->viewBuilder()->setTheme('AdminTheme')->setClassName('AdminTheme.AdminTheme');
    }
    
    private function _paginateByUser($querySettings, $page = 1) {
        
        $this->loadModel('Users');
        
        $this->paginate = [ 'Users' => [
                'fields'=>['id'],
                'conditions'=>['Users.date_last_created_request IS NOT' => null],
                'limit' => $querySettings['limit'],
                'order' => ['Users.date_last_created_request'=> 'DESC']
            ] 
        ];
        $users = $this->paginate($this->Users)->toArray();
        
        $usersIDs = [];
        foreach ($users as $u) {
            $usersIDs[] = $u->id;
        }
        $conditions = array_merge($querySettings['conditions'], array('Travels.user_id IN' => $usersIDs));
        
        $data = $this->Travels->find('all')
                ->contain($querySettings['contain'])
                ->where($conditions)
                //->group(['Travels.user_id'])
                ->order($querySettings['order']);
        
        $dataArray = $data->toArray();

        $result = array();
        $last_empty_index = 0;
        $map = array();
        foreach ($data as $travel){
            $user_id = $travel->user->id;
            if( !isset( $map[$user_id] ) )
                $map[$user_id] = $last_empty_index++;

            $result[ $map[$user_id] ][] = $travel;
        }

        return $result;
    }
    
}
