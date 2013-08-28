<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-left banner bottommargin2 leftmargin1">
            <?php
            $sponsee = $sponsee['Sponsee'];
            echo "<h4 class='fontcolor1'>".$sponsee['firstname']." ".$sponsee['middlename']." ".$sponsee['lastname']." List of Needs</h4>"
            ?>
        </div>
        <div class="pull-right bottommargin2">
            <!-- Button to trigger modal -->
            <a href="#myModal" role="button" class="btn btn-info add"><i class="icon-plus"></i> Add Record</a>
            <?php // echo $this->Html->link('Add New Record', array('action' => 'add', $sponsee['id']), array('class' => 'btn btn-info btn-small')); ?>
            <?php echo $this->Html->link('Go back to Sponsee List', array('controller' => 'sponsees', 'action' => 'index'), array('class' => 'btn btn-info')); ?>
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
                    $addedBy = $item['AddedBy'];

//                    debug($need);
                    if ($prevCat != $category['id']) : ?>
                        <tr>
                            <th bgcolor="#eef6fa" colspan="9">
                                <?php echo '<span class="category">'.$category['description'].'</span>'; ?>
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
                        <td bgcolor="#fff">
                            <?php echo $ctr.'.'; ?>
                            <span class="id" style="display:none;"><?php echo $need['id'] ?></span>
                            <span class="sponseeid" style="display:none;"><?php echo $need['sponsee_id'] ?></span> 
                        </td>
                        <td bgcolor="#fff"><?php echo '<span class="description">'.$need['description'].'</span>'; ?></td>
                        <td bgcolor="#fff" style="text-align: right;"><?php echo '<span class="neededamount">'.$this->Number->currency($need['neededamount']).'</span>'; ?></td>
                        <td bgcolor="#fff" style="text-align: right;"><?php echo $this->Number->currency($need['donatedamount'])?></td>
                        <td bgcolor="#fff"><?php echo $addedBy['firstname'] ?></td>
                        <td bgcolor="#fff"><?php echo $this->Time->format($need['created']) ?></td>
                        <td bgcolor="#fff"><?php echo $this->Time->format($need['modified']) ?></td>
                        <td>
                            <a href="#" class="edit" title="Edit"><i class="icon-edit"></i></a>
                           <!--<i><?php // echo $this->Html->link('', array('controller' => 'SponseeNeeds', 'action' => 'edit', $need['id'], $need['sponsee_id']), array('class' => 'icon-edit','title' => 'Edit')); ?></i>-->
                        </td>
                        <td>
                            <i>
                            <?php echo $this->Html->link(
                                '',
                                array('action' => 'delete', $need['id'], $need['sponsee_id']),
                                array('class' => 'icon-trash','title' => 'Delete'),
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

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel" style="margin-left:30px;">SPONSEE NEED</h3>
  </div>
  <div class="modal-body">
    <div class="leftmargin1">
        <?php
            echo $this->Session->flash();
            echo $this->Form->create('SponseeNeed', array('action' => "add/$sponsee[id]"));
        ?>
        <fieldset>
            <?php echo $this->Form->input('category_id', array('type' => 'select', 'label' => 'Category', 'class' => 'topmargin4 span4', 'options' => $categories)) ?>
            <?php echo $this->Form->input('description', array('label' => 'Description', 'class' => 'span4')) ?>
            <?php echo $this->Form->input('neededamount', array('label' => 'Needed Amount', 'class' => 'span2', 'style'=>'text-align:right;')) ?>
            <?php echo $this->Form->hidden('id') ?>
            <?php echo $this->Form->hidden('sponsee_id') ?>
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
        var elems = $('input, select, textarea', '#myModal form div.required');
        var errors = [];
        var firstError;
        elems.each(function(idx,elem) {
            if (elem.value.trim().length === 0) {
                if (!firstError) firstError = elem;
                elem.value = '';
                var lbl = $('label[for=' +elem.id+ ']');
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
        var tr = $(this).closest('tr');
        $('#myModalLabel').html('Add Sponsee Need');
        $('#myModal fieldset input').val('');
        $('#myModal').modal('show');
    });

    // edit handler
    $('.edit').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#myModalLabel').html('Edit Sponsee Need');
        $('#SponseeNeedCategoryid').val(tr.find('.category').html());
        $('#SponseeNeedDescription').val(tr.find('.description').html());
        $('#SponseeNeedNeededamount').val(tr.find('.neededamount').html().replace(/[^\d.]/g, ''));
        $('#SponseeNeedId').val(tr.find('.id').html());
        $('#SponseeNeedSponseeid').val(tr.find('.sponseeid').html());
        $('#myModal').modal('show');
    });

</script>