<?php

namespace CubaTheme\View;

use Cake\View\View;
use Cake\Core\Configure;

class CubaThemeView extends View
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadHelper('Html', ['className' => 'ThemeAmenities.EnhancedHtml']);
        $this->loadHelper('Form', ['className' => 'ThemeAmenities.BootstrapForm']);
        $this->loadHelper('Paginator',  ['templates' => 'CubaTheme.paginator-templates']);
        
        Configure::write('App.jsBaseUrl', 'assets/');
        Configure::write('App.cssBaseUrl', 'assets/');
        Configure::write('App.imageBaseUrl', 'assets/images/');
    }
}
