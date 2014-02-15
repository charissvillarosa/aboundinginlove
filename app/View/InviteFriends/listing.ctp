<div class="container tabs portfolio">
    <div class="span11 margin3">
        <?php echo $this->Form->create('', array('type' => 'GET', 'url' => array('controller'=>'InviteFriends', 'action' => 'listing'))); ?>
        <div class="pull-right banner">
            <div class="pull-left topmargin7">
                <p>Search by:</p>
            </div>
            <div class="pull-left">
                <?php               
                    echo $this->Form->input('cat', array(
                    'label' => '',
                    'class' => 'span3',
                    'value' => $category,
                    'options' => array('' => 'All', 'email' => 'Email', 'facebook' => 'Facebook', 'twitter' => 'Twitter' )));
                ?>     
            </div>
            <div class="pull-left topmargin7">
                <button type="submit" class="btn btn-info"><i class="icon-search"></i> Search</button>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
        <table width="100%" class="table table-hover table-bordered">
            <tr>
                <th>User</th>
                <th>To</th>
                <th>Message</th>
                <th>Type</th>
                <th>Status</th>
                <th>Date Invited</th>
            </tr>
            <?php
            foreach ($invitelist as $item) :
                $invite = $item['InviteFriendListing'];
                $user = $item['User'];
                ?>
                <tr>
                    <td><?php echo $user['firstname'].' '.$user['middlename'].' '.$user['lastname'] ?></td>
                    <td><?php echo $invite['to'] ?></td>
                    <td><?php echo $invite['message'] ?></td>
                    <td><?php echo $invite['type'] ?></td>
                    <td>
                    <?php
                        if ($invite['type'] == 'email'){ echo $invite['status']; }
                        else {
                            if($invite['clicks'] > 1) echo $invite['clicks'] . ' clicks';
                            else echo $invite['clicks'] . ' click';
                        }
                    ?>
                    </td>
                    <td><?php echo $this->Time->format($invite['created']) ?></td>
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