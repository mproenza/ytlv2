<?php

namespace AdminTheme\View;

use Cake\View\View;

class AdminThemeView extends View
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadHelper('Html', ['className' => 'ThemeAmenities.EnhancedHtml']);
        $this->loadHelper('Form', ['className' => 'ThemeAmenities.BootstrapForm']);
    }
}
