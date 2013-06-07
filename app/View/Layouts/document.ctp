<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = "A Bounding In Love";
?>
<?php
echo $this->Html->docType('html5');
// Outputs: <!DOCTYPE html>
?>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?> :
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('cake.generic');
    echo $this->Html->css('docs');
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('bootstrap-responsive');

    echo $this->Html->script('jquery.js');
    echo $this->Html->script('bootstrap.min');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <script>
        $(function() {
            //for menu style and listing
            $('.dropdown-toggle').dropdown();

            //hide and fadeIn all cake flash messages
            $('.message').hide().fadeIn();

            //contact us pop up window
            $('a[rel=popover]').popover({html: 'true'})
        })
    </script>
</head>
<body>
    <div>
        <div class="header container margin2">
            <div class="pull-left span4">
                <p class="fontcolor1 fontsize1">
                    <?php echo $this->Html->image('smalllogo.png', array('alt' => 'logo')); ?>
                </p>
            </div>
            <div class="pull-right" style="margin-top: 30px;">
                <?php include 'common_header.php' ?>
            </div>
        </div>
        <div id="logincontent" class="clearfix">
            <div class="clearfix container">
                <?php
                $user = $this->Session->read('Auth.User');
                $controller = $this->name;
                
                if ($user && $user['role'] == 'admin') :
                ?>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="<?php echo $controller == 'Sponsees' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Sponsees', array('controller'=>'sponsees', 'action'=>'index')); ?>
                        </li>
                        <li class="<?php echo $controller == 'Users' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Users', array('controller'=>'users', 'action'=>'index')); ?>
                        </li>
                        <li class="<?php echo $controller == 'SponseeNeedCategories' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Categories', array('controller'=>'SponseeNeedCategories', 'action'=>'listing')); ?>
                        </li>
                        <li class="<?php echo $controller == 'Portfolios' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Portfolio', array('controller'=>'Portfolios', 'action'=>'portfolioname')); ?>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <?php include 'common_footer.php' ?>
            </div>
            <div class="copyright clear leftloat">
                <?php include 'common_copyright.php' ?>
            </div>
        </div>
    </div>
    <!-- login modal -->
    <div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Login</h3>
        </div>
        <div class="modal-body leftmargin1">
            <?php echo $this->Session->flash(""); ?>
            <?php echo $this->Form->create("User", array('url' => array('controller' => 'users', 'action' => 'login'))); ?>
            <fieldset>
                <?php
                echo $this->Form->input("username");
                echo $this->Form->input("password");
                ?>
            </fieldset>
            <?php echo $this->Form->end("Login", array("class" => "btn btn-info")); ?>
        </div>
    </div>
</body>
</html>
