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
        <div class="header container margin1">
            <!--<div class="pull-left laftmargin">
                <p><b>Charity Slogan put here...</b></p>
            </div>-->
            <?php include 'common_header.php' ?>
        </div>
        <div class="clearfix">
            <div id="menu">
                <div class="container">
                    <div class="pull-right">
                        <div class="btn-group">
                            <?php echo $this->Html->link('DONATE NOW', array('controller' => 'donations', 'action' => 'index'), array('class' => 'btn btn-info')); ?>
                            <!--<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="">
                                DONATE NOW
                            </a>-->
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                                SPONSOR A CHILD
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- dropdown menu links -->
                                <li>
                                    <?php 
                                    echo $this->Html->link('List of Sponsees', array('controller'=>'sponsees')); ?>
                                </li>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="#">Lorem ipsum dolor sit amet</a></li>
                                <li><a tabindex="-1" href="#">Urna et risus vitae</a></li>
                                <li><a tabindex="-1" href="#">Suscipit ligula</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                                ABOUT US
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                                WHAT WE DO?
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                                PORTFOLIO
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-info dropdown-toggle" 
                               rel="popover" 
                               data-toggle="popover" 
                               data-placement="bottom" 
                               data-toggle="popover"
                               data-content="
                               <p>Choose from the three options below to contact us online:</p>
                               <ul>
                               <li><a href='#'>Questions</a></li>
                               <li><a href='#'>Feedback</a></li>
                               <li><a href='#'>Report Website Problem</a></li>
                               </ul>
                               <hr>
                               <h6>Phone Numbers: </h6>
                               <p class='leftmargin1'>(032)438-9390 / (032)438-9390</p>
                               <hr>
                               <p><b>Email : </b><span class='leftmargin1'>example@yahoo.com</span></p>
                               "
                               title="CONTACT US">CONTACT US</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="span11">
                    <div class="tree pull-left">
                        <div class="span2 pull-right topmargin3">
                            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">Projects</a></p>
                            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">Program</a></p>
                            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">Login</a></p>
                            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">Register</a></p>
                        </div>
                        <div class="span2 pull-right topmargin3">
                            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">Donate Now</a></p>
                            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">What we do?</a></p>
                            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">Portfolio</a></p>
                            <p class="fontcolor1 leftmargin1 topmargin1">
                                <a href="#" 
                                       rel="popover" 
                                       data-toggle="popover" 
                                       data-placement="left" 
                                       data-toggle="popover"
                                       data-content="
                                       <p>Choose from the three options below to contact us online:</p>
                                       <ul>
                                       <li><a href='#'>Questions</a></li>
                                       <li><a href='#'>Feedback</a></li>
                                       <li><a href='#'>Report Website Problem</a></li>
                                       </ul>
                                       <hr>
                                       <h6>Phone Numbers: </h6>
                                       <p class='leftmargin1'>(032)438-9390 / (032)438-9390</p>
                                       <hr>
                                       <p><b>Email : </b><span class='leftmargin1'>example@yahoo.com</span></p>
                                       "
                                       title="CONTACT US">Contact Us
                                </a>
                            </p>
                        </div>
                        <div class="span3 pull-right topmargin3">
                            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">Donate Now</a></p>
                            <p class="fontcolor1 leftmargin1 topmargin1">Sponsor a child</p>
                            <ul>
                                <li class="leftmargin1"><a href="#">List of Sponsees</a></li>
                                <li class="leftmargin2"><a href="#">Lorem ipsum dolor sit amet</a></li>
                                <li class="leftmargin2"><a href="#">Urna et risus vitae</a></li>
                                <li class="leftmargin2"><a href="#">Suscipit ligula</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright clear leftloat">
                <div class="pull-left"><p>&copy; Copyright 2013. Charity Name: All Rights Reserved.</p></div>
                <div class="pull-right">
                    <p>
                        Follow Us on :
                        <?php
                        echo $this->Html->image('facebook_icon.png', array('url' => 'https://www.facebook.com/', 'class' => 'leftmargin5', 'target' => '_blank', 'escape' => false));
                        echo $this->Html->image('twitter_icon.png', array('url' => 'https://twitter.com/', 'class' => 'leftmargin5', 'target' => '_blank', 'escape' => false));
                        echo $this->Html->image('youtube_icon.png', array('url' => 'http://www.youtube.com/', 'class' => 'leftmargin5', 'target' => '_blank', 'escape' => false));
                        echo $this->Html->image('linkedin_icon.png', array('url' => 'http://www.linkedin.com/', 'class' => 'leftmargin5', 'target' => '_blank', 'escape' => false));
                        ?>
                    </p>
                </div>
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
