<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * DriversProfiles Controller
 *
 * @property \App\Model\Table\DriversProfilesTable $DriversProfiles
 * @property \App\Model\Table\DriversUnapprovedTable $DriversUnapproved
 *
 * @method \App\Model\Entity\DriversProfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DriversProfilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Drivers'],
        ];
        $driversProfiles = $this->paginate($this->DriversProfiles);

        $this->set(compact('driversProfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Drivers Profile id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $driversProfile = $this->DriversProfiles->get($id, [
            'contain' => ['Drivers'],
        ]);

        $this->set('driversProfile', $driversProfile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $driversProfile = $this->DriversProfiles->newEmptyEntity();
        if ($this->request->is('post')) {
            $driversProfile = $this->DriversProfiles->patchEntity($driversProfile, $this->request->getData());
            if ($this->DriversProfiles->save($driversProfile)) {
                $this->Flash->success(__('The drivers profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drivers profile could not be saved. Please, try again.'));
        }
        $drivers = $this->DriversProfiles->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('driversProfile', 'drivers'));
    }
    
    /**
     * Add new profile method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function newProfile()
    {        
        $this->DriversUnapproved = TableRegistry::getTableLocator()->get('DriversUnapproved');//La annotation no funciona
        $this->Provinces = TableRegistry::getTableLocator()->get('Provinces');//La annotation no funciona
        $driversProfile = $this->DriversUnapproved->newEmptyEntity();
        if ($this->request->is('post')) {
            
            //die(print_r($this->request->getData()));
            $driversProfile = $this->DriversUnapproved->patchEntity($driversProfile, $this->request->getData(),[
    'associated' => [        
        'Provinces'
    ]]);
            //debug($driversProfile); die();
            if ($this->DriversUnapproved->save($driversProfile)) {
                $this->Flash->success(__('Se ha almacenado su información. Espere nuestra notificación'));

                return $this->redirect('/');//Hay que crear una pagina para esto
            }
            $this->Flash->error(__('The drivers profile could not be saved. Please, try again.'));
        }
        $provinces = $this->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('driversProfile', 'provinces'));
        
        $this->viewBuilder()->setTheme('CubaTheme')->setClassName('CubaTheme.CubaTheme');
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Drivers Profile id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $driversProfile = $this->DriversProfiles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driversProfile = $this->DriversProfiles->patchEntity($driversProfile, $this->request->getData());
            if ($this->DriversProfiles->save($driversProfile)) {
                $this->Flash->success(__('The drivers profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drivers profile could not be saved. Please, try again.'));
        }
        $drivers = $this->DriversProfiles->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('driversProfile', 'drivers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Drivers Profile id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $driversProfile = $this->DriversProfiles->get($id);
        if ($this->DriversProfiles->delete($driversProfile)) {
            $this->Flash->success(__('The drivers profile has been deleted.'));
        } else {
            $this->Flash->error(__('The drivers profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
