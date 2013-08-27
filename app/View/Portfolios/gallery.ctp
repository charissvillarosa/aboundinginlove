<div class="pull-right span11 topmargin1">
    <div class="navbar banner">
        <div class="navbar-inner">
            <ul class="nav">
                <li>
                    <?php echo $this->Html->link('Portfolio', array('controller' => 'portfolios', 'action' => 'index')); ?>
                </li>
                <li class="active">
                    <?php echo $this->Html->link('Gallery', array('controller' => 'portfolios', 'action' => 'gallery')); ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="well">
        <!-- Start WOWSlider.com BODY section -->
        <div id="wowslider-container1">
            <div class="ws_images"><ul>
                    <li><img src="http://localhost/aboundinginlove/app/webroot/img/gallery/image1.jpg" alt="Image 1" title="Image 1" id="wows1_0"/>Description</li>
                </ul></div>
            <div class="ws_thumbs">
                <div>
                    <a href="http://localhost/aboundinginlove/app/webroot/img/gallery/image1.jpg" title="Image 1"><img src="http://localhost/aboundinginlove/app/webroot/img/tooltips/image1.jpg" alt="" /></a>
                    <a href="http://localhost/aboundinginlove/app/webroot/img/gallery/image2.jpg" title="Image 2"><img src="http://localhost/aboundinginlove/app/webroot/img/tooltips/image2.jpg" alt="" /></a>
                    <a href="http://localhost/aboundinginlove/app/webroot/img/gallery/image3.jpg" title="Image 3"><img src="http://localhost/aboundinginlove/app/webroot/img/tooltips/image3.jpg" alt="" /></a>
                    <a href="http://localhost/aboundinginlove/app/webroot/img/gallery/image4.jpg" title="Image 4"><img src="http://localhost/aboundinginlove/app/webroot/img/tooltips/image4.jpg" alt="" /></a>
                </div>
            </div>
            <span class="wsl"><a href="http://wowslider.com">Gallery Js</a> by WOWSlider.com v4.3</span>
            <div class="ws_shadow"></div>
        </div>
        <?php
        echo $this->Html->script('wowslider');
        echo $this->Html->script('script');
        ?>
        <!-- End WOWSlider.com BODY section -->
    </div>
</div>
