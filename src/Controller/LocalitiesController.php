<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Localities Controller
 *
 * @property \App\Model\Table\LocalitiesTable $Localities
 *
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocalitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provinces'],
        ];
        $localities = $this->paginate($this->Localities);

        $this->set(compact('localities'));
    }

    /**
     * View method
     *
     * @param string|null $id Locality id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locality = $this->Localities->get($id, [
            'contain' => ['Provinces'],
        ]);

        $this->set('locality', $locality);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locality = $this->Localities->newEmptyEntity();
        if ($this->request->is('post')) {
            $locality = $this->Localities->patchEntity($locality, $this->request->getData());
            if ($this->Localities->save($locality)) {
                $this->Flash->success(__('The locality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The locality could not be saved. Please, try again.'));
        }
        $provinces = $this->Localities->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('locality', 'provinces'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Locality id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locality = $this->Localities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locality = $this->Localities->patchEntity($locality, $this->request->getData());
            if ($this->Localities->save($locality)) {
                $this->Flash->success(__('The locality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The locality could not be saved. Please, try again.'));
        }
        $provinces = $this->Localities->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('locality', 'provinces'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Locality id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locality = $this->Localities->get($id);
        if ($this->Localities->delete($locality)) {
            $this->Flash->success(__('The locality has been deleted.'));
        } else {
            $this->Flash->error(__('The locality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
