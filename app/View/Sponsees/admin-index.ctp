<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottommargin2 banner">
            <a href="<?php echo $this->Html->url(array('controller'=>'Sponsees', 'action' => 'add')) ?>" class="btn btn-info add"><i class="icon-plus"></i> Add Record</a>
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
                        <span class="id" style="display:none;"><?php echo $sponsee['id'] ?></span>
                        <span class="maplocation" style="display:none;"><?php echo $sponsee['maplocation'] ?></span>
                        <span class="videolink" style="display:none;"><?php echo $sponsee['videolink'] ?></span>
                        <span class="short_description" style="display:none;"><?php echo $sponsee['short_description'] ?></span>
                        <span class="long_description" style="display:none;"><?php echo $sponsee['long_description'] ?></span>
                    </td>
                    <td>
                        <?php echo 
                        '<span class="firstname">'.$sponsee['firstname'].'</span> <span class="middlename">'.$sponsee['middlename'].'</span> <span class="lastname">'.$sponsee['lastname'].'</span>' ?>
                    </td>
                    <td>
                        <?php 
                            $add = $sponsee['address'];
                            echo '<span class="address">'.$add.'</span>';
                        ?>
                    </td>
                    <td><?php echo '<span class="country">'.$sponsee['country'].'</span>'; ?></td>
                    <td><?php echo '<span class="gender">'.$sponsee['gender'].'</span>'; ?></td>
                    <td><?php echo '<span class="birthdate">'.$this->Time->format($sponsee['birthdate']).'</span>' ?></td>
                    <td>
                        <i><?php echo $this->Html->link('', array('controller' => 'SponseeNeeds', 'action' => 'viewlisting', $sponsee['id']), array('class' => 'icon-folder-open','title' => 'View Sponsee Needs')); ?></i>
                    </td>
                    <td>
                        <i><?php echo $this->Html->link('', array('controller' => 'Portfolios', 'action' => 'listing', $sponsee['id']), array('class' => 'icon-folder-open','title' => 'View Sponsee Portfolio')); ?></i>
                    </td>
                    <td>
                        <a href="<?php echo $this->Html->url(array('controller'=>'Sponsees', 'action' => 'edit', $sponsee['id'])) ?>" title="Edit"><i class="icon-edit"></i></a>
                    </td>
                    <td>
                        <i><?php echo $this->Html->link('', array('controller' => 'sponsees', 'action' => 'adminview', $sponsee['id']), array('class' => 'icon-list','title' => 'View Sponsee Profile')); ?></i>
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
            <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <?php echo $this->Paginator->numbers(); ?>
            <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
        </div>
    </div>
</div>