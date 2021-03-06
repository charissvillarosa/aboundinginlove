<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Account Setting',array('controller'=>'Profile', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History',array('controller'=>'DonationHistory', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends',array('controller'=>'InviteFriends', 'action' => 'index'))?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 30px 0; background: #fff; margin-top:103px;">
       <div class="headerstyle">
            <div class="leftmargin2 bottommargin2">
                <p class="fontsize1">CHANGE PASSWORD</p>
            </div>
        </div>
        <div class="leftmargin2">
            <p><?php echo $this->Html->link('Forgot password?',array('controller'=>'forgotpassword', 'action' => 'index'))?></p>
            <?php echo $this->Form->create('User'); ?>
            <fieldset>
                <?php 
                echo $this->Form->input('Old password', array('class' => 'span3'));
                echo $this->Form->input('New password', array('class' => 'span3'));
                echo $this->Form->input('Confirm new password', array('class' => 'span3'));
                $this->Form->input('id', array('type' => 'hidden'));
                ?>
            </fieldset>
            <?php echo $this->Form->end(__('Save')); ?>
        </div>
    </div>
</div>