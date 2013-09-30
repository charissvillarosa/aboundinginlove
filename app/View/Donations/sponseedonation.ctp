<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donor Profile', array('controller' => 'Profile', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 0 0; background: #fff; margin-top:103px;">
        <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1 banner">DONATE A SPONSEE</p>
            </div>
        </div>
        <div class="clearfix pull-left width2">
            <?php
            $user = $this->Session->read('Auth.User');
            ?>
            <?php
            foreach ($sponseeList as $item) :
                $sponsee = $item['SponseeListingItem'];
                ?>
                <div class="pull-left topmargin1 leftmargin2 rightmargin1 box">
                    <div>
                        <?php
                            $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                            $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
                            echo $this->Html->image($imageURl, $attrs);
                        ?>
                    </div>
                    <div>
                        <center>
                        <p>
                            <b class="fontcolor1">
                                <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                            </b><br>
                            <b><?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag"); echo ' ' . $sponsee['country']; ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></b>
                        </p>
                        <?php 
                            echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                            echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
                            echo $this->Html->link('Donate Now!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-large'));
                        ?>
                        </center>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="clearfix pull-left leftmargin2 footerstyle">
                <button class="btn topmargin1"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                <button class="btn topmargin1"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            </div>
        </div>
    </div>
</div>