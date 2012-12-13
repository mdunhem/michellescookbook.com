<?php
/**
 *  Index Template
 *
 *  File: Recipes/index.ctp
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.1.0
 * @package       Cake.View.Recipes
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div class="row-fluid">
    <div class="span12">
        <div class="well">
            <h1>Recipes</h1>
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <?php echo $this->Form->create(
                        'Recipe',
                        array(
                            'url' => 'search',
                            'default' => true
                        )
                    ); ?>
                    <?php echo $this->Form->input(
                        'Search.term',
                        array(
                            'label' => false,
                            'type' => 'text',
                            'div' => false,
                            'data-type' => 'search',
                            'data-theme' => 'c'
                        )
                    ); ?>
                </div>
            </div>
            <p>
                <?php echo $this->Form->submit(
                    'Search',
                    array(
                        'class' => 'btn',
                        'div' => false,
                    )
                ); ?>
                <a class="btn pull-right" href="<?php 
                    echo $this->Html->url(
                        array(
                            'controller' => 'recipes',
                            'action' => 'search',
                            'category',
                            'find-all'
                        )
                    ); ?>">
                    View All
                </a>
            </p>
            <?php echo $this->Form->end(); ?>
        </div>
        <div class="page-header">
            <h1>Search by Category</h1>
        </div>
        <div class="row-fluid">
            <ul data-role="listview" data-inset="true">
                <li>
                    <a href="<?php 
                        echo $this->Html->url(
                            array(
                                'controller' => 'recipes',
                                'action' => 'search',
                                'category',
                                'breakfast'
                            )
                        ); ?>">
                        Breakfast
                    </a>
                </li>
                <li>
                    <a href="<?php 
                        echo $this->Html->url(
                            array(
                                'controller' => 'recipes',
                                'action' => 'search',
                                'category',
                                'lunch'
                            )
                        ); ?>">
                        Lunch
                    </a>
                </li>
                <li>
                    <a href="<?php 
                        echo $this->Html->url(
                            array(
                                'controller' => 'recipes',
                                'action' => 'search',
                                'category',
                                'dinner'
                            )
                        ); ?>">
                        Dinner
                    </a>
                </li>
                <li>
                    <a href="<?php 
                        echo $this->Html->url(
                            array(
                                'controller' => 'recipes',
                                'action' => 'search',
                                'category',
                                'desert'
                            )
                        ); ?>">
                        Desert
                    </a>
                </li>
                <li>
                    <a href="<?php 
                        echo $this->Html->url(
                            array(
                                'controller' => 'recipes',
                                'action' => 'search',
                                'category',
                                'chicken'
                            )
                        ); ?>">
                        Chicken
                    </a>
                </li>
                <li>
                    <a href="<?php 
                        echo $this->Html->url(
                            array(
                                'controller' => 'recipes',
                                'action' => 'search',
                                'category',
                                'steak'
                            )
                        ); ?>">
                        Steak
                    </a>
                </li>
                <li>
                    <a href="<?php 
                        echo $this->Html->url(
                            array(
                                'controller' => 'recipes',
                                'action' => 'search',
                                'category',
                                'pastry'
                            )
                        ); ?>">
                        Pastry
                    </a>
                </li>
            </ul>
        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->


