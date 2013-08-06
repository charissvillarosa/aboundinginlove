<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li><?php echo $this->Html->link('Profile Information',array('controller'=>'Profile', 'action' => 'index'))?></li>
            <li><?php echo $this->Html->link('Donation History',array('controller'=>'DonationHistory', 'action' => 'index'))?></li>
            <li><?php echo $this->Html->link('Invite Friends',array('controller'=>'InviteFriends', 'action' => 'index'))?></li>
            <li><?php echo $this->Html->link('Transaction History',array('controller'=>'TransactionHistory', 'action' => 'index'))?></li>
            <li><?php echo $this->Html->link('Change Password',array('controller'=>'ChangePassword', 'action' => 'index'))?></li>
        </ul>
    </div>
    <div class="span9 well" style="background: #fff; margin-top:103px;">
        <p>Profile Information</p>
    </div>
</div>