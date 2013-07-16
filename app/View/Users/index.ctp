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
                    <td><?php echo $this->Time->format($user['created']) ?></td>
                    <td><?php echo $this->Time->format($user['modified']) ?></td>
                    <td><?php echo $user['firstname'].' '.$user['middlename'].' '.$user['lastname'] ?></td>
                    <td>
                        <?php 
                            $add = $user['address'];
                            echo $this->Text->truncate($add, 50, array('exact' => false));
                        ?>
                    </td>
                    <td><?php echo $user['country'] ?></td>
                    <td>
                       <i><?php echo $this->Html->link('', array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'icon-edit','title' => 'Edit')); ?></i>
                    </td>
                    <td>
                        <i><?php echo $this->Html->link('', array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'icon-list','title' => 'View')); ?></i>
                    </td>
                    <td>
                        <i>
                        <?php echo $this->Html->link(
                            '',
                            array('action' => 'delete', $user['id']),
                            array('class' => 'icon-trash','title' => 'Delete'),
                            'Are you sure you want to delete this item?');
                        ?>
                        </i>
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