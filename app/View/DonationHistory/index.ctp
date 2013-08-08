<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Profile',array('controller'=>'Profile', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History',array('controller'=>'DonationHistory', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends',array('controller'=>'InviteFriends', 'action' => 'index'))?>
            </li>
<!--            <li class="<?php // echo $this->name == 'TransactionHistory' ? 'active' : '' ?>">
                <?php // echo $this->Html->link('Transaction History',array('controller'=>'TransactionHistory', 'action' => 'index'))?>
            </li>-->
            <li class="<?php echo $this->name == 'ChangePassword' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Change Password',array('controller'=>'ChangePassword', 'action' => 'index'))?>
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
           <p>
               Lorem ipsum dolor sit amet, orci sed quisque venenatis eget nullam ut, eget eros bibendum condimentum 
               tellus suscipit non, eget viverra a pulvinar, wisi fringilla etiam at qui. Risus nullam libero gravida 
               ligula, diam vivamus ullamcorper sit sapien, nulla id dolor semper nunc, felis nulla enim quam wisi 
               lorem integer, fringilla sed accumsan mauris. Pellentesque sit.
           </p>
           <table width="100%" class="table table-hover table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Sponsored To</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>