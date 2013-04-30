<!-- Carousel
================================================== -->
<div id="slider">
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                <?php
                echo $this->Html->image('slide-06.jpg');
                ?>
                <div class="container">
                    <!--<div class="carousel-caption">
                      <h1></h1>
                      <p class="lead"></p>
                      <a class="btn btn-large btn-primary" href="#">Sign up today</a>
                    </div>-->
                </div>
            </div>
            <div class="item">
                <?php
                echo $this->Html->image('slide-05.jpg');
                ?>
                <div class="container">
                    <!--<div class="carousel-caption">
                      <h1></h1>
                      <p class="lead"></p>
                      <a class="btn btn-large btn-primary" href="#">Sign up today</a>
                    </div>-->
                </div>
            </div>
            <div class="item">
                <?php
                echo $this->Html->image('slide-04.jpg');
                ?>
                <div class="container">
                    <!--<div class="carousel-caption">
                      <h1></h1>
                      <p class="lead"></p>
                      <a class="btn btn-large btn-primary" href="#">Sign up today</a>
                    </div>-->
                </div>
            </div>
            <div class="item">
                <?php
                echo $this->Html->image('slide-01.jpg');
                ?>
                <div class="container">
                    <!--<div class="carousel-caption">
                      <h1></h1>
                      <p class="lead"></p>
                      <a class="btn btn-large btn-primary" href="#">Sign up today</a>
                    </div>-->
                </div>
            </div>
            <div class="item">
                <?php
                echo $this->Html->image('slide-02.jpg');
                ?>
                <div class="container">
                    <!--<div class="carousel-caption">
                      <h1>Another example headline.</h1>
                      <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                      <a class="btn btn-large btn-primary" href="#">Learn more</a>
                    </div>-->
                </div>
            </div>
            <div class="item">
                <?php
                echo $this->Html->image('slide-03.jpg');
                ?>
                <div class="container">
                    <!--<div class="carousel-caption">
                      <h1>One more for good measure.</h1>
                      <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                      <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
                    </div>-->
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->
</div>
<div class="container">
    <div class="row margin1">
        <div class="well span3">
            <h4 class="fontcolor1">How We Works</h4><br>
            <span class="badge badge-info">1</span> Ipsum purus lobortis porttitor sit. Qui ut orci, suscipit pede vitae suspendisse sociis eu feugiat, sed massa amet, ac orci, posuere felis et.<br><br>
            <span class="badge badge-info">2</span> Eros integer massa phasellus magna donec neque. A wisi a, lorem venenatis varius malesuada vivamus aliquam.<br><br>
            <span class="badge badge-info">3</span> Vestibulum mauris dolor, vitae in, nulla vitae nunc quis, vestibulum in, cum odio turpis pede wisi sed nam. <br><br>
            <span class="badge badge-info">4</span> Tortor in vel. Nibh id. Et ut morbi amet aliquam, sit suspendisse orci, in porta libero orci dolor.<br>
        </div>
        <div class="well span8">
            <div>
                <h4 class="fontcolor1">Sponsor a child today</h4>
                <div class="leftfloat">
                    <div class="leftfloat">
                        <?php
                        echo $this->Html->image('sponsees/sam.jpg', array('alt' => '', 'width' => '165', 'class' => 'img-polaroid'));
                        ?>
                    </div>
                    <div class="leftfloat leftmargin1 width6 box">
                        <div class="leftfloat width7">
                            <p>
                                <b class="fontcolor1">SAM CAÑETE</b><br>
                                <b>Flag : Location</b>
                            </p>
                            <p>This is a sample content for sam's life summary...</p>
                            <a class="btn btn-info btn-small">Read their story</a>
                        </div>
                        <div class="rightfloat width7 verticalline">
                            <p><b class="fontcolor1 fontsize1">45%</b> raised</p>
                            <div class="progress progress-success">
                                <div class="bar" style="width: 45%"></div>
                            </div>
                            <p><b class="fontcolor1">$ 1,000.00</b> - Donation needed</p>
                            <div class="rightfloat"><a class="btn btn-success btn-small">Donate</a></div>
                        </div>
                    </div>
                </div>
                <div class="leftfloat imageborder topmargin1">
                    <div class="leftfloat">
                        <?php
                        echo $this->Html->image('sponsees/rosalie.jpg', array('alt' => '', 'width' => '165', 'class' => 'img-polaroid'));
                        ?>
                    </div>
                    <div class="leftfloat leftmargin1 width6 box">
                        <div class="leftfloat width7">
                            <p>
                                <b class="fontcolor1">ROSALIE ROSELLO</b><br>
                                <b>Flag : Location</b>
                            </p>
                            <p>This is a sample content for sam's life summary...</p>
                            <a class="btn btn-info btn-small">Read their story</a>
                        </div>
                        <div class="rightfloat width7 verticalline">
                            <p><b class="fontcolor1 fontsize1">90%</b> raised</p>
                            <div class="progress progress-warning">
                                <div class="bar" style="width: 90%"></div>
                            </div>
                            <p><b class="fontcolor1">$ 1,000.00</b> - Donation needed</p>
                            <div class="rightfloat"><a class="btn btn-warning btn-small">Donate</a></div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        
    </div>
</div>