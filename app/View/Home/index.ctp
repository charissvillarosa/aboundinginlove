<div id="slider" class="banner">
    <ul id="slider1">
        <li>
            <?php
            echo $this->Html->image('sliders/image1.png');
            ?>
        </li>
        <li style="background:blue;">
            <?php
            echo $this->Html->image('sliders/image2.png');
            ?>
            <div>
                
            </div>
        </li>
        <li style="background:yellow;">
            <?php
            echo $this->Html->image('slide-03.jpg');
            ?>
        </li>
        <li style="background:white;">
            <div class="textSlide">
                <img src="demos/images/251356.jpg" alt="tomato sandwich" style="float: right; margin: 0 0 2px 10px;" />
                <h3>Queenie's Killer Tomato Bagel Sandwich</h3>
                <h4>Ingredients</h4>
                <ul>
                    <li>1 bagel, split and toasted</li>
                    <li>2 tablespoons cream cheese</li>
                    <li>1 roma (plum) tomatoes, thinly sliced</li>
                    <li>salt and pepper to taste</li>
                    <li>4 leaves fresh basil</li>
                </ul>
            </div>
        </li>
        <li style="background:green;">
            <div class="quoteSlide">
                <blockquote>In awe I watched the waxing moon ride across the zenith of the heavens like an ambered chariot towards the ebon void of infinite space wherein the tethered belts of Jupiter and Mars hang forever festooned in their orbital majesty. And as I looked at all this I thought... I must put a roof on this lavatory.<p>~ Les Dawson</p></blockquote>
            </div>
        </li>
    </ul>
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
                <div>
                    <div class="pull-left"><h4 class="fontcolor1">SPONSOR A CHILD TODAY</h4></div>
                    <div class="pull-right">
                        <?php echo $this->Html->link('View more', array('controller' => 'sponsees', 'action' => 'index'), array('class' => 'btn btn-info btn-large')); ?>
                    </div>
                </div>
                <?php
                foreach ($sponseeList as $item) :
                    $sponsee = $item['SponseeListingItem'];
                    $sponseeImage = $item['Image'];
                    ?>
                    <div class="pull-left topmargin1 box">
                        <div class="pull-left">
                            <?php
                            $imageURl = array(
                                'controller' => 'SponseeImages',
                                'action' => 'view',
                                $sponsee['id'], $sponseeImage['hash_key']
                            );
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
                                    <b><?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag"); echo ' ' . $sponsee['country']; ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></b>
                                </p>
                                <p>
                                    <?php
                                    $info = $sponsee['long_description'];
                                    echo $this->Text->truncate($info, 150, array('exact' => false));
                                    ?>
                                </p>
                                <?php
                                $user = $this->Session->read('Auth.User');

                                if ($user && $user['role'] == 'admin') $value = "adminview";
                                else $value = "view";
                                
                                echo $this->Html->link('Read more', array('controller' => 'sponsees', 'action' => $value, $sponsee['id']), array('class' => 'btn btn-info btn-small'));
                                ?>
                            </div>
                            <div class="rightfloat span2 verticalline">
                                <?php 
                                    echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                                    echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                                    echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                                    echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
                                    echo $this->Html->link('Donate', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info'));
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>