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
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1">INVITE FRIENDS</p>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2 span8">
            <div class="leftmargin2">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">TWEETER</a></li>
                    <li><a href="#tab2" data-toggle="tab">FACEBOOK</a></li>
                    <li><a href="#tab3" data-toggle="tab">EMAIL</a></li>
                </ul>
                <div class="tab-content topmargin1">
                    <div class="tab-pane active leftmargin1" id="tab1">
                        <p>TWEETER</p>
                    </div>
                    <div class="tab-pane leftmargin1" id="tab2">
                        <p>FACEBOOK</p>
                    </div>
                    <div class="tab-pane leftmargin1" id="tab3">
                        <p>EMAIL</p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>