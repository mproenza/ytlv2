<?php
namespace MI18n\Middleware;

use Cake\Core\Configure;
use Cake\Core\InstanceConfigTrait;
use Cake\I18n\I18n;
use Cake\Utility\Hash;
use Cake\Http\Cookie\Cookie;
use DateTime;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\RedirectResponse;

class I18nMiddleware implements MiddlewareInterface
{
    use InstanceConfigTrait;

    /**
     * Default config.
     *
     * ### Valid keys
     *
     * - `detectLanguage`: If `true` will attempt to get browser locale and
     *   redirect to similar language available in app when going to site root.
     *   Default `true`.
     * - `defaultLanguage`: Default language for app. Default `en_US`.
     * - `languages`: Languages available in app. Default `[]`.
     * - `useCookie`: If ´true´ will save a cookie with the prefered language 
     * - `skipPrefix`: do not do the redirect if it is a prefixed url and the prefix is in the array
     *   The value can be an array of plugins to be avoided.
     *   of the user, and will change it when the language is changed. 
     *   Default `true`.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'detectLanguage' => true,
        'defaultLanguage' => 'en_US',
        'languages' => [],
        'useCookie' => true,
        'cookieExpires' => '+1 month',
        'skipPrefix' => [],
        'avoidInPlugin' => true,
    ];

    /**
     * Constructor.
     *
     * @param array $config Settings for the filter.
     */
    public function __construct($config = [])
    {
        /*if (isset($config['languages'])) {
            $config['languages'] = Hash::normalize($config['languages']);
        }*/

        $this->setConfig($config);
    }
    
    
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $config = $this->getConfig();
        $url = $request->getUri()->getPath();
        
        // Si es un prefix que debemos evitar, retornamos
        if(isset($config['skipPrefix']) && $this->_skip($url, $config['skipPrefix'])) {
            return $handler->handle($request);
        }
        
        // Si no esta el idioma en la url, forzamos a que lo tenga
        if(!$this->_isLangInUrl($url, $config['languages'])) {
            $statusCode = 301;
            $lang = $this->_config['defaultLanguage'];
            if ($this->_config['detectLanguage']) {
                $statusCode = 302;
                $lang = $this->detectLanguage($request, $lang);
            }
            
            if($url == '/') $url = ''; // Fix url's '/' at end
            $response = new RedirectResponse(
                $request->getAttribute('webroot') . $lang. $url,
                $statusCode
            );

            return $response;
        } 
        // Si esta el idioma, lo seteamos en las config y ponemos cookies
        else {
            $lang = substr($url, 1, 2);
            
            if(I18n::getLocale() != $lang) {
                I18n::setLocale($lang);
                Configure::write('App.language', $lang);
            }
                
            if($config['useCookie']) {
                $response = $handler->handle($request);
                return $response->withCookie(
                        Cookie::create('user_language', $lang, [
                            'path' => '/',
                            'httpOnly' => true,
                            'secure' => false, // Esto indica que se transmita tambien por http no seguro
                            'expires' => new DateTime($config['cookieExpires']),
                            ]
                        ));
            }
        }

        return $handler->handle($request);
    }

    /**
     * Get languages accepted by browser and return the one matching one of
     * those in config var `I18n.languages`.
     *
     * You should set config var `I18n.languages` to an array containing
     * languages available in your app.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request.
     * @param string|null $default Default language to return if no match is found.
     *
     * @return string
     */
    public function detectLanguage(ServerRequestInterface $request, $default = null)
    {
        if (empty($default)) {
            $lang = $this->_config['defaultLanguage'];
        } else {
            $lang = $default;
        }
        
        // Try to get language from cookie
        if($this->_config['useCookie']) {
            
            $cookies = $request->getCookieParams();
            $langCookie = Hash::get($cookies, 'user_language');// ¿Por qué la Cookie viene con un _ en vez de un . ?
            
            // TODO: Tratar de ver si la cookie tiene un idioma valido
            
            if($langCookie != null) return $langCookie;
        }

        // Try to get language from browser
        $browserLangs = $request->acceptLanguage();
        foreach ($browserLangs as $k => $langKey) {
            if (strpos($langKey, '-') !== false) {
                $browserLangs[$k] = substr($langKey, 0, 2);
            }
        }
        $acceptedLangs = array_intersect(
            $browserLangs,
            array_keys($this->_config['languages'])
        );
        if (!empty($acceptedLangs)) {
            $lang = reset($acceptedLangs);
        }

        return $lang;
    }    
    
    private function _isLangInUrl($url, $allowedLangs) {
        $langInUrl = true;
        
        // Does it have at least 3 characters? i.e. / + 2 chars for lang
        if(strlen($url) < 3) $langInUrl = false;

        // If url length is 3, it has the structure /<2 chars for lang>, but if it is not an allowed lang, then it is not a lang
        else if(strlen($url) == 3 && !in_array( substr($url, -2), $allowedLangs ) ) $langInUrl = false;

        // If after 3 characters there is no /, then the url does not contain the language
        else if(strlen($url) > 3 && (!strpos($url, '/', 1) || strpos($url, '/', 1) > 3)) $langInUrl = false;
        
        return $langInUrl;
    }
    
    private function _skip($url, $skipPrefixes) {
        foreach ($skipPrefixes as $prefix) {
            $part = substr($url, 1, strlen($prefix) + 1); // El caracter 0 es "/"
            if( $part == $prefix.'/' ) return true;
        }
        return false;
    }
}