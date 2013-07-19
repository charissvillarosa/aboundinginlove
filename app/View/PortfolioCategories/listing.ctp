<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2">
            <!-- Button to trigger modal -->
            <a href="#myModal" role="button" class="btn" data-toggle="modal">Add New Category</a>

            <?php echo $this->Html->link('Add New Portfolio Name', array('controller' => 'PortfolioCategories', 'action' => 'add'), array('class' => 'btn btn-info btn-small')); ?>
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

            foreach ($list as $item) :
            ?>
                <tr>
                    <td bgcolor="#fff"><?php echo $ctr.'.'; ?></td>
                    <td bgcolor="#fff"><?php echo $item['PortfolioCategory']['description'] ?></td>
                    <td>
                       <i><?php echo $this->Html->link('', array('controller' => 'PortfolioCategories', 'action' => 'edit', $item['PortfolioCategory']['id']), array('class' => 'icon-edit','title' => 'Edit')); ?></i>
                    </td>
                    <td>
                        <i>
                        <?php echo $this->Html->link(
                            '',
                            array('action' => 'delete', $item['PortfolioCategory']['id']),
                            array('class' => 'icon-trash','title' => 'Delete'),
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

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Portfolio Category</h3>
  </div>
  <div class="modal-body">
    <div>
        <?php
        echo $this->Form->create('PortfolioCategory');
        ?>
        <fieldset>
            <?php echo $this->Form->input('description', array('label' => 'Description', 'style' => 'width:400px')) ?>
        </fieldset>
    </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->end('Save Changes') ?>
  </div>
</div>