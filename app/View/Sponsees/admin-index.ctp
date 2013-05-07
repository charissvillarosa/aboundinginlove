<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2">
            <?php echo $this->Html->link('Add New Sponsee', array('action' => 'add'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <table class="leftmargin1 table table-hover table-bordered">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Country</th>
                <th>Map Location</th>
                <th>Information / Biography</th>
                <th>Birtd Date</th>
                <th>Primary Id</th>
                <th>Edit</th>
                <th>View</th>
                <th>Delete</th>
            </tr>

            <?php
            $ctr = 1;
            
            foreach ($sponseeList as $item) :
                $sponsee = $item['Sponsee'];
                ?>
                <tr>
                    <td><?php echo $ctr; ?>
                    <td><?php echo $sponsee['firstname'] .' '. $sponsee['middlename'] .' '. $sponsee['lastname'] ?></td>
                    <td><?php echo $sponsee['address'] ?></td>
                    <td><?php echo $sponsee['country'] ?></td>
                    <td>
                        <?php 
                        echo  
                            $maplocation = $sponsee['maplocation'];
                            echo $this->Text->truncate($maplocation, 5, array('exact' => false));
                        ?>
                    </td>
                    <td>
                        <?php 
                            $info = $sponsee['information'];
                            echo $this->Text->truncate($info, 20, array('exact' => false));
                        ?>
                    </td>
                    <td><?php echo $sponsee['birthdate'] ?></td>
                    <td><?php echo $sponsee['primaryimage'] ?></td>
                    <td align="center">
                       <i><?php echo $this->Html->link('', array('controller' => 'sponsees', 'action' => 'edit', $sponsee['id']), array('class' => 'icon-edit')); ?></i>
                    </td>
                    <td align="center">
                        <i><?php echo $this->Html->link('', array('controller' => 'sponsees', 'action' => 'view', $sponsee['id']), array('class' => 'icon-list')); ?></i>
                    </td>
                    <td align="center">
                        <i>
                        <?php echo $this->Html->link(
                            '',
                            array('action' => 'delete', $sponsee['id']),
                            array('class' => 'icon-trash'),
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