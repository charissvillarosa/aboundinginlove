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
        <div class="pull-right"><?php echo $this->Html->link('Go back to Send Update Email', array('action' => 'listing'), array('class' => 'btn btn-info btn-medium rightmargin1')); ?></div>
    </div>
    <?php foreach ($result as $item) :

        $donor = $item['User'];
        $donation = $item['DonationRequest'];
        $sponsee = $item['SponseeListingItem'];
        $date = $this->Time->format($donation['last_month_completed']);
        $paypal = $item['DonationHistory'];
        $portfolio = $item['Portfolio'];

        $donorname = $donor['firstname'].' '.$donor['middlename'].' '.$donor['lastname'];
        $sponseename = $sponsee['firstname'].' '.$sponsee['middlename'].' '.$sponsee['lastname'];

    ?>
    <div style="width:800px; margin:50px auto;">
        <?php echo $this->Form->create('SendUpdate', array('type' => 'POST', 'url' => array('controller'=>'SendUpdate', 'action' => 'sendemail'))); ?>
        <div style="padding-left:7px;">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Form->label('To: '); ?>
            <?php echo $this->Form->textarea('to', array('class' => 'span4','value' => trim($donor['email']))); ?>
        </div>
        <div style="padding-left:7px;">
            <?php 
                echo $this->Form->label('Message: ');
                echo $this->Form->hidden('sponsee', array('value' => $sponsee['id']));
                echo $this->Form->hidden('sponseename', array('value' => $sponseename));
                echo $this->Form->hidden('donor', array('value' => $donor['id']));
                echo $this->Form->hidden('paypal_txn', array('value' => $paypal['id']));
                echo $this->Form->hidden('donorname', array('value' => $donorname));
                echo $this->Form->hidden('paypal_paymentdate', array('value' => $date));
                echo $this->Form->hidden('donation', array('value' => $donation['total']));
                echo $this->Form->hidden('portfoliocontent', array('value' => $portfolio['description']));
                echo $this->Form->hidden('portfolioname', array('value' => $portfolio['description']));
            ?>
            <?php
            $defaultMessage = "
Thank you from Abounding in Love


Dear $donorname,


I would like to sincerely thank you for your generous donation worth $ $donation[total] to $sponsee[firstname] $sponsee[middlename] $sponsee[lastname] on $date.
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
    <?php endforeach; ?>
</div>