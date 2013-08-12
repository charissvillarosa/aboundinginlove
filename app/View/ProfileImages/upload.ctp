<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="active">
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
        <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1">CHANGE PROFILE IMAGE</p>
            </div>
        </div>
        <div class="width:900px; margin:10px auto;" class="clearfix pull-left leftmargin2">
            <div style="width:500px; height:300px; border:dashed 4px #ddd; margin:100px auto 20px auto; padding:20px;">
                <div style="text-align: center; width:380px; margin:100px auto;">
                    <?php echo $this->Session->flash(); ?>
                    <p>File must be less than 2 megabytes.</p>
                    <?php echo $this->Form->create('ProfileImage', array('type'=>'file'));?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('image', array('type' => 'file', 'label'=>'', 'class' => 'btn btn-large'));
                        ?>
                    </fieldset>
                </div>
            </div>
            <div style="width:710px;"><div class="pull-right"><?php echo $this->Form->end(__('Upload Image')); ?></div></div>
        </div>
    </div>
</div>