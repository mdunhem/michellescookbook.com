<?php
/**
 *  Main Layout file
 *
 *  File: Layouts/default.ctp
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Recipes v 0.1.0
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
            
            echo $this->Html->tag(
                'title',
                $title_for_layout
            );

            // echo $this->Html->css('bootstrap');
            // echo $this->Html->css('bootstrap-responsive');
            echo $this->Html->css(Configure::read('Cookbook.css'));

            // echo $this->fetch('meta');
            // echo $this->fetch('css');

            // Load jQuery and have a local fall back in case of no internet
            echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
            echo $this->Html->scriptBlock(
                'window.jQuery || document.write("<script src=\'/js/vendor/jquery-1.8.2.min.js\'><\/script>")'
            );

            // Load jQuery Mobile and have a local fall back in case of no internet
            // echo $this->Html->script('http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js');
            echo $this->Html->scriptBlock(
                'window.jQuery.mobile || document.write("<script src=\'/js/vendor/jquery.mobile.js\'><\/script>")'
            );

            echo $this->Html->script('jquery.mobile.recipe.js');

            // Modernizer script
            echo $this->Html->script('vendor/modernizr-2.6.2.min.js');
        ?>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
<?php
    // jQuery Mobile Page Element
    if(Router::url($this->Session->read('redirectURL'))) {
        $newUrl = Router::url($this->Session->read('redirectURL'));
        echo '<div data-role="page" data-url="' . $newUrl . '" data-theme="c" data-add-back-btn="false">';
        CakeSession::delete('redirectURL');
    } else {
        echo '<div data-role="page" data-theme="c" data-add-back-btn="false">';
    }

    // Header / Dynamically created
    echo $this->element('nav');

    // Main Content
    echo $this->Html->div(
        null,
        $this->Html->div(
            'container-fluid',
            $this->Session->flash() . $this->fetch('content')
        ),
        array(
            'data-role' => 'content'
        )
    );
    echo '<hr>';

    // Footer
    $text = $this->Html->para('pull-left', '&copy; <a href="//github.com/mdunhem">Mikael Dunhem</a> 2012');
    $text .= $this->Html->para('pull-right', 'v' . Configure::read('Cookbook.version'));
    echo $this->Html->div(
        null,
        $this->Html->div(
            'container-fluid',
            $this->Html->div(
                'row-fluid',
                $this->Html->div(
                    'span12',
                    $text
                )
            )
        ),
        array(
            'data-role' => 'footer'
        )
    );
    
    // End of page div
    echo '</div>';

    // scripts that should not be minified... for now
    echo $this->Html->script('vendor/bootstrap.js');
    echo $this->Html->script('jquery.validate.js');
    // end non minified scripts

    // scripts concatenated and minified via ant build script
    echo $this->Html->script('plugins.js');
    echo $this->Html->script('main.js');
    // end scripts

    echo $this->fetch('script');

    echo $this->Js->writeBuffer(array('safe' => false));
?>
    </body>
</html>
