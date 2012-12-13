<?php
/**
 *  Navigation View Element
 *
 *  File: Elements/nav.ctp
 *
 * @copyright     Mikael Dunhem, 2012
 * @link          http://github.com/mdunhem
 * @since         Michelle's Cookbook v 0.2.2
 * @package       Cake.View.Elements
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div class="navbar navbar-inverse" data-role="header" data-theme="a">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/"><?php echo Configure::read('Cookbook.name'); ?></a>
            <div class="nav-collapse collapse">
                <?php echo $this->Menu->render($leftMenu); ?>
                <?php echo $this->Menu->render($rightMenu); ?>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<?php /*
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/"><?php echo Configure::read('Cookbook.name'); ?></a>
            <div class="nav-collapse collapse">
                <?php echo $this->Menu->render($leftMenu); ?>
                <?php echo $this->Menu->render($rightMenu); ?>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
*/ ?>