<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * DriversUnapproved Controller
 *
 * @property \App\Model\Table\DriversUnapprovedTable $DriversUnapproved
 *
 * @method \App\Model\Entity\DriversUnapproved[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DriversUnapprovedController extends AppController
{

     public function beforeRender(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);

    }
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
        $driversUnapproved = $this->paginate($this->DriversUnapproved);

        $this->set(compact('driversUnapproved'));
        $this->viewBuilder()->setTheme('AdminYuniTheme')->setClassName('AdminYuniTheme.AdminYuniTheme');
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
        $driversUnapproved = $this->DriversUnapproved->get($id, [
            'contain' => ['Provinces'],
        ]);

        $this->set('driversUnapproved', $driversUnapproved);
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
        $driversUnapproved = $this->DriversUnapproved->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driversUnapproved = $this->DriversUnapproved->patchEntity($driversUnapproved, $this->request->getData());
            if ($this->DriversUnapproved->save($driversUnapproved)) {
                $this->Flash->success(__('The drivers profile has been saved.'));
                  $this->render('/DriversUnapproved/ajax/for_approval.php');
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drivers profile could not be saved. Please, try again.'));
        }
        //$drivers = $this->DriversProfiles->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('driversUnapproved'));
        $this->viewBuilder()->setTheme('AdminYuniTheme')->setClassName('AdminYuniTheme.AdminYuniTheme');
        $this->viewBuilder()->enableAutoLayout(false);
        $this->autoRender=false;

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

    public function forApproval($id){
        $this->Provinces = TableRegistry::getTableLocator()->get('Provinces');//La annotation no funciona
        $this->Localities = TableRegistry::getTableLocator()->get('Localities');//La annotation no funciona
        $this->DriversProfiles = TableRegistry::getTableLocator()->get('DriversProfiles');//La annotation no funciona
        $this->Drivers = TableRegistry::getTableLocator()->get('Drivers');//La annotation no funciona
        if ($this->request->is(['post','put'])) {
            $driversUnapproved = $this->DriversUnapproved->newEmptyEntity();
            $driver = $this->Drivers->newEmptyEntity();
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());
            $driverprofile = $this->DriversProfiles->newEmptyEntity();
            $driverprofile = $this->DriversProfiles->patchEntity($driverprofile, $this->request->getData());
            /*Driver Completion*/
            $driver['description']=$this->request->getData('car_model')." - ".$this->request->getData('slug');
            $driver['travel_count']=0;
            /*Driver Profile Completion*/
            $driverprofile['driver_nick']=$this->request->getData('slug');
            $driverprofile['driver_code']=$this->request->getData('code');
            $driverprofile['description_es']='{"pics": [ {"src": "<'.$this->request->getData('image1_patho').'>", "title": "<'.$this->request->getData('img1_title_es').'>"},{"src": "<'.$this->request->getData('image2_patho').'>", "title": "<'.$this->request->getData('img2_title_es').'>"},{"src": "<'.$this->request->getData('image3_patho').'>", "title": "<'.$this->request->getData('img3_title_es').'>"}]   }';
            $driverprofile['description_en']='{"pics": [ {"src": "<'.$this->request->getData('image1_patho').'>", "title": "<'.$this->request->getData('img1_title_en').'>"},{"src": "<'.$this->request->getData('image2_patho').'>", "title": "<'.$this->request->getData('img2_title_en').'>"},{"src": "<'.$this->request->getData('image3_patho').'>", "title": "<'.$this->request->getData('img3_title_en').'>"}]   }';

            //debug($driver);
            //die();
            //die(print_r($this->request->getData()));
            $driversUnapproved = $this->DriversUnapproved->patchEntity($driversUnapproved, $this->request->getData(),[
                'associated' => [
                    'Provinces'
                ]]);
            //debug($driversProfile); die();
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('Se ha almacenado la informacion del chofer.'));

                if ($this->DriversProfiles->save($driverprofile)) {
                    $this->Flash->success(__('Se ha almacenado la información del perfil.'));

                    return $this->redirect(['controller'=>'drivers', 'action'=>'index']);//Hay que crear una pagina para esto
                }
                $this->Flash->error(__('No se ha podido almacenar la informacion del perfil'));


            }
            $this->Flash->error(__('No se ha podido almacenar la informacion del chofer'));
        }
        $this->set('localities', $this->Localities->getAsList());
        $this->DriversUnapproved = TableRegistry::getTableLocator()->get('DriversUnapproved');//La annotation no funciona
        $driversUnapproved = $this->DriversUnapproved->get($id);
        $provinces = $this->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('driversUnapproved','provinces'));

        $this->viewBuilder()->setTheme('AdminYuniTheme')->setClassName('AdminYuniTheme.AdminYuniTheme');

    }
}
