<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2 banner">
            <!-- Button to trigger modal -->
            <a href="#myModal" role="button" class="btn btn-info add"><i class="icon-plus"></i> Add Record</a>
        </div>
        <div class="leftmargin1">
            <?php echo $this->Session->flash(); ?>
        </div>
        <table class="leftmargin1 table table-hover table-bordered">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Map Location</th>
                <th>Biography</th>
                <th>Birth Date</th>
                <th>View Sponsee Needs</th>
                <th>View Sponsee Portfolio</th>
                <th>Edit</th>
                <th>View</th>
                <th>Delete</th>
            </tr>

            <?php
            $ctr = 1;
            
            foreach ($sponseeList as $item) :
                $sponsee = $item['SponseeListingItem'];
                ?>
                <tr>
                    <td>
                        <?php echo $ctr; ?>
                        <span class="id" style="display:none;">
                            <?php echo $sponsee['id'] ?>
                        </span>
                    </td>
                    <td>
                        <?php echo 
                        '<span class="firstname">'.$sponsee['firstname'].'</span> <span class="middlename">'.$sponsee['middlename'].'</span> <span class="lastname">'.$sponsee['lastname'].'</span>' ?>
                    </td>
                    <td>
                        <?php 
                            $add = $sponsee['address'];
                            echo '<span class="address">'.$this->Text->truncate($add, 20, array('exact' => false)).'</span>';
                        ?>
                    </td>
                    <td><?php echo '<span class="country">'.$sponsee['country'].'</span>'; ?></td>
                    <td><?php echo '<span class="gender">'.$sponsee['gender'].'</span>'; ?></td>
                    <td>
                        <?php 
                        echo  
                            $maplocation = $sponsee['maplocation'];
                            echo '<span class="maplocation">'.$this->Text->truncate($maplocation, 5, array('exact' => false)).'</span>';
                        ?>
                    </td>
                    <td>
                        <?php 
                            $info = $sponsee['information'];
                            echo '<span class="information">'.$this->Text->truncate($info, 20, array('exact' => false)).'</span>';
                        ?>
                    </td>
                    <td><?php echo '<span class="birthdate">'.$this->Time->format($sponsee['birthdate']).'</span>' ?></td>
                    <td>
                        <i><?php echo $this->Html->link('', array('controller' => 'SponseeNeeds', 'action' => 'viewlisting', $sponsee['id']), array('class' => 'icon-folder-open','title' => 'View Sponsee Needs')); ?></i>
                    </td>
                    <td>
                        <i><?php echo $this->Html->link('', array('controller' => 'Portfolios', 'action' => 'listing', $sponsee['id']), array('class' => 'icon-folder-open','title' => 'View Sponsee Portfolio')); ?></i>
                    </td>
                    <td>
                        <a href="#" class="edit" title="Edit"><i class="icon-edit"></i></a>
                    </td>
                    <td>
                        <i><?php echo $this->Html->link('', array('controller' => 'sponsees', 'action' => 'view', $sponsee['id']), array('class' => 'icon-list','title' => 'View Sponsee Profile')); ?></i>
                    </td>
                    <td>
                        <i>
                        <?php echo $this->Html->link(
                            '',
                            array('action' => 'delete', $sponsee['id']),
                            array('class' => 'icon-trash','title' => 'Delete Sponsee'),
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
    <h3 id="myModalLabel" style="margin-left:30px;">SPONSEE</h3>
  </div>
  <div class="modal-body">
    <div class="leftmargin1">
        <?php
        echo $this->Form->create('Sponsee', array('action' => 'add'));
        ?>
        <fieldset>
            <?php echo $this->Form->input('firstname', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('middlename', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('lastname', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('address', array('class' => 'span3')); ?>
            <?php echo $this->Form->input('country', array('type'=>'select','options'=>$countryList)); ?>
            <?php echo $this->Form->input('gender', array(
                'class' => 'span2',
                'options' => array('Male' => 'Male', 'Female' => 'Female')
            )); ?>
            <?php echo $this->Form->input('maplocation', array('class' => 'span5')); ?>
            <?php echo $this->Form->input('information', array('class' => 'span5', 'rows' => '5')); ?>
            <?php echo $this->Form->input('birthdate', array('class' => 'span3', 'maxYear' => date('Y'), 'minYear' => 1950)); ?>
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
            alert('Fields with(*) are required.');
            $('#myModal input:text').focus();
            return;
        }
        $('#myModal form').submit();
    });
    
    // add handler
    $('.add').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#myModalLabel').val('Add User');
        $('#myModal fieldset input').val('');
        $('#myModal').modal('show');
    });

    // edit handler
    $('.edit').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#myModalLabel').val('Edit User');
        $('#SponseeFirstname').val(tr.find('.firstname').html());
        $('#SponseeMiddlename').val(tr.find('.middlename').html());
        $('#SponseeLastname').val(tr.find('.lastname').html());
        $('#SponseeAddress').val(tr.find('.address').html());
        $('#SponseeCountry').val(tr.find('.country').html());
        $('#SponseeGender').val(tr.find('.gender').html());
        $('#SponseeMaplocation').val(tr.find('.maplocation').html());
        $('#SponseeInformation').val(tr.find('.information').html());
        $('#SponseeBirthdate').val(tr.find('.birthdate').html());
        $('#SponseeId').val(tr.find('.id').html());
        $('#myModal').modal('show');
    });
</script>