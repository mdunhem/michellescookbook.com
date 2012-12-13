<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );
    public $helpers = array('Html', 'Form', 'Session', 'Js', 'Menu');

    public function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'recipes', 'action' => 'index');

        /**
         *  Perform check to see if anyone is logged in and assemble the title and link
         *  for the navbar
         */
        if ($this->Auth->user()) {
            $usersTitle = $this->Auth->user('username');
            switch ($this->Auth->user('group_id')) {
                case 1:
                    $usersLink = array(
                        array(
                            'title' => 'User Links',
                            'options' => array(
                                'class' => 'nav-header'
                            )
                        ),
                        array(
                            'url' => array(
                                'title' => 'Edit Users',
                                'url' => array(
                                    'controller' => 'users',
                                    'action' => 'index'
                                )
                            )
                        ),
                        array(
                            'url' => array(
                                'title' => 'Edit Groups',
                                'url' => array(
                                    'controller' => 'groups',
                                    'action' => 'index'
                                )
                            )
                        ),
                        array(
                            'title' => '',
                            'options' => array(
                                'class' => 'divider'
                            )
                        ),
                        array(
                            'url' => array(
                                'title' => 'Logout',
                                'url' => array(
                                    'controller' => 'users',
                                    'action' => 'logout'
                                ),
                                'options' => array(
                                    'data-ajax' => 'false'
                                )
                            )
                        )
                    );
                    break;
                case 2:
                    $usersLink = array(
                        array(
                            'title' => 'User Links',
                            'options' => array(
                                'class' => 'nav-header'
                            )
                        ),
                        array(
                            'url' => array(
                                'title' => 'Logout',
                                'url' => array(
                                    'controller' => 'users',
                                    'action' => 'logout'
                                )
                            )
                        )
                    );
                    break;
                
                default:
                    $usersLink = array(
                        array(
                            'url' => array(
                                'title' => 'Logout',
                                'url' => array(
                                    'controller' => 'users',
                                    'action' => 'logout'
                                )
                            )
                        )
                    );
                    break;
            }
        } else {
            $usersTitle = 'Login';
            $usersLink = array(
                array(
                    'url' => array(
                        'title' => 'Login',
                        'url' => array(
                            'controller' => 'users',
                            'action' => 'login'
                        )
                    )
                )
            );
        }

        /**
         *  Left navigation menu items, uses MenuHelper to assemble.
         *  Is declared here so that it is rendered in every view to avoid repetition
         *  Is rendered in nav.ctp
         */
        $leftMenu = array(
            'options' => array(
                'class'=>'nav'
            ),
            'items' => array(
                array(
                    'url'=> array(
                        'title'=>'Search',
                        'url' => '/'
                    )
                ),
                array(
                    'url' => array(
                        'title' => 'Add',
                        'url' => array(
                            'controller' => 'recipes',
                            'action' => 'add'
                        )
                    )
                )
            )
        );

        /**
         *  The right navigation items, uses MenuHelper to assemble.
         *  Will display the currently logged in username, or 'Login'
         */
        $rightMenu = array(
            'options' => array(
                'class' => 'nav pull-right'
            ),
            'items' => array(
                array(
                    'url'=> array(
                        'title' => $usersTitle,
                        'url' => '#',
                        'options' => array(
                            'class' => 'dropdown-toggle',
                            'data-toggle' => 'dropdown'
                        )
                    ),
                    'options' => array(
                        'class' => 'dropdown'
                    ),
                    'items' => array(
                        array(
                            'options' => array(
                                'class' => 'dropdown-menu'
                            ),
                            'items' => $usersLink
                        )
                    )
                )
            )
        );

        $this->set('leftMenu', $leftMenu);
        $this->set('rightMenu', $rightMenu);

    }
}
