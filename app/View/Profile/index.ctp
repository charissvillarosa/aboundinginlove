<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donor Profile',array('controller'=>'Profile', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History',array('controller'=>'DonationHistory', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'PendingDonations' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Pending Donations', array('controller' => 'PendingDonations', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends',array('controller'=>'InviteFriends', 'action' => 'index'))?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 30px 0; background: #fff; margin-top:103px;">
       <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1">DONOR PROFILE</p>
            </div>
            <div class="pull-right leftmargin2 bottommargin2">
                <?php echo $this->Html->link('Edit Profile', array('action' => 'edit'), array('class' => 'btn btn-info'))?>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2">
            <?php echo $this->Session->flash(); ?>
            <div class="pull-left width1">
                <div>
                    <?php
                        $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $user['id'], $userImage['hash_key']);
                        $attrs = array('alt' => '', 'width' => '190px', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                    ?>
                </div>
                <div>
                    <?php
                        $action = array('controller' => 'ProfileImages', 'action' => 'upload', $user['id']);
                        echo $this->Html->link('Change Profile Picture', $action, array('class' => 'btn btn-info btn-block'));
                    ?>
                </div>
            </div>
            <div class="pull-left span5">
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
