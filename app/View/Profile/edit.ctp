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
            <div class="pull-left banner leftmargin2 bottommargin2">
                <p class="fontsize1">ACCOUNT SETTING</p>
            </div>
            <div class="pull-right leftmargin2 bottommargin2">
                <?php echo $this->Html->link('Cancel Edit', array('action' => 'index'), array('class' => 'btn btn-info'))?>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2">
            <?php echo $this->Session->flash(); ?>
            <div class="pull-left width1">
                <div>
                    <?php
                    $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $user['id']);
                    $attrs = array('alt' => '', 'width' => '190px', 'class' => 'img-polaroid');
                    echo $this->Html->image($imageURl, $attrs);
                    ?>
                </div>
                <div>
                    <?php
                    $action = array('controller' => 'ProfileImages', 'action' => 'upload', $user['id']);
                    echo $this->Html->link('Change Profile Picture', $action, array('class' => 'btn btn-info  btn-block'));
                    ?>
                </div>
            </div>
            <div class="pull-left span5">
                <legend>Personal Info</legend>
                <?php
                echo $this->Form->create('User', array('url' => 'edit'));
                ?>
                <fieldset>
                    <?php echo $this->Form->input('firstname', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('middlename', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('lastname', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('address', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('country', array('type' => 'select', 'options' => $countryList)); ?>
                    <?php echo $this->Form->input('email', array('class' => 'span3')); ?>
                    <input type="hidden" name="action" value="personal"/>
                </fieldset>
                <?php echo $this->Form->end('Save') ?>

                <legend>Password</legend>
                <?php
                echo $this->Form->create('User', array('url' => 'edit'));
                ?>
                <fieldset>
                    <?php
                    echo $this->Form->input('oldPassword', array('class' => 'span3', 'label' => 'Old password', 'type' => 'password'));
                    echo $this->Form->input('newPassword', array('class' => 'span3', 'label' => 'New password', 'type' => 'password'));
                    echo $this->Form->input('confirmPassword', array('class' => 'span3', 'label' => 'Confirm new password', 'type' => 'password'));
                    ?>
                    <input type="hidden" name="action" value="password"/>
                </fieldset>
                <?php echo $this->Form->end('Save') ?>
            </div>
        </div>
    </div>
</div>
