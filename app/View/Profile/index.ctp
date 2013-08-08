<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Profile',array('controller'=>'Profile', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History',array('controller'=>'DonationHistory', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends',array('controller'=>'InviteFriends', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'TransactionHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Transaction History',array('controller'=>'TransactionHistory', 'action' => 'index'))?>
            </li>
            <li class="<?php echo $this->name == 'ChangePassword' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Change Password',array('controller'=>'ChangePassword', 'action' => 'index'))?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 30px 0; background: #fff; margin-top:103px;">
       <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1">PROFILE</p>
                <?php echo $this->Session->flash(); ?>
            </div>
            <div class="pull-right leftmargin2 bottommargin2">
                <!-- Button to trigger modal -->
                <a href="#myModal" role="button" class="btn btn-info edit"><i class="icon-plus"></i> Edit Profile</a>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2">
            <div class="pull-left width1">
                <div>
                    <?php
                        $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $user['id']);
                        $attrs = array('alt' => '', 'width' => '190px', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                    ?>
                </div>
                <div>
                    <?php
                        $action = array('controller' => 'ProfileImages', 'action' => 'upload', $user['id']);
                        echo $this->Html->link('Change Profile Picture', $action, array('class' => 'btn btn-info btn-block'));
                    ?>
                </div>
            </div>
            <div class="pull-left span5">
                <span class="id" style="display:none;"><?php echo $user['id'] ?></span>
                <p class="fistname"><?php echo "Firstname : ".$user['firstname']; ?></p>
                <p class="middlename"><?php echo "Middlename : ".$user['middlename']; ?></p>
                <p class="lastname"><?php echo "Lastname : ".$user['lastname']; ?></p>
                <p class="address"><?php echo "Address : ".$user['address']; ?></p>
                <p class="country"><?php echo "Country : ".$user['country']; ?></p>
                <p class="email"><?php echo "Email : ".$user['email']; ?></p>
            </div>
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
                <?php echo $this->Form->input('email', array('class' => 'span3')); ?>
            <?php echo $this->Form->hidden('id') ?>
            </fieldset>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-info save rightmargin4"><i class="icon-hdd"></i> Update</button>
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
        $('#myModal form').submit();
    });

    // add handler
    $('.add').click(function(e) {
        e.preventDefault();

        var div = $(this).closest('div');
        $('#myModalLabel').html('Add Profile');
        $('#myModal fieldset input').val('');
        $('#myModal').modal('show');

        $('input, select', '#myModal form').removeAttr('readonly');
        $('#myModal button.ok').hide();
        $('#myModal button.save').show();
    });

    // edit handler
    $('.edit').click(function(e) {
        e.preventDefault();

        var div = $(this).closest('div');
        $('#myModalLabel').html('Edit Profile');
        $('#UserFirstname').val(div.find('.firstname').html());
        $('#UserMiddlename').val(div.find('.middlename').html());
        $('#UserLastname').val(div.find('.lastname').html());
        $('#UserAddress').val(div.find('.address').html());
        $('#UserCountry').val(div.find('.country').html());
        $('#UserEmail').val(div.find('.email').html());
        $('#UserId').val(div.find('.id').html());
        $('#myModal').modal('show');

        $('input, select', '#myModal form').removeAttr('readonly');
        $('#myModal button.ok').hide();
        $('#myModal button.save').show();
    });
</script>