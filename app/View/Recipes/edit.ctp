<?php
/**
 *  Edit Recipe View
 *
 *  File: Recipes/edit.ctp
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.1
 * @package       Cake.View.Recipes
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <h1>Edit recipe</h1>
        </div>
    </div>
</div>
<section id="createRecipeForm">
    <div class="row-fluid">
        <div class="span12">
            <div class="well">
                <?php echo $this->Form->create(
                    'Recipe',
                    array(
                        'action' => 'edit',
                        'default' => true,
                        'class' => 'michelle-recipes'
                    )
                ); ?>
                <div class="row-fluid">
                    <div class="span3 panel">
                        <fieldset>
                            <legend>
                                Recipe Name
                            </legend>
                            <ul data-role="listview" data-inset="true">
                                <li class="form-row" data-icon="false">
                                    <a href="#" class="hidden"></a>
                                    <?php echo $this->Form->input(
                                        'Recipe.name',
                                        array(
                                            'placeholder' => 'Recipe Name',
                                            'label' => false,
                                            'class' => 'full-size-input validateRecipeName',
                                            'div' => false,
                                            'data-role' => 'none'
                                        )
                                    ); ?>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset>
                            <legend>
                                Recipe Description
                            </legend>
                            <ul data-role="listview" data-inset="true">
                                <li class="form-row" data-icon="false">
                                    <a href="#" class="hidden"></a>
                                    <?php echo $this->Form->textarea(
                                        'Recipe.description',
                                        array(
                                            'label' => false,
                                            'rows' => 3
                                        )
                                    ); ?>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset>
                            <legend>
                                Category
                            </legend>
                            <ul data-role="listview" data-inset="true">
                                <li class="form-row" data-icon="false">
                                    <a href="#" class="hidden"></a>
                                    <?php echo $this->Form->input(
                                        'Recipe.category',
                                        array(
                                            'placeholder' => 'Category',
                                            'label' => false,
                                            'class' => 'full-size-input',
                                            'div' => false
                                        )
                                    ); ?>
                                </li>
                            </ul>
                        </fieldset>
                    </div>
                    <div class="span3">
                        <fieldset>
                            <legend>
                                Prep Time
                            </legend>
                            <ul data-role="listview" data-inset="true">
                                <li class="form-row" data-icon="false">
                                    <a href="#" class="hidden"></a>
                                    <?php echo $this->Form->text(
                                        'Recipe.prep_time',
                                        array(
                                            'type' => 'number',
                                            'pattern' => '[0-9]*',
                                            'class' => 'full-size-input'
                                        )
                                    ); ?>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset>
                            <legend>
                                Cook Time
                            </legend>
                            <ul data-role="listview" data-inset="true">
                                <li class="form-row" data-icon="false">
                                    <a href="#" class="hidden"></a>
                                    <?php echo $this->Form->text(
                                        'Recipe.cook_time',
                                        array(
                                            'type' => 'number',
                                            'pattern' => '[0-9]*',
                                            'class' => 'full-size-input'
                                        )
                                    ); ?>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset>
                            <legend>
                                Servings
                            </legend>
                            <ul data-role="listview" data-inset="true">
                                <li class="form-row" data-icon="false">
                                    <a href="#" class="hidden"></a>
                                    <?php echo $this->Form->input(
                                        'Recipe.servings',
                                        array(
                                            'type' => 'text',
                                            'placeholder' => 'Servings',
                                            'label' => false,
                                            'class' => 'full-size-input',
                                            'div' => false
                                        )
                                    ); ?>
                                </li>
                            </ul>
                        </fieldset>
                    </div>
                    <div class="span3 panel">
                        <fieldset id="add-ingredient" data-recipe="init">
                            <legend>
                                Ingredients
                            </legend>
                            <ul data-role="listview" data-inset="true" data-split-icon="delete" data-recipe="body">
                                <li data-icon="plus">
                                    <a href="#" data-recipe="addButton">
                                        Add New Ingredient
                                    </a>
                                </li>
                                <?php $j = 0;
                                if (isset($recipe['Ingredient']) && $recipe['Ingredient']) {
                                    foreach ($recipe['Ingredient'] as $ingredient) { ?>
                                        <li data-recipe="element" class="form-row">
                                            <a href="#" class="hidden"></a>
                                            <?php echo $this->Form->input(
                                                'Ingredient.'.$j.'.id',
                                                array(
                                                    'type' => 'hidden',
                                                )
                                            ); ?>
                                            <?php echo $this->Form->input(
                                                'Ingredient.'.$j.'.recipe_id',
                                                array(
                                                    'type' => 'hidden',
                                                )
                                            ); ?>
                                            <?php echo $this->Form->input(
                                                'Ingredient.'.$j.'.name',
                                                array(
                                                    'label' => false,
                                                    'placeholder' => 'Ingredient Name',
                                                    'type' => 'text',
                                                    'div' => false,
                                                    'data-recipe' => 'input',
                                                    'class' => 'full-size-input validateIngredientName'
                                                )
                                            ); ?>
                                            <a href="#" class="no-border background-transparent" data-recipe="deleteButton" data-iconshadow="false">
                                                Delete
                                            </a>
                                        </li> <?php
                                        $j++;
                                    }
                                } else { ?>
                                    <li data-recipe="element" class="form-row">
                                        <a href="#" class="hidden"></a>
                                        <?php echo $this->Form->input(
                                            'Ingredient.0.name',
                                            array(
                                                'label' => false,
                                                'placeholder' => 'Ingredient Name',
                                                'type' => 'text',
                                                'div' => false,
                                                'data-recipe' => 'input',
                                                'class' => 'full-size-input validateIngredientName'
                                            )
                                        ); ?>
                                        <a href="#" class="no-border background-transparent" data-recipe="deleteButton" data-iconshadow="false">
                                            Delete
                                        </a>
                                    </li>
                                    <?php
                                } ?>
                            </ul>
                            <br>
                        </fieldset>
                    </div>
                    <div class="span3 panel">
                        <fieldset id="add-direction" data-recipe="init">
                            <legend>
                                Method
                            </legend>
                            <ul data-role="listview" data-inset="true" data-split-icon="delete" data-recipe="body">
                                <li data-icon="plus">
                                    <a href="#" data-recipe="addButton">
                                        Add Method
                                    </a>
                                </li>
                                <?php $i = 0;
                                if (isset($recipe['Direction']) && $recipe['Direction']) {
                                    foreach ($recipe['Direction'] as $direction) { ?>
                                        <li data-recipe="element" class="form-row">
                                            <a href="#" class="hidden"></a>
                                            <?php echo $this->Form->inputs(
                                                array(
                                                    'fieldset' => false,
                                                    'legend' => false,
                                                    'Direction.'.$i.'.id' => array(
                                                        'type' => 'hidden'
                                                    ),
                                                    'Direction.'.$i.'.recipe_id' => array(
                                                        'type' => 'hidden'
                                                    ),
                                                    'Direction.'.$i.'.step_number' => array(
                                                        'type' => 'hidden'
                                                    ),
                                                    'Direction.'.$i.'.step' => array(
                                                        'type' => 'textarea',
                                                        'rows' => 3,
                                                        'label' => false,
                                                        'class' => 'smaller-textarea validateMethodStep',
                                                        'placeholder' => 'Method',
                                                        'data-recipe' => 'input',
                                                        'div' => false,
                                                        'error' => false
                                                    ),
                                                    'Direction.'. $i .'.for' => array(
                                                    'type' => 'hidden'
                                                )
                                                )
                                            ); ?>
                                            <a href="#" class="no-border background-transparent" data-recipe="deleteButton">Delete</a>
                                        </li> <?php
                                        $i++;
                                    }
                                } else { ?>
                                    <li data-recipe="element" class="form-row">
                                        <a href="#">
                                        <?php echo $this->Form->inputs(
                                            array(
                                                'fieldset' => false,
                                                'legend' => false,
                                                'Direction.0.step_number' => array(
                                                    'type' => 'hidden',
                                                    'value' => 1
                                                ),
                                                'Direction.0.step' => array(
                                                    'type' => 'textarea',
                                                    'rows' => 3,
                                                    'label' => false,
                                                    'class' => 'smaller-textarea validateMethodStep',
                                                    'placeholder' => 'Method',
                                                    'data-recipe' => 'input',
                                                    'div' => false,
                                                    'error' => false
                                                ),
                                                'Direction.0.for' => array(
                                                    'type' => 'hidden'
                                                )
                                            )
                                        ); ?>
                                        </a>
                                        <a href="#" class="no-border background-transparent" data-recipe="deleteButton">Delete</a>
                                    </li> <?php
                                } ?>
                            </ul>
                            <br>
                        </fieldset>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <fieldset>
                            <div class="form-actions">
                                <?php echo $this->Form->submit(
                                    'Save',
                                    array(
                                        'class' => 'btn btn-primary',
                                        'div' => false,
                                        'data-rel' => 'back'
                                    )
                                ); ?>
                                <?php echo $this->Html->link(
                                    'Cancel',
                                    array(
                                        'action' => 'cancel',
                                        'recipe',
                                        $recipe['Recipe']['id']
                                    ),
                                    array(
                                        'class' => 'btn btn-danger',
                                    )
                                ); ?>
                            </div>
                        </fieldset>
                    </div>
                    <?php echo $this->Form->input('Recipe.id', array('type' => 'hidden')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <?php echo $this->Form->postLink(
                            'Delete',
                            array(
                                'action' => 'delete',
                                $recipe['Recipe']['id']
                            ),
                            array(
                                'class' => 'btn btn-danger btn-block delete-recipe-button',
                                'confirm' => 'Are you sure you wish to delete this recipe?'
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </div><!--/span-->
    </div><!--/row-->
</section>



