<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2">
            <?php echo $this->Html->link('Add New Category', array('controller' => 'SponseeNeedCategories', 'action' => 'add'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div class="leftmargin1">
            <?php echo $this->Session->flash(); ?>
        </div>
        <table class="leftmargin1 table table-hover table-bordered">
            <tr>
                <th bgcolor="#f9f9f9">No.</th>
                <th bgcolor="#f9f9f9">Description</th>
                <th bgcolor="#f9f9f9">Edit</th>
                <th bgcolor="#f9f9f9">Delete</th>
            </tr>
            
            <?php
            $ctr = 1;
            
            foreach ($categories as $item) :
                $category = $item['SponseeNeedCategory'];
            ?>
                <tr>
                    <td bgcolor="#fff"><?php echo $ctr.'.'; ?></td>
                    <td bgcolor="#fff"><?php echo $category['description'] ?></td>
                    <td>
                       <i><?php echo $this->Html->link('', array('controller' => 'SponseeNeedCategories', 'action' => 'edit', $category['id']), array('class' => 'icon-edit')); ?></i>
                    </td>
                    <td>
                        <i>
                        <?php echo $this->Html->link(
                            '',
                            array('action' => 'delete', $category['id']),
                            array('class' => 'icon-trash'),
                            'Are you sure you want to delete this item?');
                        ?>
                        </i>
                    </td>
                </tr>
                <?php $ctr++;
            endforeach; ?>
        </table>
    </div>
</div>