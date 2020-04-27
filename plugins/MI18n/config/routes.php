<?php
use Cake\Routing\Router;
use Cake\I18n\I18n;
use Cake\Utility\Inflector;

// Filtro para crear urls con el idioma actual al principio
Router::addUrlFilter(function ($params, $request) {
    if ($request->getParam('language') && !isset($params['language'])) {
        $params['language'] = $request->getParam('language');
    } elseif (!isset($params['language'])) {
        $params['language'] = I18n::getDefaultLocale();
    }

    return $params;
});

/*// Filtro para crear url traducidas al idioma actual
Router::addUrlFilter(function ($params, $request) {
    // Si esta el idioma en los parametros, cambiar a ese idioma para poder traducir hacia él
    $currentLang = I18n::getLocale();
    if(isset($params['language'])) I18n::setLocale($params['language']);
    
    // --- Traducir url (controller, action y params) ---
    
    // Controller
    if(isset($params['controller'])) {
        $params['controller'] = __d('urls', Inflector::dasherize($params['controller']));
    }
    
    // Action
    if(isset($params['action'])) {
        $params['action'] = __d('urls', $params['action']);
    }
    
    // Params
    $i = 0;
    while(array_key_exists($i, $params)) {
        $params[$i] = __d('urls', $params[$i]);
        $i++;
    }
    
    // TODO: Traducir query params (?)
    
    // --- Fin de traduccion de urls ---
    
    // Volver al idioma al que estaba la app
    I18n::setLocale($currentLang);

    return $params;
});*/