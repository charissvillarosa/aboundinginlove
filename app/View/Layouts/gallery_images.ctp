<?php
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
    echo $this->Html->css('style');
    ?>

    <style>
        @import url(http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light);

        html,body{height:100%;}
        *{outline:none;}
        body{margin:0px; padding:0px; background:#000;}
        #toolbar{position:fixed; z-index:3; right:10px; top:50px; padding:5px; background:url(http://localhost/aboundinginlove/app/webroot/img/gallery/fs_img_g_bg.png);}
        #toolbar img{border:none;}
        #img_title{position:fixed; z-index:3; left:10px; top:50px; padding:10px; background:url(http://localhost/aboundinginlove/app/webroot/img/gallery/fs_img_g_bg.png); color:#FFF; font-family:'Josefin Sans Std Light', arial, serif; font-size:24px; text-transform:uppercase;}
        #bg{position:fixed; z-index:1; overflow:hidden; width:100%; height:100%;}
        #bgimg{display:none; -ms-interpolation-mode: bicubic;}
        #preloader{position:relative; z-index:3; width:32px; padding:20px; top:80px; margin:auto; background:#000;}
        #thumbnails_wrapper{z-index:2; position:fixed; bottom:0; width:100%; background:url(http://localhost/aboundinginlove/app/webroot/img/gallery/empty.gif); /* stupid ie needs a background value to understand hover area */}
        #outer_container{position:relative; padding:0; width:100%; margin:40px auto;}
        #outer_container .thumbScroller{position:relative; overflow:hidden; background:url(http://localhost/aboundinginlove/app/webroot/img/gallery/fs_img_g_bg.png);}
        #outer_container .thumbScroller, #outer_container .thumbScroller .container, #outer_container .thumbScroller .content{height:170px;}
        #outer_container .thumbScroller .container{position:relative; left:0;}
        #outer_container .thumbScroller .content{float:left;}
        #outer_container .thumbScroller .content div{margin:5px; height:100%;}
        #outer_container .thumbScroller img{border:5px solid #fff;}
        #outer_container .thumbScroller .content div a{display:block; padding:5px;}

        .nextImageBtn, .prevImageBtn{display:block; position:absolute; width:50px; height:50px; top:50%; margin:-25px 10px 0 10px; z-index:3; filter:alpha(opacity=40); -moz-opacity:0.4; -khtml-opacity:0.4; opacity:0.4;}
        .nextImageBtn:hover,.prevImageBtn:hover{filter:alpha(opacity=80); -moz-opacity:0.8; -khtml-opacity:0.8; opacity:0.8;}
        .nextImageBtn{right:0; background:#000 url(http://localhost/aboundinginlove/app/webroot/img/gallery/nextImgBtn.png) center center no-repeat;}
        .prevImageBtn{background:#000 url(http://localhost/aboundinginlove/app/webroot/img/gallery/prevImgBtn.png) center center no-repeat;}
    </style>

    <?php
    echo $this->Html->script('jquery');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('app');
    echo $this->Html->script('html5lightbox'); //portfolio images effect
    echo $this->Html->script('jquery.easing.1.3'); //gallery images effect

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
                        var top = Math.min(nHeight, lHeight) - lHeight;
                        $('.logo').removeClass('scroll').css('top', top + 'px');
                    }
                    else if (bannerViewHeight < lHeight) {
                        var top = Math.min(bannerViewHeight, lHeight) - lHeight;
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
            <div class="pull-right">
                <?php include 'common_header.php' ?>
            </div>
        </div>
        <div class="clearfix">
            <div>
                <?php
                $user = $this->Session->read('Auth.User');
                $controller = $this->name;
                
                if ($user && $user['role'] == 'admin') :
                ?>
                <div>
                    <div class="navbar navbar-static-top" style="margin: -1px -1px 0;">
                        <div class="navbar-inner">
                            <div class="container" style="width: auto; padding: 0 20px;">
                                <ul class="nav">
                                    <li class="divider-vertical"></li>
                                    <li class="<?php echo $controller == 'Sponsees' ? 'active' : '' ?>">
                                        <?php echo $this->Html->link('Sponsees', array('controller' => 'sponsees', 'action' => 'index')); ?>
                                    </li>
                                    <li class="divider-vertical"></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li class="<?php echo $controller == 'SponseeNeedCategories' ? 'active' : '' ?>">
                                                <?php echo $this->Html->link('Need Categories', array('controller' => 'SponseeNeedCategories', 'action' => 'listing')); ?>
                                            </li>
                                            <li class="<?php echo $controller == 'PortfolioCategories' ? 'active' : '' ?>">
                                                <?php echo $this->Html->link('Portfolio Categories', array('controller' => 'PortfolioCategories', 'action' => 'listing')); ?>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="divider-vertical"></li>
                                    <li class="<?php echo $controller == 'Users' ? 'active' : '' ?>">
                                        <?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?>
                                    </li>
                                    <li class="divider-vertical"></li>
                                    <li class="<?php echo $controller == 'DonationHistory' ? 'active' : '' ?>">
                                        <?php echo $this->Html->link('Donations', array('controller' => 'DonationHistory', 'action' => 'listing')); ?>
                                    </li>
                                    <li class="divider-vertical"></li>
                                    <li class="<?php echo $controller == 'SendUpdate' ? 'active' : '' ?>">
                                        <?php echo $this->Html->link('Send Update Email', array('controller' => 'SendUpdate', 'action' => 'listing')); ?>
                                    </li>
                                    <li class="divider-vertical"></li>
                                    <li class="<?php echo $controller == 'InviteFriends' ? 'active' : '' ?>">
                                        <?php echo $this->Html->link('Invites', array('controller' => 'InviteFriends', 'action' => 'listing')); ?>
                                    </li>
                                    <li class="divider-vertical"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
    <!--     login modal-->
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
