<style>
    p{font-size:20px;}
</style>
<div class="clearfix container">
    <?php
    $controller = $this->name;

    if ($user && $user['role'] == 'admin') :
    ?>
        <div class="navbar navbar-static-top" style="margin: -1px -1px 0;">
            <div class="navbar-inner">
                <div class="container" style="width: auto; padding: 0 20px;">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'Sponsees' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Sponsees', array('controller'=>'sponsees', 'action'=>'index')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'Users' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Users', array('controller'=>'users', 'action'=>'index')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'SponseeNeedCategories' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Need Categories', array('controller'=>'SponseeNeedCategories', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'PortfolioCategories' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Portfolio Categories', array('controller'=>'PortfolioCategories', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'DonationHistory' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Donations', array('controller'=>'DonationHistory', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'SendUpdate' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Send Update Email', array('controller'=>'SendUpdate', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'InviteFriends' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Invites', array('controller'=>'InviteFriends', 'action'=>'listing')); ?>
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
                <p class="fontsize1">DONOR PROFILE</p>
            </div>
            <div class="pull-right leftmargin2 bottommargin2">
                <?php echo $this->Html->link('Edit Profile', array('action' => 'edit'), array('class' => 'btn btn-info rightmargin1'))?>
            </div>
        </div>
        <div class="clearfix pull-left span12 bottommargin1">
            <div style="width:700px; margin:auto;">
                <?php echo $this->Session->flash(); ?>
                <div class="pull-left">
                    <div>
                        <?php
                            $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $user['id'], $userImage['hash_key']);
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
                <div class="pull-left span4">
                    <p class="fistname"><?php echo "Firstname : ".$user['firstname']; ?></p>
                    <p class="middlename"><?php echo "Middlename : ".$user['middlename']; ?></p>
                    <p class="lastname"><?php echo "Lastname : ".$user['lastname']; ?></p>
                    <p class="address"><?php echo "Address : ".$user['address']; ?></p>
                    <p class="country"><?php $flag = "/img/flag/".$user['country'].".png"; echo "Country : ". $this->Html->image("$flag") . " ". $user['country']; ?></p>
                    <p class="email"><?php echo "Email : ".$user['email']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>