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
        <div class="pull-left"><p class="fontsize1">SEND EMAIL</p></div>
        <div class="pull-right"><?php echo $this->Html->link('Go back to Send Update Email', array('action' => 'listing'), array('class' => 'btn btn-info btn-medium')); ?></div>
    </div>
    <div style="width:800px; margin:50px auto;">
        <?php echo $this->Form->create('', array('type' => 'POST', 'url' => array('controller'=>'SendUpdateEmail', 'action' => 'sendemail'))); ?>
        <div style="padding-left:7px;">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Form->label('To: '); ?>
            <?php
                $email = $user['email'];
                echo $this->Form->textarea('to', array('class' => 'span4','value' => trim($email)));
            ?>
        </div>
        <div style="padding-left:7px;">
            <?php echo $this->Form->label('Message: '); ?>
            <?php
            $defaultMessage = "
Thank you from Abounding in Love


Dear $user[firstname] $user[lastname],


I would like to sincerely thank you for your generous donation worth $200 to --------- on -----------.
Every Donation helps ensure that we can continue with our work.

I know there are a lot of other ways you can have spent this money, and we appreciate the support you have given to our cause.

Please consider telling your friends and family about this children and this organization. Share the link on your blogs or social network.

Thank you again and warm regards.


With gratitude,
Abounding in Love
                ";

            echo $this->Form->textarea('message', array('class' => 'span8', 'rows' => '20', 'value' => trim($defaultMessage)));
            ?>
        </div>
        <?php echo $this->Form->end(__('Send')); ?>
    </div>
</div>