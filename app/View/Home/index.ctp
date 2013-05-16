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
 <div id="logo"></div>
<div class="container">
    <div class="row margin1">
        <div class="well span3">
            <h4 class="fontcolor1">How We Works</h4>
            <hr>
            <p>
                <span class="badge badge-info">1</span> Ipsum purus lobortis porttitor sit. Qui ut orci, suscipit pede vitae suspendisse sociis eu feugiat, sed massa amet, ac orci, posuere felis et. Qui ut orci, suscipit pede vitae suspendisse sociis eu feugiat, sed massa amet, ac orci, posuere felis et.<br><br>
                <span class="badge badge-info">2</span> Eros integer massa phasellus magna donec neque. A wisi a, lorem venenatis varius malesuada vivamus aliquam.<br><br>
                <span class="badge badge-info">3</span> Vestibulum mauris dolor, vitae in, nulla vitae nunc quis, vestibulum in, cum odio turpis pede wisi sed nam. <br><br>
                <span class="badge badge-info">4</span> Tortor in vel. Nibh id. Et ut morbi amet aliquam, sit suspendisse orci, in porta libero orci dolor. Morci, in porta libero orci dolor. Amet aliquam, sit suspendisse orci, in porta libero.<br>
            </p>
        </div>
        <div class="well span8">
            <div>
                <h4 class="fontcolor1">Sponsor a child today</h4>
                <hr>
                <?php
                foreach ($sponseeList as $item) :
                    $sponsee = $item['Sponsee'];
                    ?>
                    <div class="pull-left topmargin1 box">
                        <div class="pull-left">
                            <?php
                            $imageURl;
                            if ($sponsee['primaryimage']) {
                                $imageURl = array('controller' => 'sponseeimages', 'action' => 'view', $sponsee['primaryimage']);
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
                                    $totalneededamount = 0;
                                    $totaldonatedamount = 0;
                                    $percentage = 0;
                                    foreach ($sponseeneeds as $item) :
                                        $need = $item['SponseeNeeds'];
                                        $totalneededamount = $totalneededamount + $need['neededamount'];
                                        $totaldonatedamount = $totaldonatedamount + $need['donatedamount'];
                                        $percentage = ($totaldonatedamount/$totalneededamount)*100;
                                    endforeach;
                                    echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($percentage)."</b> raised</div>";
                                    echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($percentage)."'></div></div>";
                                    echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($totalneededamount, 'USD')."</b> = Donation needed</div>";
                                    echo $this->Html->link('Donate', array('controller' => 'donate', 'action' => 'add', $sponsee['id']), array('class' => 'btn btn-info'));
                                ?>
                                <?php
                                    
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