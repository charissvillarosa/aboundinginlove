<div class="container tabs portfolio">
    <div class="span11 margin3">
        <div>
            <div class="pull-right bottommargin2"><?php echo $this->Html->link('Go back to Donation List', array('action' => 'listing'), array('class' => 'btn btn-info btn-medium')); ?></div>
        </div>
        <div>
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Paypal Payers ID</th>
                    <th>Sponsor</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Sponsee</th>
                    <th>Donation Type</th>
                    <th>Refno</th>
                </tr>
                <?php
                foreach ($donationdetails as $item) :

                    $donation = $item['DonationHistory'];
                    $sponsee = $item['SponseeListingItem'];
                    $user = $item['User'];
                    ?>
                    <tr>
                        <td><?php echo $donation['id'] ?></td>
                        <td><?php echo $user['firstname'].' '.$user['lastname']; ?></td>
                        <td style="text-align: center;"><?php echo $this->Time->format($donation['payment_date']) ?></td>
                        <td style="text-align: right;"><?php echo $this->Number->currency($donation['amount']); ?></td>
                        <td><?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></td>
                        <td><?php echo $donation['donation_type'] ?></td>
                        <td><?php echo $donation['refno'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Details</th>
                    <th>Payer Name</th>
                    <th>Payer Email</th>
                    <th>Payer Id</th>
                    <th>Payer Status</th>
                    <th>Contact Phone</th>
                    <th>Payment Fee</th>
                    <th>Payment Gross</th>
                    <th>Amount</th>
                </tr>
                <?php
                foreach ($donationdetails as $item) :

                    $donation = $item['DonationHistory'];
                    $sponsee = $item['SponseeListingItem'];
                    $user = $item['User'];
                    ?>
                    <tr>
                        <td><?php echo $donation['details'] ?></td>
                        <td><?php echo $donation['first_name'].' '.$donation['last_name'] ?></td>
                        <td><?php echo $donation['payer_email'] ?></td>
                        <td><?php echo $donation['payer_id'] ?></td>
                        <td><?php echo $donation['payer_status'] ?></td>
                        <td><?php echo $donation['contact_phone'] ?></td>
                        <td><?php echo $donation['payment_fee'] ?></td>
                        <td><?php echo $donation['payment_gross'] ?></td>
                        <td><?php echo $donation['amount'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>