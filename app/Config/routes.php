<?php
/**
 *  Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.1.0
 * @package       app.Config
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
    /**
     * Here, we are connecting '/' (base path) to recipes controller
     */
	Router::connect('/', array('controller' => 'recipes', 'action' => 'index'));

    /**
     * Next connect all requests to the UsersController
     */
    Router::connect('/users', array('controller' => 'users'));
    Router::connect('/users/:action/*', array('controller' => 'users'));

    Router::connect('/admin', array('controller' => 'adminpages', 'action' => 'dashboard'));
    Router::connect('/admin/:action/*', array('controller' => 'adminpages'));

    /**
     * Next connect all requests to the GroupsController
     */
    Router::connect('/groups', array('controller' => 'groups'));
    Router::connect('/groups/:action/*', array('controller' => 'groups'));

    /**
     * Last connection. Remove recipes controller name from url.
     * Also acts as a catch-all for all urls that do not match anything else
     */
    Router::connect('/:action/*', array('controller' => 'recipes'));


    /**
     * Load all plugin routes.  See the CakePlugin documentation on 
     * how to customize the loading of plugin routes.
     */
	CakePlugin::routes();

    /**
     * Load the CakePHP default routes. Remove this if you do not want to use
     * the built-in default routes.
     */
	// require CAKE . 'Config' . DS . 'routes.php';
