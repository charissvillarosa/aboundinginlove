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
    echo $this->Html->css('background');

    echo $this->Html->script('jquery');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('app');

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
            $('a[rel=popover]').popover({html: 'true'});
            
            //add event for logo scrolling
            //apply event when there is a .banner element
            if ($('.banner').length > 0) 
            {
                $(window).scroll(function(e) {
                    var hHeight = $('.banner').height() + $('.banner').position().top;
                    var lHeight = $('.logo').height();
                    var nHeight = $('.navbar').height();
                    var sTop = $(window).scrollTop();
                    var bannerViewHeight = hHeight - sTop;
                    
                    if (bannerViewHeight < nHeight) {
                        var top = nHeight - lHeight;
                        $('.logo').removeClass('scroll').css('top', top + 'px');
                    }
                    else if (bannerViewHeight < lHeight) {
                        var top = hHeight - lHeight;
                        $('.logo').addClass('scroll').css('top', top + 'px');
                    }
                    else if ($('.logo').hasClass('scroll')) {
                        $('.logo').removeClass('scroll').css('top', '0');
                    }
                });
            }
        });
    </script>
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div>
        <div class="header container">
            <?php include 'common_header.php' ?>
        </div>
        <div class="clearfix">
            <div class="clearfix">
                <div class="container">
                    <div class="logo">
                        <div>
                            <?php
                            echo $this->Html->image('aboundinginlove_logo.png', array('alt'=>'Abounding in Love Organization Logo'));
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_floating_style addthis_32x32_style" style="right:0;bottom:0;">
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_compact"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-520a17f6475162a2"></script>
                <!-- AddThis Button END -->
                 
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
    <div style="width:310px; left:60%;" id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
