<?php

class Ingredient extends AppModel {
	public $name = 'Ingredient';
	public $belongsTo = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipe_id'
		)
	);

	public $validate = array(
        'name' => array(
            'rule' => 'notempty',
            'message' => 'Ingredient name is required.'
        ),
        // 'measure' => array(
        //     'rule' => 'notempty',
        //     'message' => 'A measurement type is required.'
        // ),
        // 'measure_amount' => array(
        //     'rule' => 'notempty',
        //     'message' => 'A measurement amount is required.'
        // )
    );
}