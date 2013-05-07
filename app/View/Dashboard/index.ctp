<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container tabs">
    <div class="span3 topmargin1">
        <?php echo $this->Html->image('sponsees/nophoto.jpg', array('class'=>'img-polaroid')) ?>
        <h4>
            <?php echo $user['firstname'] . ' ' . $user['lastname'] ?>
        </h4>
        <h5><?php echo $user['address'] ?></h5>
        <h5><?php echo $user['country'] ?></h5>
    </div>

    <div class="span8 well topmargin1">
        
    </div>
</div>