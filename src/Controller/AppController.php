<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();        
        
        $this->Dummy = \Cake\ORM\TableRegistry::getTableLocator()->get('Dummy');
        

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
        $this->loadComponent('Paginator');
        
        $this->Auth->allow(); // TEMP: ALLOW ALL (FOR NOW)

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
        
        $this->_setPageMeta();
        
        // Enviar Auth hacia la vista para poderla usar de manera mas facil
        $this->set('Auth', $this->Auth);
        
        // Some variables to ease the work on the views
        $isLoggedIn = $this->Auth->user() ? true : false;
        $userRole = null;
        if($isLoggedIn) {
            $userRole = $this->Auth->user()['role'];
        }
        $this->set('isUserLoggedIn', $isLoggedIn);
        $this->set('userRole', $userRole);
    }
    
    
    private function _setPageMeta() {
        $defaultTitle = $this->_getPageMeta('default');
        $meta = $defaultTitle;

        $key = $this->request->getParam('controller').'.'.$this->request->getParam('action');
        
        $partialMeta = $this->_getPageMeta($key);
        if($partialMeta != null) {
            if($this->request->getParam('controller') === 'Pages') {
                if(isset($partialMeta[$this->request->getParam('pass')[0]])) {
                    $meta = $partialMeta[$this->request->getParam('pass')[0]];
                }
            } else {
                $meta = $partialMeta;
            }
        }
        
        $this->set('meta', $meta);
        
        $this->set('appLang', I18n::getLocale());
    }

    private function _getPageMeta($key) {
        $pageTitles = [
            
            'default' =>array('title'=>__d('meta', 'Taxi compartido en Cuba - {0} y otros', 'La Habana, Viñales, Trinidad, Varadero'), 'description'=>__d('meta', 'PickoCar es un servicio de taxi compartido en Cuba con excelentes precios y rutas que conectan {0} y otros', 'La Habana, Viñales, Trinidad, Varadero')),

            // PAGES
            'Pages.display' =>array(
                'home'=>array(
                    'title'=>__d('meta', 'Taxi con chofer en Cuba: La Habana, Varadero, Viñales, Trinidad, Santiago de Cuba y más'), 
                    'description'=>__d('meta', 'Descubre choferes que operan en Cuba, recibe ofertas de precio directamente de ellos y contrata al mejor para tu viaje.'),
                    'hreflang'=>true
                )
            ),
            
            'Testimonials.featured' =>array('title'=>__d('meta', 'Opiniones y reseñas sobre choferes en Cuba'), 'description'=>__d('meta', 'Mira opiniones y fotos de choferes en Cuba y solicita un viaje al que creas mejor')),
            'Testimonials.reviews' =>array('title'=>__d('meta', 'Opiniones y reseñas sobre choferes de taxi en Cuba'), 'description'=>__d('meta', 'Mira opiniones y fotos de choferes en Cuba y solicita un viaje al que creas mejor')),
            
            'Drivers.profile' => [
                'title'=>function($viewVars, $request) {
                    return __d('meta', 'Taxi en {0}, Cuba: {1}', 
                            $viewVars['driverWithProfile']->province->name,
                            $viewVars['driverWithProfile']->drivers_profile->driver_name);
                },
                'description'=>function($viewVars, $request) {
                    $description = __d('driver_profile', 'Taxi hasta {0} capacidades', $viewVars['driverWithProfile']->max_people_count);
                    if ($viewVars['driverWithProfile']->has_air_conditioner) $description .= ' ' . __d('driver_profile', 'con aire acondicionado');
                    $description .= '. '.__d('driver_profile', 'Contacta a {0} para acordar traslados en Cuba.', \App\Model\Entity\Driver::shortenName($viewVars['driverWithProfile']->drivers_profile->driver_name));
                    return $description;
                }
            ]
            
        ];

        if(isset ($pageTitles[$key])) return $pageTitles[$key];

        return null;
    }
}
