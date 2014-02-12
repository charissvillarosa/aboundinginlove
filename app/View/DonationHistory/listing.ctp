<div class="container tabs portfolio">
    <div class="span11 margin3">
        <?php
        echo $this->Form->create('', array('type' => 'GET', 'url' => array('controller'=>'DonationHistory', 'action' => 'listing')));
        ?>
        <div class="pull-right banner">
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
        <table width="100%" class="table table-hover table-bordered">
            <tr>
                <th>Paypal Payers ID</th>
                <th>Sponsor</th>
                <th>Date</th>
                <th>Payment Fee</th>
                <th>Amount</th>
                <th>Payment Gross</th>
                <th>Donation Method</th>
                <th>Sponsee</th>
                <th>Details</th>
            </tr>
            <?php
            foreach ($donationitems as $item) :

                $donation = $item['DonationHistory'];
                $sponsee = $item['SponseeListingItem'];
                $user = $item['User'];
                $donation_method = $item['SponseeNeed'];

                ?>
                <tr>
                    <td><?php echo $donation['id'] ?></td>
                    <td><?php echo $user['firstname'].' '.$user['lastname']; ?></td>
                    <td style="text-align: center;"><?php echo $this->Time->format($donation['payment_date']) ?></td>
                    <td style="text-align: right;"><?php echo $this->Number->currency($donation['payment_fee']); ?></td>
                    <td style="text-align: right;"><?php echo $this->Number->currency($donation['amount']); ?></td>
                    <td style="text-align: right;"><?php echo $this->Number->currency($donation['payment_gross']); ?></td>
                    <td style="text-align: right;">
                        <?php
                            if($donation_method['donation_method'] === 'onetime'){echo "One Time Donation";}
                            else {echo "Monthly Donation";}
                        ?>
                    </td>
                    <td>
                        <?php
                        if($sponsee['firstname'] != '') echo $sponsee['firstname'].' '.$sponsee['lastname'];
                        else echo"Organization";
                        ?>
                    </td>
                    <td><i><?php echo $this->Html->link('', array('action' => 'view', $donation['id']), array('class' => 'icon-folder-open','title' => 'View donation details')); ?></i></td>
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