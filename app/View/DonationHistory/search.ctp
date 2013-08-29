<div class="container tabs portfolio">
    <div class="span11 margin3">
        <div class="pull-left topmargin4">
            <strong class="fontcolor1">Donation search by: </strong>
        </div>
        <div class="pull-left leftmargin1">
            <?php 
                echo $this->Form->create('DonationHistory', array('url' => array('controller'=>'DonationHistory', 'action'=>'search')));
                
                echo $this->Form->input('cat', array(
                'label' => '',
                'class' => 'span3',
                'options' => array('all' => 'All', 'sponsee' => 'Sponsee', 'organization' => 'Organization' )));
            ?>     
        </div>
        <div class="pull-left topmargin7">
            <?php echo $this->Form->end(__('Search')); ?>
        </div>
        <table width="100%" class="table table-hover table-bordered">
            <tr>
                <th>No.</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Sponsee</th>
            </tr>
            <?php
            foreach ($donationitems as $item) :
                $donation = $item['DonationHistory'];
                $sponsee = $item['Sponsee'];
                ?>
                <tr>
                    <td><?php echo $donation['id'] ?></td>
                    <td style="text-align: center;"><?php echo $this->Time->format($donation['payment_date']) ?></td>
                    <td style="text-align: right;"><?php echo $this->Number->currency($donation['amount']); ?></td>
                    <td><?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>