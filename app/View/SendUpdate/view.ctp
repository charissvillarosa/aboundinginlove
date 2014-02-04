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
    <div class="clearfix" style="width:770px; margin:30px auto;">
        <?php echo $this->Session->flash(); ?>
        <?php
        foreach ($emailitems as $item) :
            $updateemail = $item['UpdateEmail'];
            ?>
            <div>
                <div class="pull-left bottommargin2">
                    <?php echo $this->Form->label('To: '); ?>
                    <?php echo $this->Form->textarea('to', array('class' => 'span4', 'value' => $updateemail['to'], 'readonly' => 'readonly')); ?>
                </div>
                <div class="pull-right bottommargin2">
                    <?php echo $this->Form->label('Date: '); ?>
                    <?php echo $this->Form->textarea('message', array('class' => 'span4', 'value' => $this->Time->format('F jS, Y h:i A', $updateemail['created']), 'readonly' => 'readonly')); ?>
                </div>
            </div>
            <div>
                <?php echo $this->Form->label('Message: '); ?>
                <?php echo $this->Form->textarea('message', array('class' => 'span8', 'rows' => '20', 'value' => $updateemail['message'], 'readonly' => 'readonly')); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>