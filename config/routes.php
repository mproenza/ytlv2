<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use MI18n\Routing\Route\UrlI18nRoute;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */
/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/:language', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));

    /*
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered through `Application::routes()` with `registerMiddleware()`
     */
    $builder->applyMiddleware('csrf');

    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home'])
            ->setPatterns(['language' => 'en|es']);

    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display'])
            ->setPatterns(['language' => 'en|es']);
    
    $builder->connect('/taxi-driver-cuba-reviews', ['controller'=>'testimonials', 'action' => 'reviews'])
            ->setPatterns(['language' => 'en']);
    $builder->connect('/opiniones-taxi-cuba', ['controller'=>'testimonials', 'action' => 'reviews'])
            ->setPatterns(['language' => 'es']);
    // LEGACY
    $builder->connect('/taxi-driver-cuba-reviews', ['controller'=>'testimonials', 'action' => 'featured'])
            ->setPatterns(['language' => 'en']);
    $builder->connect('/opiniones-taxi-cuba', ['controller'=>'testimonials', 'action' => 'featured'])
            ->setPatterns(['language' => 'es']);
    
    $builder->connect('/taxi-driver/*', ['controller'=>'drivers', 'action' => 'profile'])
            ->setPatterns(['language' => 'en']);
    $builder->connect('/chofer-taxi/*', ['controller'=>'drivers', 'action' => 'profile'])
            ->setPatterns(['language' => 'es']);
    
    
    // CATCH ALL
    $builder->connect('/:controller', ['action' => 'index'])->setPatterns(['language' => 'en|es']);
    $builder->connect('/:controller/:action/*', [])->setPatterns(['language' => 'en|es']);
    
    // PLUGINS
    $builder->connect('/:plugin/:controller/:action/*', [])->setPatterns(['language' => 'en|es']);

    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
});

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
