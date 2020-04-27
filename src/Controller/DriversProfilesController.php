<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DriversProfiles Controller
 *
 * @property \App\Model\Table\DriversProfilesTable $DriversProfiles
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
