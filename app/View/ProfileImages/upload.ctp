<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="active">
                <?php echo $this->Html->link('Donor Profile',array('controller'=>'Profile', 'action' => 'index'))?>
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
        <div>
            <div class="pull-right headerstyle banner">
                <div class="pull-left leftmargin1"><p class="fontsize1">UPLOAD DONOR PROFILE IMAGE</p></div>
                <div class="pull-right"><?php echo $this->Html->link('Go back', array('controller' => 'profile','action' => 'index'), array('class' => 'btn btn-info btn-medium')); ?></div>
            </div>
            <div class="clearfix topmargin1">
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
</div>