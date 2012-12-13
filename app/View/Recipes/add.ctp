<?php
/**
 *  Add Recipe View Template
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
            <h1>Add a new recipe</h1>
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
                        'action' => 'add',
                        'default' => true,
                        'class' => 'michelle-recipes',
                        'novalidate' => 'novalidate'
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
                        <fieldset id="add-ingredient" data-type="Ingredient" data-recipe="init">
                            <legend>
                                Ingredients
                            </legend>
                            <ul data-role="listview" data-inset="true" data-split-icon="delete" data-recipe="body">
                                <li data-icon="plus">
                                    <a href="#" data-recipe="addButton">
                                        Add New Ingredient
                                    </a>
                                </li>
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
                                            'form' => 'RecipeAddForm',
                                            'class' => 'full-size-input validateIngredientName'
                                        )
                                    ); ?>
                                    <a href="#" class="no-border background-transparent" data-recipe="deleteButton" data-iconshadow="false">
                                        Delete
                                    </a>
                                </li>
                            </ul>
                            <br>
                        </fieldset>
                    </div>
                    <div class="span3 panel">
                        <fieldset id="add-direction" data-recipe="init">
                            <legend>
                                Method
                            </legend>
                            <ul data-role="listview" data-inset="true" data-recipe="body">
                                <li data-icon="plus">
                                    <a href="#" data-recipe="addButton">
                                        Add Method
                                    </a>
                                </li>
                                <li data-recipe="element" class="form-row">
                                    <a href="#" class="hidden"></a>
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
                                
                                    <a href="#" data-recipe="deleteButton" class="no-border background-transparent">Delete</a>
                                </li>
                            </ul>
                            <br>
                        </fieldset>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <fieldset>
                            <div class="form-actions">
                                <div class="btn-group">
                                    <?php echo $this->Form->submit(
                                        'Create',
                                        array(
                                            'class' => 'btn btn-primary',
                                            'div' => false
                                        )
                                    ); ?>
                                    <?php echo $this->Form->button(
                                        'Reset',
                                        array(
                                            'class' => 'btn',
                                            'div' => false,
                                            'type' => 'reset'
                                        )
                                    ); ?>
                                    <?php echo $this->Html->link(
                                        'Cancel',
                                        array(
                                            'action' => 'cancel',
                                        ),
                                        array(
                                            'class' => 'btn btn-danger',
                                        )
                                    ); ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div><!--/span-->
    </div><!--/row-->
</section>



