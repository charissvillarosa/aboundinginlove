<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li><?php echo $this->Html->link('Profile Information',array('controller'=>'Profile', 'action' => 'index'))?></li>
            <li><?php echo $this->Html->link('Donation History',array('controller'=>'DonationHistory', 'action' => 'index'))?></li>
            <li><a href="#">Invite Friends</a></li>
            <li><a href="#">Transaction History</a></li>
            <li><a href="#">Change Password</a></li>
        </ul>
    </div>
    <div class="span9 well" style="background: #fff; margin-top:103px;">
        <?php echo $this->Html->image('sponsees/nophoto.jpg', array('class' => 'img-polaroid')) ?>
        <h4>
            <?php echo $user['firstname'] . ' ' . $user['lastname'] ?>
        </h4>
        <h5><?php echo $user['address'] ?></h5>
        <h5><?php echo $user['country'] ?></h5>
    </div>
</div>