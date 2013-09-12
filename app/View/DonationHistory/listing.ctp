<div class="container tabs portfolio">
    <div class="span11 margin3">
        <?php echo $this->Form->create('', array('type' => 'GET')); ?>
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
                <th>Amount</th>
                <th>Sponsee</th>
                <th>Details</th>
            </tr>
            <?php
            foreach ($donationitems as $item) :

                $donation = $item['DonationHistory'];
                $sponsee = $item['Sponsee'];
                $user = $item['User'];
                ?>
                <tr>
                    <td><?php echo $donation['id'] ?></td>
                    <td><?php echo $user['firstname'].' '.$user['lastname']; ?></td>
                    <td style="text-align: center;"><?php echo $this->Time->format($donation['payment_date']) ?></td>
                    <td style="text-align: right;"><?php echo $this->Number->currency($donation['amount']); ?></td>
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
    </div>
</div>