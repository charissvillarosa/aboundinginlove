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
<div class="container tabs portfolio">
    <div class="pull-right headerstyle banner span11">
        <div class="pull-left"><p class="fontsize1">EMAIL RECORD</p></div>
        <div class="pull-right"><?php echo $this->Html->link('Go back to Send Update', array('action' => 'listing'), array('class' => 'btn btn-info btn-medium rightmargin1')); ?></div>
    </div>
    <div class="span11">
        <?php echo $this->Session->flash(); ?>
        <table width="100%" class="table table-hover table-bordered">
            <tr>
                <th>Date Sent</th>
                <th>Paypal Txn</th>
                <th>Donor</th>
                <th>To</th>
                <th>Sponsee</th>
                <th>View</th>
            </tr>
            <?php
            foreach ($emailitems as $item) :

                $updateemail = $item['UpdateEmail'];
                $sponsee = $item['SponseeListingItem'];
                $donor = $item['User'];
            ?>
            <tr>
                <td><?php echo $this->Time->format($updateemail['created']); ?></td>
                <td><?php echo $updateemail['paypal_txn']; ?></td>
                <td><?php echo $donor['firstname'].' '.$donor['middlename'].' '.$donor['lastname']; ?></td>
                <td><?php echo $updateemail['to']; ?></td>
                <td><?php echo $sponsee['firstname'].' '.$sponsee['middlename'].' '.$sponsee['lastname']; ?></td>
                <td>
                    <i><?php echo $this->Html->link('', array('controller' => 'SendUpdate', 'action' => 'view', $updateemail['id']), array('class' => 'icon-list','title' => 'View Email')); ?></i>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="bottommargin1">
            <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <?php echo $this->Paginator->numbers(); ?>
            <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
        </div>
    </div>
</div>