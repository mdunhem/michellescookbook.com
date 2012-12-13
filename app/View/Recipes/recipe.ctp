<?php
/**
 *  View Recipe Template
 *
 *  File: Recipes/recipe.ctp
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.1.0
 * @package       Cake.View.Recipes
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

    echo $this->Html->div(
        'row-fluid',
        $this->Html->div(
            'span12',
            $this->Html->tag(
                'h1',
                $recipe['Recipe']['name']
            )
        )
    );

    echo $this->Html->tag('hr');

    // Construct the description div
    $descriptionDiv = $this->Html->div(
        'row-fluid',
        $this->Html->div(
            'span12',
            $this->Html->tag(
                'p',
                $recipe['Recipe']['description']
            )
        )
    );

    // Determine if there are any times available and display them...
    $timeDiv = '';
    if (strlen($recipe['Recipe']['prep_time']) || strlen($recipe['Recipe']['cook_time'])) {
        $text = $this->Html->tag('hr');

        // Init a few variables
        $paragraphClass = 'pull-left';

        if (strlen($recipe['Recipe']['prep_time'])) {
            $text .= $this->Html->para(
                $paragraphClass,
                'Prep Time: ' . $recipe['Recipe']['prep_time'] . ' minutes'
            );
            $paragraphClass = 'pull-right';
        }
        if (strlen($recipe['Recipe']['cook_time'])) {
            $text .= $this->Html->para(
                $paragraphClass,
                'Cook Time: ' . $recipe['Recipe']['cook_time'] . ' minutes'
            );
        }

        // Finally create the two divs
        $timeDiv = $this->Html->div(
            'row-fluid',
            $this->Html->div(
                'span12',
                $text
            )
        );
    }

    // Construct the description section
    echo $this->Html->tag(
        'section',
        $this->Html->div(
            'well',
            $descriptionDiv . $timeDiv
        ),
        array(
            'id' => 'description'
        )
    );

    // Title for the Ingredients list
    $ingredientsTitle = $this->Html->div(
        'row-fluid',
        $this->Html->div(
            'span12',
            $this->Html->tag(
                'h3',
                'Ingredients:'
            )
        )
    );

    // Construct the 'For' list if it exits, otherwise just display the ingredients in a palin list
    $ingredientsRowInnerText = '';
    if (!empty($forArray)) {
        $ingredientsText = '';
        foreach ($forArray as $recipeComponent => $ingredientsArray) {
            $ingredientsText .= $this->Html->tag('dt', 'For the ' . $recipeComponent);
            foreach ($ingredientsArray as $key => $value) {
                $ingredientsText .= $this->Html->tag('dd', $value);
            }
        }

        $ingredientsRowInnerText .= $this->Html->tag('dl', $ingredientsText);

    }
    foreach ($recipe['Ingredient'] as $ingredient) {
        $ingredientsRowInnerText .= $this->Html->para(null, $ingredient['name']);
    }

    $ingredientsRow = $this->Html->div(
        'row-fluid',
        $this->Html->div(
            'span12',
            $ingredientsRowInnerText
        )
    );

    // Construct the methods list
    $methods = '';
    foreach ($recipe['Direction'] as $direction) {
        $methods .= $this->Html->tag(
            'li',
            $direction['step']
        );
    }

    // Methods title div
    $methodsTitle = $this->Html->div(
        'row-fluid',
        $this->Html->div(
            'span12',
            $this->Html->tag(
                'h3',
                'Methods:'
            )
        )
    );

    // Methods list div
    $methodsRow = $this->Html->div(
        'row-fluid',
        $this->Html->div(
            'span12',
            $this->Html->tag(
                'ol',
                $methods
            )
        )
    );

    // Determine if there are any notes for the recipe
    $recipeNotesTitle = '';
    $recipeNotesRow ='';
    if (strlen($recipe['Recipe']['notes'])) {
        // Construct the Notes title div
        $recipeNotesTitle = $this->Html->div(
            'row-fluid',
            $this->Html->div(
                'span12',
                $this->Html->tag(
                    'h3',
                    'Recipe Notes:'
                )
            )
        );
        // Construct notes div
        $recipeNotesRow = $this->Html->div(
            'row-fluid',
            $this->Html->div(
                'span12',
                $this->Html->tag(
                    'p',
                    $recipe['Recipe']['notes']
                )
            )
        );
    }

    // Contruct the left side 'span' which contains the ingredients list
    $span4 = $this->Html->div(
        'span4',
        $ingredientsTitle . $ingredientsRow
    );

    // Construct the right side 'span' which contains the methods list and notes
    $span8 = $this->Html->div(
        'span8',
        $methodsTitle . $methodsRow . $recipeNotesTitle . $recipeNotesRow
    );

    // Display the recipe content section
    echo $this->Html->tag(
        'section',
        $this->Html->div(
            'row-fluid',
            $span4 . $span8
        ),
        array(
            'id' => 'recipeContent'
        )
    );

    echo $this->Html->tag('hr');

    // Display the action buttons section
    echo $this->Html->tag(
        'section',
        $this->Html->div(
            'row-fluid',
            $this->Html->div(
                'span4',
                $this->Html->link(
                    'Edit',
                    array(
                        'controller' => 'recipes',
                        'action' => 'edit',
                        $recipe['Recipe']['id']
                    ),
                    array(
                        'class' => 'btn btn-primary btn-block'
                    )
                )
            )
        ),
        array(
            'id' => 'actionButtons'
        )
    );
?>


