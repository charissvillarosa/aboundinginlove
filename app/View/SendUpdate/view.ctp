<style>
    .headerstyle {
        width:1130px;
        padding:40px 10px 10px 30px;
    }
    .center {
        width:910px;
        margin:30px auto;
    }
</style>
<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container tabs portfolio">
    <div class="pull-right headerstyle banner span11">
        <div class="pull-left"><p class="fontsize1">VIEW EMAIL</p></div>
        <div class="pull-right"><?php echo $this->Html->link('Go back to Send Update', array('action' => 'listing'), array('class' => 'btn btn-info btn-medium rightmargin1')); ?></div>
    </div>
    <div class="clearfix" style="border:solid 1px #ddd; width:970px; margin:30px auto;">
        <?php echo $this->Session->flash(); ?>
        <?php
        foreach ($emailitems as $item) :

            $updateemail = $item['UpdateEmail'];

        ?>
        <div><?php echo $this->Time->format('F jS, Y h:i A', $updateemail['created']); ?></div>
        <div><?php echo $updateemail['to']; ?></div>
        <div><?php echo $updateemail['message']; ?></div>
        <?php endforeach; ?>
    </div>
</div>