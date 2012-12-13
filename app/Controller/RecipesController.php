<?php
/**
 * Main controller for Dunhem Family Recipes.
 *
 * This file will render views from views/recipes/
 *
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.2.2
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');
App::uses('Debugger', 'Utility');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class RecipesController extends AppController {

	/**
	 * Controller name
	 *
	 * @var string
	 */
	public $name = 'Recipes';

	/**
	 * The helpers this controller uses
	 *
	 * @var array
	 */
	public $helpers = array('Html', 'Form', 'Js', 'Session');

    public $components = array('Session');

    public $uses = array('Recipe', 'Direction', 'Ingredient');

    /**
 	 * Displays the main page of the App
 	 *
 	 * @param mixed What page to display
 	 * @return void
 	 */
	public function index() {
        $this->set(
            array(
                'title_for_layout' => Configure::read('Cookbook.name')
            )
        );
	}

    /**
     *  If a search query is performed, redirect so that there is a clean URL.
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('user', $this->Auth->user('id'));
        // If a search is performed, redirect it so that the URL is cleaner.
        if($this->request->data('Search.term')) {
            $this->redirect(array('action' => 'search', null, $this->request->data('Search.term')));
        }

        if ($this->request->data('Recipe.Cancel')) {
            $this->Session->setFlash('Changes were not saved.', 'flashSuccess');
            $this->Session->write('redirectURL', Router::url(array('action' => 'index')));
            $this->redirect( array('action' => 'index'));
        }
    }

    public function cancel($action = 'index', $id = null) {
        if ($id) {
            $redirectURL = array('action' => 'recipe', $id);
        } else {
            $redirectURL = array('action' => $action);
        }
        $this->Session->setFlash('Changes were not saved.', 'flashSuccess');
        $this->Session->write('redirectURL', Router::url($redirectURL));
        $this->redirect($redirectURL);
    }

	public function add() {
        $this->set('title_for_layout', "Add a Recipe");
        if (!empty($this->request->data)) {
            $this->parseRequestData();
            if ($this->Recipe->saveAssociated($this->request->data)) {
                $this->Session->setFlash('Your recipe has been saved.', 'flashSuccess');
                $this->Session->write('redirectURL', Router::url(array('action' => 'recipe', $this->Recipe->id)));
                $this->redirect(array('action' => 'recipe', $this->Recipe->id));
            } else {
                $this->Session->setFlash('Unable to add your recipe.', 'flashError');
            }
        }
    }

    public function loadJson() {
        $this->autoRender = $this->layout = false;

        $recipes = array();
        $fileContents = false;

        $folder = new Folder(APP . DS . 'Config' . DS . 'DataSources');
        // $files = $folder->find('.*\.json');
        $file = new File($folder->pwd() . DS . 'Recipes.json');

        $list = json_decode($file->read(), true);

        foreach ($list['Recipes'] as $key => $recipe) {
            $recipes[] = $recipe;
        }

        // foreach ($files as $file) {
        //     $file = new File($folder->pwd() . DS . $file);
        //     $recipes[] = json_decode($file->read(), true);
        //     $file->close();
        // }


        Debugger::log($recipes);
        // $files = new File($folder->pwd() . DS . 'recipe.json');
        // $fileContents = $file->read();

        // if ($file->open()) {
        //     $fileJson = $file->read();
        //     Debugger::log(json_decode($fileJson, true));
        // }
        // // Debugger::log(json_decode($fileContents, true));

        // if (!empty($recipes)) {
        //     if ($this->Recipe->saveAll($recipes, array('validate' => false, 'deep' => true))) {
        //         $this->Session->setFlash('Your recipes have been saved.', 'flashSuccess');
        //         $this->Session->write('redirectURL', Router::url(array('action' => 'index')));
        //         $this->redirect(array('action' => 'index'));
        //     } else {
        //         $this->Session->setFlash('Your recipes could not be saved.', 'flashError');
        //         $this->Session->write('redirectURL', Router::url(array('action' => 'index')));
        //         $this->redirect(array('action' => 'index'));
        //     }
        // } else {
        //     $this->Session->setFlash('File is empty.', 'flashError');
        //     $this->Session->write('redirectURL', Router::url(array('action' => 'index')));
        //     $this->redirect(array('action' => 'index'));
        // }
    }

    /**
     * Helper function to parse out the '[for]' values
     * TODO: Maybe add a return value...
     */
    // protected function parseRequestData() {
    //     foreach ($this->request->data['Direction'] as $key => $array) {
    //         if(preg_match('/\[.*?\]/', $array['step'], $match)) {
    //             // Remove the square brackets then set the 'for' value
    //             $match[0] = str_replace(array('[', ']'), '', $match[0]);
    //             $this->request->data('Direction.' . $key . '.for', $match[0]);

    //             // Regex to remove the square brackets and its contents from step
    //             // Then update the step value
    //             $removedFor = preg_replace('/\[.*?\]/', '', $array['step']);
    //             $this->request->data('Direction.' . $key . '.step', $removedFor);
    //         }
    //     }
    // }

    public function edit($id = null) {
        // First set which recipe to edit
        $this->Recipe->id = $id;

        // If loading edit page, serve the desired recipe to edit
        // Otherwise check if cancel button was pressed and redirect
        // Lastly try to save to the database
        if ($this->request->is('get')) {
            $requestedRecipe = $this->appendToName($this->Recipe->read());

            $this->request->data = $requestedRecipe;
            $this->set('recipe', $requestedRecipe);
            $this->set('title_for_layout', 'Edit - ' . $this->Recipe->data['Recipe']['name']);
        } else {
            $this->parseRequestData();
            if ($this->Recipe->saveAssociated($this->request->data)) {
                $this->Session->setFlash('Your recipe has been updated.', 'flashSuccess');
                $this->Session->write('redirectURL', Router::url(array('action' => 'recipe', $this->Recipe->id)));
                $this->redirect(array('action' => 'recipe', $this->Recipe->id));
            } else {
                $this->Recipe->id = $id;
                $this->set('recipe', $this->Recipe->read());
                $this->set('title_for_layout', 'Edit - ' . $this->Recipe->data['Recipe']['name']);
                $this->Session->setFlash('Unable to update your recipe.', 'flashError');
            }
        }
    }

	public function search() {
        $this->set(
            array(
                'title_for_layout' => "Searching Michelle's Recipes",
                'page' => 'search'
            )
        );

        // TODO: Fix search conditions
        $searchTerm = func_get_args();
        $count = count($searchTerm);
        if ($count == 2) {
            if ($searchTerm[1] === 'find-all') {
                $this->set('recipes', $this->Recipe->find('all'));
            } else {
                $this->set('recipes', $this->Recipe->find(
                        'all',
                        array(
                            'conditions' => array(
                                'Recipe.category' => $searchTerm[1]
                            )
                        )
                    )
                );
            }
        } else if (!empty($searchTerm[0])) {
            $this->set('recipes', $this->Recipe->find(
                    'all',
                    array(
                        'conditions' => array(
                            "OR" => array(
                                'Recipe.name LIKE' => '%'.$searchTerm[0].'%',
                                'Recipe.category LIKE' => '%'.$searchTerm[0].'%',
                                'Recipe.description LIKE' => '%'.$searchTerm[0].'%'
                            )
                        )
                    )
                )
            );
        }
    }

    public function recipe($id = null) {

        $this->Recipe->id = $id;
        $currentRecipe = $this->Recipe->read();
        $forIngredientArray = $this->constructForIngredientArray(&$currentRecipe);
        $this->set(
            array(
                'recipe' => $currentRecipe,
                'forArray' => $forIngredientArray,
                'title_for_layout' => $currentRecipe['Recipe']['name'],
                'page' => 'viewRecipe'
            )
        );
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Recipe->delete($id, true)) {
            $this->Session->setFlash('The recipe has been deleted.', 'flashSuccess');
            $this->Session->write('redirectURL', Router::url(array('action' => 'index')));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function deleteIngredientOrDirection() {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        // Important! Keeps from trying to refresh the page
        $this->autoRender = $this->layout = false;

        switch ($this->request->data('type')) {
            case 'Ingredient':
                if ($this->Ingredient->delete($this->request->data('id'))) {
                    $success = 'Ingredient deleted';
                }
                break;
            case 'Direction':
                if ($this->Direction->delete($this->request->data('id'))) {
                    $success = 'Direction deleted';
                }
                break;
            default:
                $success = false;
                break;
        }

        if ($success) {
            header('Content-type: application/json');
            echo json_encode($success);
        } else {
            echo __('Could not delete record');
        }
    }

    /**
     * Private functions ...
     */

    protected function appendToName($recipe) {
        foreach ($recipe['Ingredient'] as $key => $ingredient) {
            foreach ($ingredient as $attribute => $value) {
                if ($attribute === 'for' && strlen($value)) {
                    $array = array('[', $value, ']', $recipe['Ingredient'][$key]['name']);
                    $recipe['Ingredient'][$key]['name'] = implode('', $array);
                }
            }
        }

        return $recipe;
    }

    protected function constructForIngredientArray($recipe) {
        $array = array();
        foreach ($recipe['Ingredient'] as $key => $ingredient) {
            foreach ($ingredient as $attribute => $value) {
                if ($attribute === 'for' && strlen($value)) {
                    if (!array_key_exists($value, $array)) {
                        $array[$value] = array($ingredient['name']);
                    } else {
                        $array[$value][] = $ingredient['name'];
                    }
                    unset($recipe['Ingredient'][$key]);
                }
            }
        }

        return $array;
    }

    /**
     * Helper function to parse out the '[for]' values
     * TODO: Maybe add a return value...
     */
    protected function parseRequestData() {
        foreach ($this->request->data['Ingredient'] as $key => $array) {
            if(preg_match('/\[.*?\]/', $array['name'], $match)) {
                // Remove the square brackets then set the 'for' value
                $match[0] = str_replace(array('[', ']'), '', $match[0]);
                $this->request->data('Ingredient.' . $key . '.for', $match[0]);

                // Regex to remove the square brackets and its contents from step
                // Then update the step value
                $removedFor = preg_replace('/\[.*?\]/', '', $array['name']);
                $this->request->data('Ingredient.' . $key . '.name', $removedFor);
            }
        }
    }


}





