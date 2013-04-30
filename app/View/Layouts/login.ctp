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
$cakeDescription = "Website Name";
$title_for_layout = "Home";
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
            $('.dropdown-toggle').dropdown()
            
            // hide and fadeIn all cake flash messages
            $('.message').hide().fadeIn();
            
            //contact us pop up window
            $('a[rel=popover]').popover({html: 'true'})
        })
    </script>
</head>
<body>
    <div id="container">
        <div id="header">
            <div class="leftfloat leftmargin3">
                <p>
                    <?php echo $this->Html->image('smalllogo.png', array('width'=>'80px', 'height'=>'82px', 'alt'=>'logo'));?>
                    <b>Charity Slogan put here...</b>
                </p>
            </div>
            <div class="rightfloat">
                <span id="home"><?php echo $this->Html->link('HOME', '/home'); ?></span>
                <span id="projects"><?php echo $this->Html->link('PROJECTS', '/projects'); ?></span>
                <span id="program"><?php echo $this->Html->link('PROGRAMS', '/programs'); ?></span>
                <span id="register"><?php echo $this->Html->link('REGISTER', '/register'); ?></span>
            </div>
            <div id="menu" class="rightfloat">
                <div class="btn-group">
                    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                        DONATE
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- dropdown menu links -->
                        <li><a tabindex="-1" href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a tabindex="-1" href="#">Urna et risus vitae</a></li>
                        <li><a tabindex="-1" href="#">Suscipit ligula</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Eros justo et sit ut felis</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">Lorem ipsum dolor sit amet</a></li>
                                <li><a tabindex="-1" href="#">Urna et risus vitae</a></li>
                                <li><a tabindex="-1" href="#">Suscipit ligula</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Eros justo et sit ut felis</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Suscipit ligula</a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="#">Lorem ipsum dolor sit amet</a></li>
                                        <li><a tabindex="-1" href="#">Urna et risus vitae</a></li>
                                        <li><a tabindex="-1" href="#">Suscipit ligula</a></li>
                                    </ul>
                                </li>
                                <li><a tabindex="-1" href="#">Lorem ipsum dolor sit amet</a></li>
                                <li><a tabindex="-1" href="#">Urna et risus vitae</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="btn-group">
                    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                        SPONSOR A CHILD
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- dropdown menu links -->
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Eros justo et sit ut felis</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">Lorem ipsum dolor sit amet</a></li>
                                <li><a tabindex="-1" href="#">Urna et risus vitae</a></li>
                                <li><a tabindex="-1" href="#">Suscipit ligula</a></li>
                            </ul>
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
        <div id="logincontent">
             <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
            <div class="tree leftfloat"></div>
            <div class="leftfloat topmargin1 width3">
                <p class="fontcolor1 fontsize1 leftmargin1 topmargin2">Donate</p>
                <ul>
                    <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="#">Urna et risus vitae</a></li>
                    <li><a href="#">Suscipit ligula</a></li>
                    <li><a href="#">Eros justo et sit ut felis</a></li>
                    <li class="leftmargin2"><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li class="leftmargin2"><a href="#">Urna et risus vitae</a></li>
                    <li class="leftmargin2"><a href="#">Suscipit ligula</a></li> 
            </div>
            <div class="leftfloat topmargin1 width3">
                <p class="fontcolor1 fontsize1 leftmargin1 topmargin2">&nbsp;</p>
                <ul>
                    <li><a href="#">Eros justo et sit ut felis</a>
                    <li class="leftmargin2"><a href="#">Suscipit ligula</a></li>
                    <li class="leftmargin3"><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li class="leftmargin3"><a href="#">Urna et risus vitae</a></li>
                    <li class="leftmargin3"><a href="#">Suscipit ligula</a></li>
                    <li class="leftmargin2"><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li class="leftmargin2"><a href="#">Urna et risus vitae</a></li>
                </ul>
            </div>
            <div class="leftfloat topmargin1 width3">
                <p class="fontcolor1 fontsize1 leftmargin1 topmargin2">Sponsor a child</p>
                <ul>
                    <li><a href="#">Eros justo et sit ut felis</a></li>
                    <li class="leftmargin2"><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li class="leftmargin2"><a href="#">Urna et risus vitae</a></li>
                    <li class="leftmargin2"><a href="#">Suscipit ligula</a></li> 
                    <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="#">Urna et risus vitae</a></li>
                    <li><a href="#">Suscipit ligula</a></li>
                </ul>
            </div>
            <div class="leftfloat topmargin1 width3">
                <p class="fontcolor1 fontsize1 leftmargin1 topmargin2">&nbsp;</p>
                <ul>
                    <li><a href="#">About Us</a>
                    <li><a href="#">What we do?</a>
                    <li><a href="#">Portfolio</a>
                    <li>
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
                        title="CONTACT US">Contact Us</a>
                    </li>
                    <li><a href="#">Projects</a>
                    <li><a href="#">Program</a>
                    <li><a href="#">Login</a>
                    <li><a href="#">Register</a>
                </ul>
            </div>
            <div class="copyright clear leftloat">
               <div class="leftfloat"><p>&copy; Copyright 2013. Charity Name: All Rights Reserved.</p></div>
               <div class="rightfloat">
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
</body>
</html>
