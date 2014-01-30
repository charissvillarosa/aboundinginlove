<div class="container tabs portfolio">
    <div class="span11 margin3">
        <?php
        echo $this->Form->create('', array('type' => 'GET', 'url' => array('controller'=>'SendUpdate', 'action' => 'listing')));
        ?>
        <div class="clearfix pull-right banner">
            <div class="pull-left topmargin7">
                <p>Donation search by:</p>
            </div>
            <div class="pull-left">
                <?php               
                    echo $this->Form->input('cat', array(
                    'label' => '',
                    'class' => 'span3',
                    'value' => $category,
                    'options' => array('' => 'All', 'sponsee' => 'Sponsee', 'organization' => 'Organization' )));
                ?>     
            </div>
            <div class="pull-left topmargin7">
                <button type="submit" class="btn btn-info"><i class="icon-search"></i> Search</button>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
        <?php echo $this->Session->flash(); ?>
        <table width="100%" class="table table-hover table-bordered">
            <tr>
                <th>Paypal Payers ID</th>
                <th>Sponsor</th>
                <th>Date</th>
                <th>Payment Gross</th>
                <th>Sponsee</th>
                <th>Donation <br>Details</th>
                <th>Email <br>Record</th>
                <th>Send <br>Update</th>
            </tr>
            <?php
            foreach ($donationitems as $item) :

                $donation = $item['DonationHistory'];
                $sponsee = $item['SponseeListingItem'];
                $user = $item['User'];

                ?>
                <tr>
                    <td><?php echo $donation['id'] ?></td>
                    <td><?php echo $user['firstname'].' '.$user['lastname']; ?></td>
                    <td style="text-align: center;"><?php echo $this->Time->format($donation['payment_date']) ?></td>
                    <td style="text-align: right;"><?php echo $this->Number->currency($donation['payment_gross']); ?></td>
                    <td>
                        <?php
                        if($sponsee['firstname'] != '') echo $sponsee['firstname'].' '.$sponsee['lastname'];
                        else echo"Organization";
                        ?>
                    </td>
                    <td><i><?php echo $this->Html->link('', array('controller' => 'DonationHistory', 'action' => 'view', $donation['id']), array('class' => 'icon-folder-open','title' => 'View donation details')); ?></i></td>
                    <td><i><?php echo $this->Html->link('', array('controller' => 'SendUpdate', 'action' => 'index', $donation['id'], $user['id'], $sponsee['id']), array('class' => 'icon-folder-open','title' => 'View emails')); ?></i></td>
                    <td><i><?php echo $this->Html->link('', array('controller' => 'SendUpdate', 'action' => 'email', $user['id'], $donation['id'], $sponsee['id']), array('class' => ' icon-envelope','title' => 'Send update emails')); ?></i></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div>
            <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <?php echo $this->Paginator->numbers(); ?>
            <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
        </div>
    </div>
</div>