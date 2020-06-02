<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use App\Model\Entity\Testimonial;

/**
 * Testimonials Controller
 *
 * @property \App\Model\Table\TestimonialsTable $Testimonials
 * @method \App\Model\Entity\Testimonial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestimonialsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Conversations', 'Drivers'],
        ];
        $testimonials = $this->paginate($this->Testimonials);

        $this->set(compact('testimonials'));

        $this->redirect(array('action' => 'list/pending'));
    }

    /**
     * View method
     *
     * @param string|null $id Testimonial id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testimonial = $this->Testimonials->get($id, [
            'contain' => ['Conversations', 'Drivers', 'ConversationsMeta', 'TestimonialsReplies'],
        ]);

        $this->set('testimonial', $testimonial);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testimonial = $this->Testimonials->newEmptyEntity();
        if ($this->request->is('post')) {
            $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->getData());
            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success(__('The testimonial has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testimonial could not be saved. Please, try again.'));
        }
        $conversations = $this->Testimonials->Conversations->find('list', ['limit' => 200]);
        $drivers = $this->Testimonials->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('testimonial', 'conversations', 'drivers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Testimonial id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testimonial = $this->Testimonials->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->getData());
            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success(__('The testimonial has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testimonial could not be saved. Please, try again.'));
        }
        $conversations = $this->Testimonials->Conversations->find('list', ['limit' => 200]);
        $drivers = $this->Testimonials->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('testimonial', 'conversations', 'drivers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Testimonial id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testimonial = $this->Testimonials->get($id);
        if ($this->Testimonials->delete($testimonial)) {
            $this->Flash->success(__('The testimonial has been deleted.'));
        } else {
            $this->Flash->error(__('The testimonial could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function admin($id) {
        $data = $this->Testimonials->get($id);
        if (!$data)
            throw new NotFoundException('No existe el testimonio solicitado');

        $this->set('testimonial', $data);
        $this->viewBuilder()->setTheme('AdminTheme')->setClassName('AdminTheme.AdminTheme');
    }

    public function list($filtro = 'pending') {
        $conditions = array();
        if ($filtro != 'all')
            $conditions = array('Testimonials.state =' => Testimonial::$statesValues[$filtro]);


        $this->paginate = [
            'contain'=>\App\Model\Entity\Testimonial::$myCommonRelatedModels,
            'conditions'=>$conditions,
            ];

        $testimonials = $this->paginate($this->Testimonials);

        $this->set('testimonials', $testimonials);
        $this->set('filter_applied', $filtro);
        $this->viewBuilder()->setTheme('AdminTheme')->setClassName('AdminTheme.AdminTheme');

        $this->render('all');
    }

    public function featured($redirect = true) {
        if($redirect) return $this->redirect(['action'=>'reviews', '?'=>$this->request->getQueryParams()], 301);

        // --- LANG ---
        $currentLang = $alternativeLangUrlQuery = Configure::read('App.language');
        $langs = [ $currentLang ];

        if(isset($this->request->getQueryParams()['also'])) $alternativeLangUrlQuery = $this->request->getQueryParams()['also'];
        if($currentLang != $alternativeLangUrlQuery) {
            $langs[] = $alternativeLangUrlQuery;
        }
        // --- END LANG ---

        $this->paginate = [
            'order'=>['Testimonials.created' => 'DESC'],
            'limit'=>30,
            'contain' => \App\Model\Entity\Testimonial::$myCommonRelatedModels,
            'conditions' => ['Testimonials.featured'=>true, 'Testimonials.lang IN'=>$langs]
        ];

        $this->set('testimonials', $this->paginate($this->Testimonials));

        $this->viewBuilder()->setTheme('CubaTheme')->setClassName('CubaTheme.CubaTheme');
    }
    public function reviews() {
        $this->featured(false);
        $this->render('featured');
    }
}
