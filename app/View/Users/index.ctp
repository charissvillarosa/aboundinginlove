<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2">
            <?php echo $this->Html->link('Add New User', array('action' => 'add'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <table class="leftmargin1 table table-hover table-bordered">
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Role</th>
                <th>Date Created</th>
                <th>Modified</th>
                <th>Name</th>
                <th>Address</th>
                <th>Country</th>
                <th>Edit</th>
                <th>View</th>
                <th>Delete</th>
            </tr>

            <?php
            $ctr = 1;
            
            foreach ($users as $item) :
                $user = $item['User'];
                ?>
                <tr>
                    <td><?php echo $ctr; ?>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['role'] ?></td>
                    <td><?php echo $user['created'] ?></td>
                    <td><?php echo $user['modified'] ?></td>
                    <td><?php echo $user['firstname'].' '.$user['middlename'].' '.$user['lastname'] ?></td>
                    <td><?php echo $user['address'] ?></td>
                    <td><?php echo $user['country'] ?></td>
                    <td align="center">
                       <i><?php echo $this->Html->link('', array('controller' => 'user', 'action' => 'edit', $user['id']), array('class' => 'icon-edit')); ?></i>
                    </td>
                    <td align="center">
                        <i><?php echo $this->Html->link('', array('controller' => 'user', 'action' => 'view', $user['id']), array('class' => 'icon-list')); ?></i>
                    </td>
                    <td align="center">
                        <i><?php echo $this->Html->link('', array('controller' => 'user', 'action' => 'delete', $user['id']), array('class' => 'icon-trash')); ?></i>
                    </td>
                </tr>
            <?php $ctr++; endforeach; ?>
        </table>
        <div class="leftmargin1">
            <button class="btn"><?php echo $this->Paginator->numbers(); ?></button>
            <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
        </div>
    </div>
</div>