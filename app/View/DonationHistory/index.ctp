<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Account Settings', array('controller' => 'Profile', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 30px 0; background: #fff; margin-top:103px;">
        <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="banner fontsize1">DONATION HISTORY</p>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2 width2">
            <?php
            $user = $this->Session->read('Auth.User');
            ?>
            <div>
                <div class="pull-left">
                <?php
                    $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $user['id']);
                    $attrs = array('alt' => '', 'width' => '190px', 'class' => 'img-polaroid');
                    echo $this->Html->image($imageURl, $attrs);
                ?>
                </div>
                <div class="pull-left span6">
                    <h2 class="fontcolor1"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h2>
                    <p>
                        Lorem ipsum dolor sit amet, orci sed quisque venenatis eget nullam ut, eget eros bibendum condimentum 
                        tellus suscipit non, eget viverra a pulvinar, wisi fringilla etiam at qui. Risus nullam libero gravida 
                        ligula, diam vivamus ullamcorper sit sapien, nulla id dolor semper nunc, felis nulla enim quam wisi 
                        lorem integer, fringilla sed accumsan mauris. Pellentesque sit.
                    </p>
                    <hr>
                </div>
                <div class="clearfix"></div>
            </div>
            <div>
                <div class="pull-left"><h4 class="fontcolor1">Donation Record</h4></div>
                <div class="pull-right">
                    <div class="pull-right leftmargin5">
                        <?php echo $this->Html->link('Donate any amount', array('controller'=>'donations', 'action' => 'donation'), array('class' => 'btn btn-info')); ?>
                    </div>
                    <div class="pull-right">
                        <?php echo $this->Html->link('Donate a sponsee', array('controller'=>'donations', 'action' => 'sponseedonation'), array('class' => 'btn btn-info')); ?>
                    </div>
                </div>
            </div>
            <table width="100%" class="table table-hover table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Sponsored To</th>
                    <th>Amount</th>
                </tr>
                <?php
                $total = 0;
                
                foreach ($donationitems as $item) :
                    
                    $donation = $item['DonationHistory'];
                    $sponsee = $item['Sponsee'];
                    $total = $total + $donation['amount'];
                    $percentage = $item['SponseeListingItem'];
                    ?>
                    <tr>
                        <td><?php echo $donation['id'] ?></td>
                        <td style="text-align: center;"><?php echo $this->Time->format($donation['payment_date']) ?></td>
                        <td>
                            <?php 
                            if($donation['donation_type']=='organization')
                                echo "Organization"; 
                            else
                                echo $sponsee['firstname'].' '.$sponsee['lastname']; 
                            ?>
                        </td>
                        <td style="text-align: right;"><?php echo $this->Number->currency($donation['amount']); ?></td>
                    </tr>
                    
                <?php endforeach; ?>
                <tr>
                    <th style="text-align: right;" colspan="3"><?php echo 'TOTAL'; ?></th>
                    <th style="text-align: right;"><?php echo $this->Number->currency($total); ?></th>
                </tr>
            </table>
            <div class="pull-right">
                <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                <?php echo $this->Paginator->numbers(); ?>
                <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
                <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
            </div>
            <div class="clearfix pull-left">
                <h4 class="fontcolor1">Recent Donations</h4>
                <?php foreach ($list as $item) : 
                    $donation = $item['DonationHistory'];
                    $sponsee = $item['Sponsee'];
                    $total = $total + $donation['amount'];
                    $percentage = $item['SponseeListingItem'];
                ?>
                
                    <?php
                        if($donation['donation_type']!='organization'){
                            echo '<div style="padding-right:30px; text-align: center;" class="pull-left rightmargin1">';    
                            
                            $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                            $attrs = array('alt' => '', 'width' => '150', 'class' => 'img-polaroid');
                            echo $this->Html->image($imageURl, $attrs);
                    ?>
                        <p class="topmargin7">
                            <strong class="fontcolor1">
                                <?php echo $sponsee['firstname'].' '.$sponsee['middlename'].' '.$sponsee['lastname']; ?><br>
                                Donated: <?php echo $this->Number->currency($donation['amount']); ?><br>
                                Raised
                                <?php echo $this->Number->toPercentage($percentage['percentage']); ?>
                            </strong>
                        </p>
                        <?php echo "<div style='height:10px;' class='progress'><div class='bar' style='width:".$this->Number->toPercentage($percentage['percentage'])."'></div></div>";?>
                    <?php echo'</div>';}
                    else {
                        echo '<div style="padding-right:30px; text-align: center;" class="pull-left rightmargin1">';
                        echo $this->Html->image('aboundinginlove_logo.png', array('alt' => '', 'width' => '120', 'class' => 'img-polaroid'));
                        echo "<br><strong class='fontcolor1'> Donated: " .$this->Number->currency($donation['amount']);
                        echo "</strong>
                        </div>";
                    }
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>