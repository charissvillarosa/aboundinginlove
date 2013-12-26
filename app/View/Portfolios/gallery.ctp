<div class="pull-right span12">
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
        <div class="bottommargin1">
            <h2 class="fontcolor1">Tsunt habitasse</h2>
            <p>
                Lorem ipsum dolor sit amet, ut quam pharetra, imperdiet in sit vel facilisi litora malesuada. 
                Posuere vel cursus fermentum, vivamus porttitor, suspendisse consequat bibendum condimentum 
                aliquet turpis ipsum, nunc sit integer felis in, velit arcu et aliquam aliquam. Mauris lorem 
                elit interdum. Quam sit, sunt habitasse vivamus libero, a dolor ut. Tempus sed mi eros eros 
                blandit at, quisque maecenas nam amet magnis vel cursus, diam non sit blandit. Nibh molestie 
                pede tellus velit suspendisse. Maecenas tortor sed mattis, ante morbi eu suscipit, et nisl a 
                mattis leo molestie donec, amet consequat.</p>
        </div>
        <!-- Start WOWSlider.com BODY section -->
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    <li><img src="http://localhost/aboundinginlove/app/webroot/img/gallery/image1.jpg" alt="Image 1" title="Image 1" id="wows1_0"/>Description</li>
                </ul>
            </div>
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
