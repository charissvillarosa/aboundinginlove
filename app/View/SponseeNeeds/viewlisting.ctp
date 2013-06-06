<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-left bottomargin2 leftmargin1">
            <?php
            $sponsee = $sponsee['Sponsee'];
            echo "<h4 class='fontcolor1'>".$sponsee['firstname']." ".$sponsee['middlename']." ".$sponsee['lastname']." List of Needs</h4>"
            ?>
        </div>
        <div class="pull-right bottomargin2">
            <?php echo $this->Html->link('Add New Record', array('action' => 'add', $sponsee['id']), array('class' => 'btn btn-info btn-small')); ?>
            <?php echo $this->Html->link('Go back to Sponsee List', array('controller' => 'sponsees', 'action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div class="leftmargin1">
            <?php echo $this->Session->flash(); ?>
        </div>
        <table class="leftmargin1 table table-hover table-bordered">
            <?php
            $ctr = 1;
            $prevCat = 0;

            if(empty($sponseeneeds)){
                echo "<tr class='alert alert-info'>
                    <td><h3>Not yet specified.</h3></td>
                </tr>";
            }
            else {
                foreach ($sponseeneeds as $item) :
                    $need = $item['SponseeNeed'];
                    $category = $item['Category'];

                    if ($prevCat != $category['id']) : ?>
                        <tr>
                            <th bgcolor="#eef6fa" colspan="9">
                                <?php echo $category['description'] ?>
                            </th>
                        </tr
                        <tr>
                            <td bgcolor="#f9f9f9">No.</td>
                            <td bgcolor="#f9f9f9">Description</td>
                            <td bgcolor="#f9f9f9">Needed Amount</td>
                            <td bgcolor="#f9f9f9">Donated Amount</td>
                            <td bgcolor="#f9f9f9">Added By</td>
                            <td bgcolor="#f9f9f9">Date Added</td>
                            <td bgcolor="#f9f9f9">Date Modified</td>
                            <td bgcolor="#f9f9f9">Edit</td>
                            <td bgcolor="#f9f9f9">Delete</td>
                        </tr>
                    <?php 
                    $prevCat = $category['id'];
                    endif; 
                    ?>
                    <tr>
                        <td bgcolor="#fff"><?php echo $ctr.'.'; ?></td>
                        <td bgcolor="#fff"><?php echo $need['description'] ?></td>
                        <td bgcolor="#fff" style="text-align: right;"><?php echo $this->Number->currency($need['neededamount']) ?></td>
                        <td bgcolor="#fff" style="text-align: right;"><?php echo $this->Number->currency($need['donatedamount'])?></td>
                        <td bgcolor="#fff"><?php echo $need['added_by'] ?></td>
                        <td bgcolor="#fff"><?php echo $need['created'] ?></td>
                        <td bgcolor="#fff"><?php echo $need['modified'] ?></td>
                        <td>
                           <i><?php echo $this->Html->link('', array('controller' => 'SponseeNeeds', 'action' => 'edit', $need['id'], $need['sponsee_id']), array('class' => 'icon-edit')); ?></i>
                        </td>
                        <td>
                            <i>
                            <?php echo $this->Html->link(
                                '',
                                array('action' => 'delete', $need['id'], $need['sponsee_id']),
                                array('class' => 'icon-trash'),
                                'Are you sure you want to delete this item?');
                            ?>
                            </i>
                        </td>
                    </tr>
                    <?php $ctr++;
                endforeach;
            }
        ?>
        </table>
    </div>
</div>