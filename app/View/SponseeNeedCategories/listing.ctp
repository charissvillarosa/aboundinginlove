<div class="container tabs portfolio">
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
                    <td><?php echo $ctr.'.'; ?></td>
                    <td>
                        <span class="desc">
                            <?php echo $category['description'] ?>
                        </span>
                        <input type="hidden" class="id" value="<?php echo $category['id']; ?>"/>
                    </td>
                    <td>
                        <a href="#" class="edit" title="Edit"><i class="icon-edit"></i></a>
                    </td>
                    <td>
                        <i>
                        <?php echo $this->Html->link(
                            '',
                            array('action' => 'delete', $category['id']),
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
    <h3 id="myModalLabel" style="margin-left:30px;">NEED CATEGORY</h3>
  </div>
  <div class="modal-body">
    <div class="leftmargin1">
        <?php
        echo $this->Form->create('SponseeNeedCategory', array('action' => 'add'));
        ?>
        <fieldset>
            <?php echo $this->Form->input('description', array('label' => 'Description', 'class'=>'span5')) ?>
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