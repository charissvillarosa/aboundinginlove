<style>
    p{font-size:20px;}
</style>
<div class="clearfix container">
    <?php
    $user = $this->Session->read('Auth.User');
    $controller = $this->name;

    if ($user && $user['role'] == 'admin') :
    ?>
        <div class="navbar navbar-static-top" style="margin: -1px -1px 0;">
            <div class="navbar-inner">
                <div class="container" style="width: auto; padding: 0 20px;">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'Sponsees' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Sponsees', array('controller' => 'sponsees', 'action' => 'index')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="<?php echo $controller == 'SponseeNeedCategories' ? 'active' : '' ?>">
                                    <?php echo $this->Html->link('Need Categories', array('controller' => 'SponseeNeedCategories', 'action' => 'listing')); ?>
                                </li>
                                <li class="<?php echo $controller == 'PortfolioCategories' ? 'active' : '' ?>">
                                    <?php echo $this->Html->link('Portfolio Categories', array('controller' => 'PortfolioCategories', 'action' => 'listing')); ?>
                                </li>
                            </ul>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'Users' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'DonationHistory' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Donations', array('controller' => 'DonationHistory', 'action' => 'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'SendUpdate' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Send Update Email', array('controller' => 'SendUpdate', 'action' => 'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'InviteFriends' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Invites', array('controller' => 'InviteFriends', 'action' => 'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="navbar navbar-static-top" style="margin: -1px -1px 0;">
            <div class="navbar-inner">
                <div class="container" style="width: auto; padding: 0 20px;">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'Profile' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Donor Profile', array('controller' => 'Profile', 'action' => 'index')) ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'DonationHistory' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'InviteFriends' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
                        </li>
                        <li class="divider-vertical"></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="container tabs">
    <div>
        <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1">ACCOUNT SETTING</p>
            </div>
            <div class="pull-right leftmargin2 bottommargin2">
                <?php echo $this->Html->link('Cancel Edit', array('action' => 'index'), array('class' => 'btn btn-info rightmargin1'))?>
            </div>
        </div>
        <div class="clearfix pull-left span12 bottommargin1">
            <div style="width:930px; margin:auto;">
                <?php echo $this->Session->flash(); ?>
                <div class="pull-left topmargin1">
                    <div>
                        <?php
                        $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $user['id']);
                        $attrs = array('alt' => '', 'width' => '300px', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                        ?>
                    </div>
                    <div>
                        <?php
                        $action = array('controller' => 'ProfileImages', 'action' => 'upload', $user['id']);
                        echo $this->Html->link('Change Profile Picture', $action, array('class' => 'btn btn-info btn-large btn-block'));
                        ?>
                    </div>
                </div>
                <div class="pull-right span6">
                    <p class="fontcolor1 topmargin2">Personal Information</p>
                    <hr style="border:dashed 1px #ccc;">
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

                    <p class="fontcolor1 topmargin2">Password</p>
                    <hr style="border:dashed 1px #ccc;">
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
</div>