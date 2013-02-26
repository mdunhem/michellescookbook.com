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

            echo $this->Html->css(Configure::read('Cookbook.admin.css'));
            
        ?>

        <style type="text/css">
          body {
            padding-bottom: 40px;
          }
          .sidebar-nav {
            padding: 9px 0;
          }
        </style>

        <?php // Modernizer script ?>
        <?php echo $this->Html->script('vendor/modernizr-2.6.2.min.js'); ?>
    </head>

    <body>
        <!-- topbar starts -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/admin">
                        Dashboard
                    </a>
                    
                    <!-- user dropdown starts -->
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="divider-vertical"></li>
                            <li><a href="/">Home</a></li>
                        </ul>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <b class="caret"></b> <?php echo AuthComponent::user('username') ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.html">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- user dropdown ends -->
                    
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- topbar ends -->

        <div class="container-fluid">
            <div class="row-fluid">
                <!-- left menu starts -->
                <div class="span2 main-menu-span">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li class="nav-header hidden-tablet">Main</li>
                            <li><a class="" href="/admin"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                            <li><a class="" href="/admin/users"><i class="icon-eye-open"></i><span class="hidden-tablet"> Users</span></a></li>
                            <li><a class="" href="/admin/listGroups"><i class="icon-edit"></i><span class="hidden-tablet"> Groups</span></a></li>
                            <li><a class="" href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
                            <li><a class="" href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
                            <li><a class="" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
                        </ul>
                        <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                    </div><!--/.well -->
                </div><!--/span-->
                <br>
                <!-- left menu ends -->
                
                <div id="content" class="span10">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>

                <!-- content ends -->
                </div><!--/#content.span10-->
            </div><!--/fluid-row-->
            
            <hr>

            <div class="modal hide fade" id="myModal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary">Save changes</a>
                </div>
            </div>

            <?php // Footer
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
            ); ?>

        </div><!--/.fluid-container-->

        <?php echo $this->Html->script(Configure::read('Cookbook.admin.js')); ?>
        <div id="bufferedScripts">
            <?php echo $this->Js->writeBuffer(array('safe' => false)); ?>
        </div>
        
    </body>
</html>






























<?php
/*

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
?>
<div class="container-fluid">
    <?php echo $this->Session->flash(); ?>
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Sidebar</li>
                    <li><?php echo $this->Html->link('Dashboard', array('controller' => 'adminpages', 'action' => 'dashboard')) ?></li>
                    <li><?php echo $this->Html->link('Users', array('controller' => 'adminpages', 'action' => 'listUsers')) ?></li>
                    <li><?php echo $this->Html->link('Groups', array('controller' => 'adminpages', 'action' => 'listGroups')) ?></li>
                </ul>
              </div><!--/.well -->
        </div>

        <div class="span9">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
</div>
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

*/
?>
