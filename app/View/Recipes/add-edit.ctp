<?php 
/**
 *	Add or Edit Recipe form view
 *
 *	@author 		Mikael Dunhem
 *	@copyright		2012
 */
?>

<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <h1><?php echo $title_for_layout; ?></h1>
        </div>
    </div>
</div>
<section id="addEditRecipeForm">
    <div class="row-fluid">
        <div class="span12">
            <div class="well">
                <?php echo $this->Form->create(
                    'Recipe',
                    array(
                        'action' => isset($action) ? $action : 'add',
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
                            <div class="form-section">
                                <?php echo $this->Form->input(
                                    'Recipe.name',
                                    array(
                                        'placeholder' => 'Recipe Name',
                                        'label' => false,
                                        'class' => 'regular-form-input',
                                        'div' => 'form-row'
                                    )
                                ); ?>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>
                                Recipe Description
                            </legend>
                            <div class="form-section">
                                <div class="form-row">
                                    <?php echo $this->Form->textarea(
                                        'Recipe.description',
                                        array(
                                            'label' => false,
                                            'rows' => 3
                                        )
                                    ); ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>
                                Category
                            </legend>
                            <div class="form-section">
                                <?php echo $this->Form->input(
                                    'Recipe.category',
                                    array(
                                        'placeholder' => 'Category',
                                        'label' => false,
                                        'class' => 'regular-form-input',
                                        'div' => 'form-row'
                                    )
                                ); ?>
                            </div>
                        </fieldset>
                    </div>
                    <div class="span3">
                        <fieldset>
                            <legend>
                                Prep Time
                            </legend>
                            <?php echo $this->Form->dateTime('Recipe.prep_time', 'NONE', '24', array('class' => 'input-small')); ?>
                        </fieldset>
                        <fieldset>
                            <legend>
                                Cook Time
                            </legend>
                            <?php echo $this->Form->dateTime('Recipe.cook_time', 'NONE', '24', array('class' => 'input-small')); ?>
                        </fieldset>
                    </div>
                    <div class="span3 panel">
                        <fieldset id="edit-ingredient" data-type="Ingredient">
                            <legend>
                                Ingredients
                            </legend>
                            <div class="form-section" data-target="body">
                                <?php $j = 0;
                                if (isset($recipe['Ingredient'])) {
                                    foreach ($recipe['Ingredient'] as $ingredient) { ?>
                                        <div data-target="element" class="form-row">
                                            <?php echo $this->Form->hidden('Ingredient.'.$j.'.id'); ?>
                                            <?php echo $this->Form->hidden('Ingredient.'.$j.'.recipe_id'); ?>
                                            <?php echo $this->Form->text(
                                                'Ingredient.'.$j.'.measure_amount',
                                                array(
                                                    'class' => 'form-measure-amount',
                                                    'placeholder' => '#',
                                                    'div' => false
                                                )
                                            ); ?>
                                            <?php echo $this->Form->text(
                                                'Ingredient.'.$j.'.measure',
                                                array(
                                                    'class' => 'form-measure',
                                                    'placeholder' => 'Type',
                                                    'div' => false
                                                )
                                            ); ?>
                                            <hr>
                                            <?php echo $this->Form->text(
                                                'Ingredient.'.$j.'.name',
                                                array(
                                                    'class' => 'form-ingredient-name',
                                                    'placeholder' => 'Ingredient',
                                                    'div' => false
                                                )
                                            ); ?>
                                            <i class="icon-remove-sign icon-large delete-button" data-toggle="delete"></i>
                                        </div><?php
                                        $j++;
                                    }
                                } else { ?>
                                    <div data-target="element">
                                        <?php echo $this->Form->text(
                                            'Ingredient.'.$j.'.measure_amount',
                                            array(
                                                'class' => 'flat-bottom-right input-extra-mini',
                                                'placeholder' => '#',
                                                'div' => false
                                            )
                                        ); ?>
                                        <?php echo $this->Form->text(
                                            'Ingredient.'.$j.'.measure',
                                            array(
                                                'class' => 'flat-bottom-left input-medium',
                                                'placeholder' => 'Type',
                                                'div' => false
                                            )
                                        ); ?>
                                        <?php echo $this->Form->text(
                                            'Ingredient.'.$j.'.name',
                                            array(
                                                'class' => 'input-large pull-up flat-top',
                                                'placeholder' => 'Ingredient',
                                                'div' => false
                                            )
                                        ); ?>
                                        <i class="icon-remove-sign icon-large delete-button" data-toggle="delete"></i>
                                    </div> <?php
                                } ?>
                            </div>
                            <br>
                            <?php echo $this->Form->button(
                                '<i class="icon-plus"></i>',
                                array(
                                    'class' => 'btn btn-small btn-success btn-block',
                                    'id' => 'add-direction-button',
                                    'data-toggle' => 'add',
                                    'type' => 'button',
                                    'div' => false
                                )
                            ); ?>
                        </fieldset>
                    </div>
                    <div class="span3 panel">
                        <fieldset id="edit-direction">
                            <legend>
                                Method
                            </legend>
                            <div class="form-section" data-target="body">
                                <?php $i = 0;
                                if (isset($recipe['Direction'])) {
                                    foreach ($recipe['Direction'] as $direction) { ?>
                                        <div data-target="element" class="form-row">
                                            <?php echo $this->Form->hidden('Direction.'.$i.'.id'); ?>
                                            <?php echo $this->Form->hidden('Direction.'.$i.'.recipe_id'); ?>
                                            <?php echo $this->Form->hidden('Direction.'.$i.'.step_number'); ?>
                                            <label><?php echo $i + 1; ?></label>
                                            <?php echo $this->Form->text(
                                                'Direction.'.$i.'.step',
                                                array(
                                                    'placeholder' => 'Method',
                                                    'class' => 'form-method',
                                                    'div' => false
                                                )
                                            ); ?>
                                            <i class="icon-remove-sign icon-large delete-button" data-toggle="delete"></i>
                                        </div><?php
                                        $i++;
                                    }
                                } else { ?>
                                    <div data-target="element">
                                        <?php echo $this->Form->hidden('Direction.'.$i.'.step_number', array('value' => ($i + 1))); ?>
                                        <label><?php echo $i + 1; ?></label>
                                        <?php echo $this->Form->text(
                                            'Direction.'.$i.'.step',
                                            array(
                                                'placeholder' => 'Method',
                                                'div' => false
                                            )
                                        ); ?>
                                        <i class="icon-remove-sign icon-large delete-button" data-toggle="delete"></i>
                                    </div> <?php
                                } ?>
                            </div>
                            <br>
                            <?php echo $this->Form->button(
                                '<i class="icon-plus"></i>',
                                array(
                                    'class' => 'btn btn-small btn-success btn-block',
                                    'id' => 'add-direction-button',
                                    'data-toggle' => 'add',
                                    'type' => 'button',
                                    'div' => false
                                )
                            ); ?>
                        </fieldset>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <fieldset>
                            <div class="form-actions">
                                <?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary', 'div' => false)); ?>
                                <?php echo $this->Form->button(
                                    'Cancel',
                                    array(
                                        'class' => 'btn btn-danger',
                                        'div' => false,
                                        'name' => 'cancel'
                                    )
                                ); ?>
                            </div>
                        </fieldset>
                    </div>
                    <?php echo $this->Form->input('Recipe.id', array('type' => 'hidden')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div><!--/span-->
    </div><!--/row-->
</section>




