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
<html lang="en">
<head>
    <!--
        Charisma v1.0.0

        Copyright 2012 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
    -->
    <meta charset="utf-8">
    <title>Free HTML5 Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive2.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    <link href='css/fullcalendar.css' rel='stylesheet'>
    <link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
    <link href='css/chosen.css' rel='stylesheet'>
    <link href='css/uniform.default.css' rel='stylesheet'>
    <link href='css/colorbox.css' rel='stylesheet'>
    <link href='css/jquery.cleditor.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/opa-icons.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
        
</head>

<body>
    <?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
    <!-- topbar starts -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="index.html">
                    <span><?php echo Configure::read('Cookbook.name'); ?></span>
                </a>
                
                <!-- theme selector starts -->
                <div class="btn-group pull-right theme-container" >
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" id="themes">
                        <li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
                        <li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
                        <li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
                        <li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
                        <li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
                        <li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
                        <li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
                        <li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
                        <li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
                    </ul>
                </div>
                <!-- theme selector ends -->
                
                <!-- user dropdown starts -->
                <div class="btn-group pull-right" >
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user"></i><span class="hidden-phone"> admin</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <!-- user dropdown ends -->
                
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- topbar ends -->
    <?php } ?>
    <div class="container-fluid">
        <div class="row-fluid">
        <?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
        
            <!-- left menu starts -->
            <div class="span2 main-menu-span">
                <div class="well nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li class="nav-header hidden-tablet">Main</li>
                        <li><a class="ajax-link" href="/admin"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                        <li><a class="ajax-link" href="/admin/listUsers"><i class="icon-eye-open"></i><span class="hidden-tablet"> Users</span></a></li>
                        <li><a class="ajax-link" href="/admin/listGroups"><i class="icon-edit"></i><span class="hidden-tablet"> Groups</span></a></li>
                        <li><a class="ajax-link" href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
                        <li><a class="ajax-link" href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
                        <li><a class="ajax-link" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
                    </ul>
                    <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                </div><!--/.well -->
            </div><!--/span-->
            <!-- left menu ends -->
            
            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
            </noscript>
            
            <div id="content" class="span10">
                <?php echo $this->fetch('content'); ?>
                
            <?php } ?>
        <?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
            <!-- content ends -->
            </div><!--/#content.span10-->
        <?php } ?>
        </div><!--/fluid-row-->
        <?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
        
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
        <?php } ?>

    </div><!--/.fluid-container-->

    <!-- external javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- jQuery -->
    <script src="js/jquery-1.7.2.min.js"></script>
    <!-- jQuery UI -->
    <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
    <!-- transition / effect library -->
    <script src="js/bootstrap-transition.js"></script>
    <!-- alert enhancer library -->
    <script src="js/bootstrap-alert.js"></script>
    <!-- modal / dialog library -->
    <script src="js/bootstrap-modal.js"></script>
    <!-- custom dropdown library -->
    <script src="js/bootstrap-dropdown.js"></script>
    <!-- scrolspy library -->
    <script src="js/bootstrap-scrollspy.js"></script>
    <!-- library for creating tabs -->
    <script src="js/bootstrap-tab.js"></script>
    <!-- library for advanced tooltip -->
    <script src="js/bootstrap-tooltip.js"></script>
    <!-- popover effect library -->
    <script src="js/bootstrap-popover.js"></script>
    <!-- button enhancer library -->
    <script src="js/bootstrap-button.js"></script>
    <!-- accordion library (optional, not used in demo) -->
    <script src="js/bootstrap-collapse.js"></script>
    <!-- carousel slideshow library (optional, not used in demo) -->
    <script src="js/bootstrap-carousel.js"></script>
    <!-- autocomplete library -->
    <script src="js/bootstrap-typeahead.js"></script>
    <!-- tour library -->
    <script src="js/bootstrap-tour.js"></script>
    <!-- library for cookie management -->
    <script src="js/jquery.cookie.js"></script>
    <!-- calander plugin -->
    <script src='js/fullcalendar.min.js'></script>
    <!-- data table plugin -->
    <script src='js/jquery.dataTables.min.js'></script>

    <!-- chart libraries start -->
    <script src="js/excanvas.js"></script>
    <script src="js/jquery.flot.min.js"></script>
    <script src="js/jquery.flot.pie.min.js"></script>
    <script src="js/jquery.flot.stack.js"></script>
    <script src="js/jquery.flot.resize.min.js"></script>
    <!-- chart libraries end -->

    <!-- select or dropdown enhancer -->
    <script src="js/jquery.chosen.min.js"></script>
    <!-- checkbox, radio, and file input styler -->
    <script src="js/jquery.uniform.min.js"></script>
    <!-- plugin for gallery image view -->
    <script src="js/jquery.colorbox.min.js"></script>
    <!-- rich text editor library -->
    <script src="js/jquery.cleditor.min.js"></script>
    <!-- notification plugin -->
    <script src="js/jquery.noty.js"></script>
    <!-- file manager library -->
    <script src="js/jquery.elfinder.min.js"></script>
    <!-- star rating plugin -->
    <script src="js/jquery.raty.min.js"></script>
    <!-- for iOS style toggle switch -->
    <script src="js/jquery.iphone.toggle.js"></script>
    <!-- autogrowing textarea plugin -->
    <script src="js/jquery.autogrow-textarea.js"></script>
    <!-- multiple file upload plugin -->
    <script src="js/jquery.uploadify-3.1.min.js"></script>
    <!-- history.js for cross-browser state change on ajax -->
    <script src="js/jquery.history.js"></script>
    <!-- application script for Charisma demo -->
    <script src="js/charisma.js"></script>
    
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
