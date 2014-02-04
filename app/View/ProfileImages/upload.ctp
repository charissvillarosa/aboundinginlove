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
        <div class="pull-right headerstyle banner">
            <div class="pull-left leftmargin1"><p class="fontsize1">UPLOAD DONOR PROFILE IMAGE</div>
        </div>
        <div class="clearfix topmargin1 bottommargin1">
            <div class="box" style="width:393px; padding: 20px; margin: 30px auto; overflow: auto;">
                <div class="clearfix pull-left">
                    <?php echo $this->Session->flash(); ?>
                    <p class="leftmargin1">File must be less than 2 megabytes.</p>
                    <?php echo $this->Form->create('ProfileImage', array('type'=>'file'));?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('image', array('type' => 'file', 'label'=>'', 'class' => 'btn btn-large'));
                        ?>
                    </fieldset>
                    <hr style="margin-left:10px;">
                    <span style="text-align: right;"><?php echo $this->Form->end(__('UPLOAD IMAGE')); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>