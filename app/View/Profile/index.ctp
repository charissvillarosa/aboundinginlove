<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Profile Information',array('controller'=>'Profile', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History',array('controller'=>'DonationHistory', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends',array('controller'=>'InviteFriends', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'TransactionHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Transaction History',array('controller'=>'TransactionHistory', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'ChangePassword' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Change Password',array('controller'=>'ChangePassword', 'action' => 'index'))?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="background: #fff; margin-top:103px;">
        <div class="pull-left leftmargin2 bottomargin2"><p>Profile Information</p></div>
        <div class="clearfix pull-left leftmargin2">
            <div class="pull-left">
                <?php
                    $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $user['id']);
                    $attrs = array('alt' => '', 'width' => '200px', 'class' => 'img-polaroid');
                    echo $this->Html->image($imageURl, $attrs);
                ?>
                <?php
                    $action = array('controller' => 'ProfileImages', 'action' => 'upload', $user['id']);
                    echo $this->Html->link('Change Profile Picture', $action, array('class' => 'btn btn-info'));
                ?>
            </div>
            <div class="pull-left span5">
                <p>
                    <?php 
                    if(!empty($user['firstname'])) {echo "Firstname : ".$user['firstname'];}
                    else {echo $this->Form->input('firstname', array('class' => 'span3'));}
                    ?>
                </p>
                <p>
                    <?php 
                    if(!empty($user['middlename'])) {echo "Middlename : ".$user['middlename'];}
                    else {echo $this->Form->input('middlename', array('class' => 'span3'));}
                    ?>
                </p>
                <p>
                    <?php 
                    if(!empty($user['lastname'])) {echo "Lastname : ".$user['lastname'];}
                    else {echo $this->Form->input('lastname', array('class' => 'span3'));}
                    ?>
                </p>
                <p>
                    <?php 
                    if(!empty($user['address'])) {echo "Address : ".$user['address'];}
                    else {echo $this->Form->input('address', array('class' => 'span3'));}
                    ?>
                </p>
                <p>
                    <?php 
                    if(!empty($user['country'])) {echo "Country : ".$user['country'];}
                    else {echo $this->Form->input('country', array('class' => 'span3'));}
                    ?>
                </p>
                <p>
                    <?php 
                    if(!empty($user['email'])) {echo "Email : ".$user['email'];}
                    else {echo $this->Form->input('email', array('class' => 'span3'));}
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>