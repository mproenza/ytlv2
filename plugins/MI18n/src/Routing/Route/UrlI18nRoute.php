<?php
namespace MI18n\Routing\Route;

use Cake\Routing\Route\DashedRoute;
use Cake\I18n\I18n;

class UrlI18nRoute extends DashedRoute
{   
    public function parse(string $url, string $method = ''): ?array
    {
        // Obtener todas las partes de la url (cada elemento separado por un /)
        $parts = explode('/', $url);
        
        $lang = I18n::getLocale();
        
        // Traducir cada parte de la url a su equivalente en el idioma por defecto de las url
        I18n::setLocale('en'); // TODO: Poner alguna configuracion para saber en qué idioma están las url (por ahora ingles)
        foreach ($parts as $p) {
            $url = str_replace($p, __d('urls', $p), $url);
        }
        
        I18n::setLocale($lang);
        
        return parent::parse($url, $method);
    }
    
    public function match(array $url, array $context = []): ?string
    {
        $matchedUrl = parent::match($url, $context);
        
        $matchedUrl = $this->_translate($matchedUrl);

        return $matchedUrl;
    }
    
    private function _translate($matchedUrl) {
        $parts = explode('/', $matchedUrl);
        
        foreach ($parts as $p) {
            
            // Quitar la query
            $tryExplodeQuery = explode('?', $p);
            if(isset($tryExplodeQuery[1])) $p = $tryExplodeQuery[0];
            
            $matchedUrl = str_replace($p, __d('urls', $p), $matchedUrl);
        }
        
        return $matchedUrl;
    }
}
