<?php
/**
 * Main controller for Dunhem Family Recipes.
 *
 * This file will render views from View/AdminPages/
 *
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.1.2
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');
App::uses('Debugger', 'Utility');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class AdminPagesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'AdminPages';

    /**
     * The helpers this controller uses
     *
     * @var array
     */
    public $helpers = array('Html', 'Form', 'Js', 'Session');

    public $uses = array('User', 'Group');

    public $layout = 'admin';

    /**
     * Change a few values before calling parent __construct
     */
    // public function __construct($request = null, $response = null) {
    //     parent::__construct();
    // }

    public function beforeFilter() {
        parent::beforeFilter();
        // $this->Auth->allow('index');
    }

    public function dashboard() {
        $this->set(
            array(
                'title_for_layout' => 'Admin - Users',
            )
        );
    }

    public function listUsers() {
        $this->User->recursive = 0;
        $this->set(
            array(
                'title_for_layout' => 'Admin - Users',
                'users' => $this->paginate('User')
            )
        );
    }

    public function listGroups() {
        $this->Group->recursive = 0;
        $this->set(
            array(
                'title_for_layout' => 'Admin - Groups',
                'groups' => $this->paginate('Group')
            )
        );
    }

    /**
     *
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set(
            array(
                'title_for_layout' => 'Admin',
                'users' => $this->paginate('User')
            )
        );
    }
}

?>