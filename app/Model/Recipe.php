<?php
/**
 *  Recipe Model
 *
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.2.2
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class Recipe extends AppModel {
	public $name = 'Recipe';
	public $hasMany = array(
		'Ingredient' => array(
			'className' => 'Ingredient',
			'foreignKey' => 'recipe_id',
            'dependent' => true
		),
		'Direction' => array(
			'className' => 'Direction',
			'foreignKey' => 'recipe_id',
            'dependent' => true
		)
	);

	public $validate = array(
        'name' => array(
            'rule' => 'notempty',
            'message' => 'Recipe name is required.'
        )
    );
}