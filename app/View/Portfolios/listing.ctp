<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottommargin2 banner">
            <!-- Button to trigger modal -->
            <a href="#myModal" role="button" class="btn btn-info add"><i class="icon-plus"></i> Add Record</a>
        </div>
        <div class="leftmargin1">
            <?php echo $this->Session->flash(); ?>
        </div>
        <table class="leftmargin1 table table-bordered">
            <?php
                $prevCat = 0;

                if(empty($listing)){
                    echo "<tr class='alert alert-info'>
                        <td><h3>Not yet specified.</h3></td>
                    </tr>";
                }
                else {
                    foreach ($listing as $item) :
                        $portfolio = $item['Portfolio'];
                        $category= $item['Category'];
                        
                        if ($prevCat != $category['id']) : ?>
                            <tr>
                                <th bgcolor="#eef6fa" colspan="4">
                                    <span class="cat"><?php echo $category['description'] ?></div>
                                </th>
                            </tr
                        <?php
                        $prevCat = $category['id'];
                        endif;
                        ?>
                        <tr>
                            <td>
                                <span class="cat-id" style="display:none;"><?php echo $category['id'] ?></span>
                                <span class="id" style="display:none;"><?php echo $portfolio['id'] ?></span>
                                <span class="sponseeid" style="display:none;"><?php echo $portfolio['sponsee_id'] ?></span>
                                <span class="desc"><?php echo $portfolio['description'] ?></span>
                            </td>
                            <td>
                                <a href="#" class="edit" title="Edit"><i class="icon-edit"></i></a>
                            </td>
                            <td>
                                <i>
                                <?php
                                    $id = $portfolio['id'];
                                    $sponsee_id = $portfolio['sponsee_id'];

                                    echo $this->Html->link(
                                    '',
                                    array('action' => 'delete', $id, $sponsee_id),
                                    array('class' => 'icon-trash','title' => 'Delete'),
                                    'Are you sure you want to delete this item?');
                                ?>
                                </i>
                            </td>
                            <td>
                                <?php
                                echo '<div class="clearfix"><div class="pull-right">'.$this->Html->link(
                                'Upload Image',
                                array('controller' => 'PortfolioImages', 'action' => 'upload', $sponsee_id, $id),
                                array('class' => 'btn btn-info btn-large leftmargin1'));
                                echo '</div></div>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#fff' colspan='4'>
                            <?php
                                if(empty($item['Images'])){
                                    echo "<p>No photo uploaded</p><br>";
                                }
                                else {
                                    foreach ($item['Images'] as $image) :
                                        $imageid = $image['id'];

                                        $imageURl = array('controller' => 'PortfolioImages', 'action' => 'view', $image['id']);
                                        $attrs = array('alt' => '', 'width' => '160', 'class' => 'leftmargin1 img-polaroid', 'title'=>$image['description']);
                                        echo '<div style="padding:0; margin:0 20px 0 0;" class="span2">'.$this->Html->image($imageURl, $attrs);
                                        echo $this->Html->link(
                                            'Delete this image?',
                                            array('action' => 'itemdelete', $imageid, $sponsee_id),
                                            array('class' => 'btn btn-info btn-block leftmargin1'),
                                            'Are you sure you want to delete this image?');
                                        echo '</div>';
                                    endforeach;
                                }
                    endforeach;
                }
            ?>
                            </td>
                        </tr>
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
            echo $this->Form->create('Portfolio', array('action' => "add/$sponsee_id"));
        ?>
        <fieldset>
            <?php echo $this->Form->input('category_id', array('type'=>'select','options'=>$portfoliolisting,'class'=>'span4')); ?>
            <?php echo $this->Form->input('description', array('label' => 'Description','class'=>'span5', 'rows' =>'10')); ?>
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
        $('#myModalLabel').html('Add User');
        $('#myModal fieldset input').val('');
        $('#myModal').modal('show');
    });

    // edit handler
    $('.edit').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#myModalLabel').html('Edit Portfolio');
        $('#myModal [id*=CategoryId]').val(tr.find('.cat-id').html().trim());
        $('#myModal [id*=Description]').val(tr.find('.desc').html().trim());
        $('#myModal [id*=Id]').val(tr.find('.id').html());
        $('#myModal').modal('show');
    });
</script>