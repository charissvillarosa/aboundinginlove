<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2 banner">
            <!-- Button to trigger modal -->
            <a href="#myModal" role="button" class="btn btn-info add"><i class="icon-plus"></i> Add Record</a>
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


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel" style="margin-left:30px;">USER</h3>
  </div>
  <div class="modal-body">
    <div class="leftmargin1">
        <?php
        echo $this->Form->create('User', array('action' => 'add'));
        ?>
        <fieldset>
            <?php echo $this->Form->input('firstname', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('middlename', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('lastname', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('address', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('country', array('type'=>'select','options'=>$countryList)); ?>
            <?php echo $this->Form->input('username', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('password', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('confirmpassword', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('role', array(
                'class' => 'span3',
                'options' => array('admin' => 'Admin', 'user' => 'User')
            )); ?>
            <?php echo $this->Form->hidden('id') ?>
        </fieldset>
        <?php echo $this->Form->end() ?>
    </div>
  </div>
  <div class="modal-footer">
      <button class="btn btn-info save rightmargin4"><i class="icon-hdd"></i> Save</button>
  </div>
</div>
<script>
    // save handler
    $('#myModal .save').click(function() {
        if ($('#myModal input:text').val().length === 0) {
            alert('Description is required.');
            $('#myModal input:text').focus();
            return;
        }
        $('#myModal form').submit();
    });
    
    // add handler
    $('.add').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#myModalLabel').val('Add Need Category');
        $('#myModal fieldset input').val('');
        $('#myModal').modal('show');
    });

    // edit handler
    $('.edit').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#myModalLabel').val('Edit Need Category');
        $('#myModal [id*=CategoryDescription]').val(tr.find('.desc').html().trim());
        $('#myModal [id*=CategoryId]').val(tr.find('.id').val());
        $('#myModal').modal('show');
    });
</script>