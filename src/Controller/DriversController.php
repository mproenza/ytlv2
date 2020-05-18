<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Drivers Controller
 *
 * @property \App\Model\Table\DriversTable $Drivers
 *
 * @method \App\Model\Entity\Driver[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DriversController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provinces', 'Users'],
            'limit' => 500
        ];
        $drivers = $this->paginate($this->Drivers);

        $this->set(compact('drivers'));
    }

    /**
     * View method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => ['Provinces', 'Users', 'Localities', 'ActivityDriverSubscriptions', 'ArchiveDriversTravels', 'Conversations', 'DiscountRides', 'DriversProfiles', 'DriversTransactionalEmails', 'DriversTravelsByEmail', 'Testimonials'],
        ]);

        $this->set('driver', $driver);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $driver = $this->Drivers->newEmptyEntity();
        if ($this->request->is('post')) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('The driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The driver could not be saved. Please, try again.'));
        }
        $provinces = $this->Drivers->Provinces->find('list', ['limit' => 200]);
        $users = $this->Drivers->Users->find('list', ['limit' => 200]);
        $localities = $this->Drivers->Localities->find('list', ['limit' => 200]);
        $this->set(compact('driver', 'provinces', 'users', 'localities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => ['Localities'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('The driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The driver could not be saved. Please, try again.'));
        }
        $provinces = $this->Drivers->Provinces->find('list', ['limit' => 200]);
        $users = $this->Drivers->Users->find('list', ['limit' => 200]);
        $localities = $this->Drivers->Localities->find('list', ['limit' => 200]);
        $this->set(compact('driver', 'provinces', 'users', 'localities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $driver = $this->Drivers->get($id);
        if ($this->Drivers->delete($driver)) {
            $this->Flash->success(__('The driver has been deleted.'));
        } else {
            $this->Flash->error(__('The driver could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    
    public function profile($nick) {
        
        $driverWithProfile = $this->Drivers->find('withFullProfile', ['nick' => $nick])->first();
        
        if($driverWithProfile == null) throw new NotFoundException (__('Este perfil no existe'));

        // Show 'other recommended' drivers on the driver's profile
        $recommendedDrivers = 
                $this->Drivers->find('recommendedInProvince',
                        [
                            'province_id' => $driverWithProfile->province->id,
                            'exclude_drivers' => [$driverWithProfile->id]
                        ]
                );
        $this->set('recommended_drivers', $recommendedDrivers);

        /* // Chequeamos para cargar el viaje con descuento si hay
         if($this->request->query('discount')) {
             $this->loadModel('DiscountRide');
             $this->set('discount',
                     $this->DiscountRide->findFullById(
                             $this->request->query('discount'),
                             array('DiscountRide.driver_id'=>$profile['Driver']['id'], 'DiscountRide.active'=>1))
                     );
         }
        */
        
        // --- TESTIMONIALS ---
        $this->loadModel('Testimonials');
        
        // Set the number of reviews we are going to load as per :reviews
        $passedArgs = $this->request->getParam('pass');
        $countReviewsToLoad = !empty($passedArgs) && isset($passedArgs['reviews'])? $passedArgs['reviews']:5;
        
        // Check if we need to highlight one specific review, as per ?see-review
        $isAskingReview = isset($this->request->getQueryParams()['see-review']) && $this->request->getQueryParams()['see-review'];
        if($isAskingReview) {

            $highlightReview = $this->Testimonials->get($this->request->getQueryParams()['see-review']);
            $this->set('highlighted', $highlightReview);

            $highlightReviewID = $highlightReview->id;

        } else $highlightReviewID = '';

        //Creating a virtual field for returning given testimonial (if given) into pagination
        //$this->Testimonial->virtualFields['in_review']=  "IF (Testimonial.id IN ('$highlightReviewID'),0,1)";

        $this->paginate = [ 'Testimonials' => [
                'contain'=>\App\Model\Entity\Testimonial::$myCommonRelatedModels,
                'conditions'=>[
                    'Testimonials.driver_id' => $driverWithProfile->id, 
                    'Testimonials.state'=> \App\Model\Entity\Testimonial::$statesValues['approved']
                ],
                'limit' => $countReviewsToLoad,
                'order' => ['Testimonials.created'=> 'DESC']
            ] 
        ];
        
        $testimonials = $this->paginate($this->Testimonials);
        
        // TODO: Hacer un sort de la consulta para poner el $highlightReview al principio

        $this->set('testimonials', $testimonials);

        if($this->request->is('ajax')) {                    
            $render = '/Elements';
            if(Configure::read('App.theme') != null) $render .= '/'.Configure::read('App.theme');
            $render .= '/ajax_testimonials_list';
            return $this->render($render, false);
        }
        // --- END TESTIMONIALS ---
        
        $this->set('driverWithProfile', $driverWithProfile);
        
        $this->viewBuilder()->setTheme('CubaTheme')->setClassName('CubaTheme.CubaTheme');
        $this->viewBuilder()->setLayout('driver_profile');
    }
    
    public function drivers_by_province($slug) {
        $province = Province::_provinceFromSlug($slug);
        
        if($province === null) throw new NotFoundException(__d('error', 'La provincia no existe'));
        
        $driversData = $this->Driver->getDriversCardsByProvince($province['id']);
        
        // Si no hay suficientes choferes en la provincia seleccionada, buscar choferes en provincias alternativas
        $shouldLookForAlternativeDrivers = count($driversData) < 10 && isset($province['alternative_province']) && $province['alternative_province'] != null;
        $altertativeDriversData = array();
        if($shouldLookForAlternativeDrivers) {
            $altertativeDriversData = $this->Driver->getDriversCardsByProvince($province['alternative_province']);
        }
        
        $this->set('drivers_data', $driversData);
        $this->set('alternative_drivers_data', $altertativeDriversData);
        $this->set('province', $province);
        
        $this->layout = 'drivers_by_province';
    }
}
