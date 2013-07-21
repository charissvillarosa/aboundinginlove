<!-- Carousel
================================================== -->
<div id="slider" class="banner">
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
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
                      <h1></h1>
                      <p class="lead"></p>
                      <a class="btn btn-large btn-primary" href="#">Sign up today</a>
                    </div>-->
                </div>
            </div>
            <div class="item">
                <?php
                echo $this->Html->image('slide-03.jpg');
                ?>
                <div class="container">
                    <!--<div class="carousel-caption">
                      <h1></h1>
                      <p class="lead"></p>
                      <a class="btn btn-large btn-primary" href="#">Sign up today</a>
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
            <div>
                <h4 class="fontcolor1">How We Works</h4>
                <hr>
                <p>
                    <span class="badge badge-info">1</span> Ipsum purus lobortis porttitor sit. Qui ut orci, suscipit pede vitae suspendisse sociis eu feugiat, sed massa amet, ac orci, posuere felis et. Qui ut orci, suscipit pede vitae suspendisse sociis eu feugiat, sed massa amet, ac orci, posuere felis et.<br><br>
                    <span class="badge badge-info">2</span> Eros integer massa phasellus magna donec neque. A wisi a, lorem venenatis varius malesuada vivamus aliquam.<br><br>
                    <span class="badge badge-info">3</span> Tortor in vel. Nibh id. Et ut morbi amet aliquam, sit suspendisse orci, in porta libero orci dolor. Morci, in porta libero orci dolor. Amet aliquam, sit suspendisse orci, in porta libero.<br><br>
                    <span class="badge badge-info">4</span> Tortor in vel. Nibh id. Et ut morbi amet aliquam, sit suspendisse orci, in porta libero orci dolor. Morci, in porta libero orci dolor. Amet aliquam, sit suspendisse orci, in porta libero.Sit suspendisse orci, in porta libero orci dolor. Morci, in porta libero orci dolor. Amet aliquam, sit suspendisse orci, in porta libero.<br>
                </p>
            </div>
            <div>
                <div class="pull-left">
                    <a href="https://www.paypal.com/us/verified/pal=mae%2ealolod%40avare%2dllc%2ecom" target="_blank">
                        <img src="https://www.paypal.com/en_US/i/icon/verification_seal.gif" border="0" width="90px" alt="Official PayPal Seal">
                    </a>
                </div>
                <div class="pull-left">
                    <?php
                        echo $this->Html->image('paypal.jpg', array('width' => '175px'));
                    ?>
                </div>
            </div>
        </div>
        <div class="well span8">
            <div>
                <h4 class="fontcolor1">Sponsor a child today</h4>
                <hr>
                <?php
                foreach ($sponseeList as $item) :
                    $sponsee = $item['SponseeListingItem'];
                    ?>
                    <div class="pull-left topmargin1 box">
                        <div class="pull-left">
                            <?php
                            $imageURl;
                            if ($sponsee['primaryimage']) {
                                $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['primaryimage']);
                            }
                            else {
                                $imageURl = 'sponsees/nophoto.jpg';
                            }
                            $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
                            echo $this->Html->image($imageURl, $attrs);
                            ?>
                        </div>
                        <div class="pull-left leftmargin1">
                            <div class="pull-left span3">
                                <p>
                                    <b class="fontcolor1">
                                        <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                                    </b><br>
                                    <b><?php echo $sponsee['country'] ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></b>
                                </p>
                                <p>
                                    <?php
                                    $info = $sponsee['information'];
                                    echo $this->Text->truncate($info, 150, array('exact' => false));
                                    ?>
                                </p>
                                <?php echo $this->Html->link('Read more', array('controller' => 'sponsees', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-small')); ?>
                            </div>
                            <div class="rightfloat span2 verticalline">
                                <?php 
                                    echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                                    echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                                    echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                                    echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
                                    echo $this->Html->link('Donate', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info'));
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>              
                <div class="margin1">
                    <?php echo $this->Html->link('View more', array('controller' => 'sponsees', 'action' => 'index'), array('class' => 'btn btn-info btn-medium')); ?>
                </div>
            </div>
        </div>
    </div>
</div>