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
                <p class="fontsize1">DONATION HISTORY</p>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2 width2">
            <?php
            $user = $this->Session->read('Auth.User');
            ?>
            <h3 class="fontcolor1"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h3>
            <p class="topmargin1">
                Lorem ipsum dolor sit amet, orci sed quisque venenatis eget nullam ut, eget eros bibendum condimentum 
                tellus suscipit non, eget viverra a pulvinar, wisi fringilla etiam at qui. Risus nullam libero gravida 
                ligula, diam vivamus ullamcorper sit sapien, nulla id dolor semper nunc, felis nulla enim quam wisi 
                lorem integer, fringilla sed accumsan mauris. Pellentesque sit.
            </p>
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
                    <th>Amount</th>
                    <th>Sponsee</th>
                </tr>
                <?php
                foreach ($donationitems as $item) :
                    $donation = $item['DonationHistory'];
                    ?>
                    <tr>
                        <td><?php echo $donation['id'] ?></td>
                        <td><?php echo $this->Time->format($donation['payment_date']) ?></td>
                        <td><?php echo$this->Number->currency($donation['amount']); ?></td>
                        <td><?php echo$this->Number->currency($donation['amount']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>