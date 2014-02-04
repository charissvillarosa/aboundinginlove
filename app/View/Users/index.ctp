<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottommargin2 banner">
            <!-- Button to trigger modal -->
            <a href="#myModal" role="button" class="btn btn-info add"><i class="icon-plus"></i> Add Record</a>
        </div>
        <div class="leftmargin1">
            <?php echo $this->Session->flash(); ?>
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
                    <td>
                        <?php echo $ctr; ?>
                        <span class="id" style="display:none;"><?php echo $user['id'] ?></span>
                        <span class="purpose" style="display:none;"><?php echo $user['purpose_of_donation'] ?></span>
                    </td>
                    <td><?php echo '<span class="username">'.$user['username'].'</span>'; ?></td>
                    <td><?php echo '<span class="role">'.$user['role'].'</span>'; ?></td>
                    <td><?php echo $this->Time->format($user['created']) ?></td>
                    <td><?php echo $this->Time->format($user['modified']) ?></td>
                    <td>
                        <?php 
                            echo '<span class="firstname">'.$user['firstname'].'</span> <span class="middlename">'.$user['middlename'].'</span> <span class="lastname">'.$user['lastname'].'</span>' 
                        ?>
                    </td>
                    <td>
                        <?php 
                            $add = $user['address'];
                            echo '<span class="address">'.$this->Text->truncate($add, 50, array('exact' => false)).'</span>';
                        ?>
                    </td>
                    <td>
                        <?php 
                        $flag = "/img/flag/".$user['country'].".png"; 
                        
                        if($user['country'] != ''){
                            echo '<span class="country">'. $this->Html->image("$flag") . ' ' . $user['country'].'</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="#" class="edit" title="Edit"><i class="icon-edit"></i></a>
                    </td>
                    <td>
                        <a href="#" class="view" title="View"><i class="icon-list"></i></a>
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
            <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <?php echo $this->Paginator->numbers(); ?>
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
                <?php echo $this->Form->input('country', array('type' => 'select', 'options' => $countryList)); ?>
                <?php echo $this->Form->input('purpose_of_donation', array('class' => 'span4')); ?>
                <?php echo $this->Form->input('username', array('class' => 'span3')); ?>
                <div class="password" style="padding:0;">
                    <?php echo $this->Form->input('password', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('confirmpassword', array('type' => 'password', 'class' => 'span3')); ?>
                </div>
                <?php
                echo $this->Form->input('role', array(
                    'class' => 'span3',
                    'options' => array('admin' => 'Admin', 'user' => 'User')
                ));
                ?>
            <?php echo $this->Form->hidden('id') ?>
            </fieldset>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-info save rightmargin4"><i class="icon-hdd"></i> Save</button>
        <button class="btn btn-info ok rightmargin4 hide" data-dismiss="modal">OK</button>
    </div>
</div>
<script>
    // save handler
    $('#myModal .save').click(function() {
        var elems = $('input, select, textarea', '#myModal form div.required');
        var errors = [];
        var firstError;
        elems.each(function(idx, elem) {
            if (elem.value.trim().length === 0) {
                if (!firstError)
                    firstError = elem;
                elem.value = '';
                var lbl = $('label[for=' + elem.id + ']');
                errors.push(lbl.html() + ' is required.');
            }
        });

        if (errors.length > 0) {
            alert(errors.join('\n'));
            $(firstError).focus();
            return;
        }

        var passDiv = $('#myModal div.password');
        if (!passDiv.is(':empty')) {
            if ($('#UserPassword').val() !== $('#UserConfirmpassword').val()) {
                alert('Password and confirm password did not match.');
                $('#UserConfirmpassword').focus();
                return;
            }
        }

        $('#myModal form').submit();
    });

    // add handler
    $('.add').click(function(e) {
        e.preventDefault();

        var passDiv = $('#myModal div.password');
        if (passDiv.is(':empty')) {
            passDiv.html(passDiv.data('html'));
        }

        var tr = $(this).closest('tr');
        $('#myModalLabel').html('Add User');
        $('#myModal fieldset input').val('');
        $('#myModal').modal('show');

        $('input, select', '#myModal form').removeAttr('readonly');
        $('#myModal button.ok').hide();
        $('#myModal button.save').show();
    });

    // edit handler
    $('.edit').click(function(e) {
        e.preventDefault();

        var passDiv = $('#myModal div.password');
        if (!passDiv.is(':empty')) {
            passDiv.data('html', passDiv.html());
            passDiv.html('');
        }

        var tr = $(this).closest('tr');
        $('#myModalLabel').html('Edit User');
        $('#UserFirstname').val(tr.find('.firstname').html());
        $('#UserMiddlename').val(tr.find('.middlename').html());
        $('#UserLastname').val(tr.find('.lastname').html());
        $('#UserAddress').val(tr.find('.address').html());
        $('#UserCountry').val(tr.find('.country').html());
        $('#UserPurposeOfDonation').text(tr.find('.purpose').html());
        $('#UserUsername').val(tr.find('.username').html());
        $('#UserRole').val(tr.find('.role').html());
        $('#UserId').val(tr.find('.id').html());
        $('#myModal').modal('show');

        $('input, select, textarea', '#myModal form').removeAttr('readonly');
        $('#UserUsername').attr('readonly', 'readonly');
        $('#myModal button.ok').hide();
        $('#myModal button.save').show();
    });

    // view handler
    $('.view').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#myModalLabel').html('View User');
        $('#UserFirstname').val(tr.find('.firstname').html());
        $('#UserMiddlename').val(tr.find('.middlename').html());
        $('#UserLastname').val(tr.find('.lastname').html());
        $('#UserAddress').val(tr.find('.address').html());
        $('#UserCountry').val(tr.find('.country').html());
        $('#UserPurposeOfDonation').text(tr.find('.purpose').html());
        $('#UserUsername').val(tr.find('.username').html());
        $('#UserPassword').val(tr.find('.password').html());
        $('#UserConfirmpassword').val(tr.find('.confirmpassword').html());
        $('#UserRole').val(tr.find('.role').html());
        $('#UserId').val(tr.find('.id').html());
        $('#myModal').modal('show');

        $('input, select, textarea', '#myModal form').attr('readonly', 'readonly');
        $('#myModal button.ok').show();
        $('#myModal button.save').hide();
    });
</script>