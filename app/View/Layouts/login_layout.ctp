<?php
/**
 *  Login Layout file
 *
 *  File: Layouts/login_layout.ctp
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.9.0
 * @package       Cake.View.Layouts
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php
            echo $this->Html->charset();
            echo $this->Html->meta(
                array(
                    'http-equiv' => 'X-UA-Compatible',
                    'content' => 'IE=edge,chrome=1'
                )
            );
            echo $this->Html->meta('description', '');
            echo $this->Html->meta(
                array(
                    'name' => 'viewport',
                    'content' => 'initial-scale=1.0, user-scalable=no'
                )
            );
            echo $this->Html->meta('icon');
        ?>

        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            // echo $this->Html->css('bootstrap');
            // echo $this->Html->css('bootstrap-responsive');
            // echo $this->Html->css(
            //     array(
            //         'themes/michelles-cookbook.css',
            //         'http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css',
            //         // 'http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css',
            //         'style',
            //         'style-responsive',
            //         'custom-bootstrap',
            //         'custom'
            //     )
            // );
            echo $this->Html->css(Configure::read('Cookbook.css'));

            echo $this->fetch('meta');
            echo $this->fetch('css');

            echo $this->Html->script('http://code.jquery.com/jquery-1.8.2.min.js');
            echo $this->Html->script('http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js');

            // Modernizer script
            echo $this->Html->script('vendor/modernizr-2.6.2.min.js');
        ?>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- jQuery Mobile Page Element -->
        <div data-role="page" data-theme="c" data-add-back-btn="false">

            <!-- Main Content -->
            <div data-role="content">
                <div class="container-fluid">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                </div><!--/.fluid-container-->
            </div> <!-- /Content -->

        </div> <!-- /Page -->

            

        <!-- scripts that I don't want minified by ant build script-->
        
        <?php // echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'); ?>
        <?php
            // echo $this->Html->scriptBlock('window.jQuery || document.write("<script src=\'/js/vendor/jquery-1.8.2.min.js\'><\/script>")');
        ?>

        <?php echo $this->Html->script('vendor/bootstrap.js'); ?>
        <?php echo $this->Html->script('recipe.js'); ?>
        <?php echo $this->Html->script('jquery.validate.js'); ?>

        <!-- scripts concatenated and minified via ant build script-->
        <?php echo $this->Html->script('plugins.js'); ?>
        <?php echo $this->Html->script('main.js'); ?>
        <!-- end scripts-->

        <?php echo $this->fetch('script'); ?>

        <?php echo $this->Js->writeBuffer(array('safe' => false)); ?>


    </body>
</html>
