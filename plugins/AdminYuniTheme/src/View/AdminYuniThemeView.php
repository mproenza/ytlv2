<?php

namespace AdminYuniTheme\View;

use Cake\View\View;

class AdminYuniThemeView extends View
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadHelper('Html', ['className' => 'ThemeAmenities.EnhancedHtml']);
        $this->loadHelper('Form', ['className' => 'ThemeAmenities.BootstrapForm']);
    }
}
