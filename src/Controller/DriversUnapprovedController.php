<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Util\PathUtil;

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
    
    
    
    public function apply() {
        
        $this->DriversUnapproved = TableRegistry::getTableLocator()->get('DriversUnapproved');//La annotation no funciona
        $driversProfile = $this->DriversUnapproved->newEmptyEntity();
        
        if ($this->request->is('post')) {
            
            $driversProfile = $this->DriversUnapproved->patchEntity($driversProfile, $this->request->getData(),[
                'associated' => [        
                    'Provinces'
                ]]);
            
            if ($this->DriversUnapproved->save($driversProfile)) {
                $this->Flash->success(__('Se ha almacenado su información. Espere nuestra notificación'));

                return $this->redirect(['action'=>'thanks', $this->request->getData('full_name')]);
            }
            
            $this->Flash->error(__('The drivers profile could not be saved. Please, try again.'));
        }
        
        $this->set(compact('driversProfile'));
        
        $this->viewBuilder()->setTheme('CubaTheme')->setClassName('CubaTheme.CubaTheme');
        
    }
    
    public function thanks($name) {
        $this->set(compact('name'));
        $this->viewBuilder()->setTheme('CubaTheme')->setClassName('CubaTheme.CubaTheme');
    }

    public function approve($id) {
        if ($this->request->is(['post','put'])) {
            
            $this->DriversProfiles = TableRegistry::getTableLocator()->get('DriversProfiles');//La annotation no funciona
            $this->Drivers = TableRegistry::getTableLocator()->get('Drivers');//La annotation no funciona
            
            // DRIVER
            $driver = $this->Drivers->newEmptyEntity();
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData(),[
                'associated' => [
                    'Localities'
                ]]);            

            $driver->description = $this->request->getData('car_model')." - ".$this->request->getData('slug');
            $driver->travel_count = 0;
            
            // DRIVER PROFILE
            $driverprofile = $this->DriversProfiles->newEmptyEntity();
            $driverprofile = $this->DriversProfiles->patchEntity($driverprofile, $this->request->getData());
            
            $img1Fullpath = PathUtil::getFullPath($this->request->getData('image1_path'));
            $img2Fullpath = PathUtil::getFullPath($this->request->getData('image2_path'));
            $img3Fullpath = PathUtil::getFullPath($this->request->getData('image3_path'));
            
            $driverprofile->featured_img_url = $img1Fullpath;
            
            // TODO: Esto de las 'descriptions' se puede hacer con un JsonType mejor
            $driverprofile->description_es = json_encode([
                    'pics' => [
                        [
                            'src' => $img1Fullpath,
                            'title' => $this->request->getData('img1_title_es')
                        ],
                        [
                            'src' => $img2Fullpath,
                            'title' => $this->request->getData('img2_title_es')
                        ],
                        [
                            'src' => $img3Fullpath,
                            'title' => $this->request->getData('img3_title_es')
                        ]
                    ]
                ]);
            $driverprofile->description_en = json_encode([
                    'pics' => [
                        [
                            'src' => $img1Fullpath,
                            'title' => $this->request->getData('img1_title_en')
                        ],
                        [
                            'src' => $img2Fullpath,
                            'title' => $this->request->getData('img2_title_en')
                        ],
                        [
                            'src' => $img3Fullpath,
                            'title' => $this->request->getData('img3_title_en')
                        ]
                    ]
                ]);
            
            if ($this->Drivers->save($driver)) {
                
                $driverprofile->driver_id = $driver->id;

                if ($this->DriversProfiles->save($driverprofile)) {
                    $this->Flash->success(__('Se ha almacenado la información del perfil.'));
                    return $this->redirect(['controller'=>'drivers', 'action'=>'index']);
                }
                
                $this->Flash->error(__('No se ha podido almacenar la informacion del perfil'));
            }
            
            $this->Flash->error(__('No se ha podido almacenar la informacion del chofer'));
        }
        
        $driverUnapproved = $this->DriversUnapproved->get($id);
        $this->set(compact('driverUnapproved'));

        $this->viewBuilder()->setTheme('AdminYuniTheme')->setClassName('AdminYuniTheme.AdminYuniTheme');

    }
}
