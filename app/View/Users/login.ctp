<?php
/**
 *  Login View Template
 *
 *  File: Users/login.ctp
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.2.1
 * @package       Cake.View.Users
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<section class="RecipesForm" id="loginForm">
    <div class="row-fluid">
        <div class="span4">
            <div class="well well-large">
                <?php echo $this->Form->create('User', array('action' => 'login', 'data-ajax' => 'false')); ?>
                <fieldset>
                    <legend>
                        <?php echo __("Michelle's Recipes"); ?>
                    </legend>
                    <ul data-role="listview" data-inset="true">
                        <li class="form-row" data-icon="false">
                            <a href="#" class="hidden"></a>
                            <?php echo $this->Form->text(
                                'username',
                                array(
                                    'class' => 'full-size-input',
                                    'placeholder' => 'Username'
                                )
                            ); ?>
                        </li>
                        <li class="form-row" data-icon="false">
                            <a href="#" class="hidden"></a>
                            <?php echo $this->Form->password(
                                'password',
                                array(
                                    'class' => 'full-size-input',
                                    'placeholder' => 'Password'
                                )
                            ); ?>
                        </li>
                    </ul>
                </fieldset>
                <?php echo $this->Form->submit(
                    'Login',
                    array(
                        'class' => 'btn btn-primary btn-block',
                        'div' => false
                    )
                ); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
