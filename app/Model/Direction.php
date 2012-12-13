<?php

class Direction extends AppModel {
	public $name = 'Direction';
	public $belongsTo = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipe_id'
		)
	);

	public $validate = array(
        'step' => array(
            'rule' => 'notempty',
            'message' => 'A method step is required.'
        )
    );
}