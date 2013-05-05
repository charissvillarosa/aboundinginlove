<div class="container">
    <div style="background: #fff;" class="logincontent well">
        <table class="table table-hover">
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Date Created</th>
                <th>Modified</th>
            </tr>

            <?php
            foreach ($users as $item) :
                $user = $item['User'];
                ?>
                <tr>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['role'] ?></td>
                    <td><?php echo $user['created'] ?></td>
                    <td><?php echo $user['modified'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->Paginator->numbers(); ?>
        <?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
        <?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
        <?php echo $this->Paginator->counter(); ?>
    </div>
</div>