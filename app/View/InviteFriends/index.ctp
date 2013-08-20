<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Account Settings',array('controller'=>'Profile', 'action' => 'index'))?>
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
           <div class="pull-left leftmargin2 bottommargin2 banner">
               <p class="fontsize1">INVITE FRIENDS</p>
           </div>
           <div class="pull-right span2">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <!--<a class="addthis_button_preferred_1"></a>-->
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <!--<a class="addthis_button_preferred_4"></a>-->
<!--                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>-->
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-520a17f6475162a2"></script>
                <!-- AddThis Button END -->
             </div>
        </div>
        <div class="clearfix pull-left leftmargin2 span8">
            <div class="leftmargin2">
                <ul class="nav nav-tabs">
                    <li><a href="#tab1" data-toggle="tab">TWEETER</a></li>
                    <li>
                        <a href="#tab2" data-toggle="tab">FACEBOOK</a>
                    </li>
                    <li class="active"><a href="#tab3" data-toggle="tab">EMAIL</a></li>
                </ul>
                <div class="tab-content topmargin1">
                    <div class="tab-pane leftmargin1" id="tab1">
                        <p>TWEETER</p>
                    </div>
                    <div class="tab-pane leftmargin1" id="tab2">
                        <p>FACEBOOK</p>
                        <a class="addthis_button_facebook_send"></a>
                    </div>
                    <div class="tab-pane active leftmargin1" id="tab3">
                        <?php echo $this->Form->create('InviteFriend', array('action' => 'sendMail')); ?>
                        <div style="padding-left:7px;">
                            <p class="fontsize1 bottommargin3">Email Friends</p>
                            <?php echo $this->Form->label('To: *'); ?>
                            <?php echo $this->Form->textarea('to', array('class' => 'span4')); ?>
                        </div>
                        <div style="padding-left:7px;">
                            <?php echo $this->Form->label('Message: '); ?>
                            <?php echo $this->Form->textarea('message', array('class' => 'span5', 'rows' => '8')); ?>
                        </div>
                        <?php echo $this->Form->end(__('Send invitations')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>