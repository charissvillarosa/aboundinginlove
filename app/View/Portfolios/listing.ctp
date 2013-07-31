<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2 banner">
            <?php
//                echo $this->Html->link(
//                'Add New Portfolio',
//                array('controller' => 'Portfolios', 'action' => 'add', $sponsee_id),
//                array('class' => 'btn btn-info btn-small'));
            ?>
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
                        $id = $item['Portfolio']['sponsee_id'];
                        $portfolio = $item['Portfolio'];
                        $category= $item['Category'];
                        
                        if ($prevCat != $category['id']) : ?>
                            <tr>
                                <th bgcolor="#eef6fa" colspan="2">
                                    <?php echo $category['description'] ?>
                                </th>
                            </tr
                        <?php
                        $prevCat = $category['id'];
                        endif;
                        ?>
                        <tr>
                            <td bgcolor="#eef6fa">
                                <span class="id" style="display:none;"><?php echo $need['id'] ?></span>
                                <span class="sponseeid" style="display:none;"><?php echo $need['sponsee_id'] ?></span>
                                <?php echo $portfolio['description'] ?>
                            </td>
                            <th>
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
                            </th>
                        </tr
                        <tr>
                            <td bgcolor='#fff' colspan='2'>
                            <?php
                                if(empty($item['Images'])){
                                    echo "<p>No photo uploaded</p><br>";
                                    echo $this->Html->link(
                                    'Upload Image',
                                    array('controller' => 'PortfolioImages', 'action' => 'upload', $sponsee_id, $id),
                                    array('class' => 'btn btn-info btn-small'));
                                }
                                else {
                                    foreach ($item['Images'] as $image) :
                                        $imageURl = array('controller' => 'PortfolioImages', 'action' => 'view', $image['id']);
                                        $attrs = array('alt' => '', 'width' => '100', 'class' => 'leftmargin1 img-polaroid', 'title'=>$image['description']);
                                        echo $this->Html->image($imageURl, $attrs);
                                    endforeach;
                                    echo '<br><br><br>'.$this->Html->link(
                                    'Upload Image',
                                    array('controller' => 'PortfolioImages', 'action' => 'upload', $sponsee_id, $id),
                                    array('class' => 'btn btn-info btn-small'));
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
            echo $this->Form->create('Portfolio', array('action' => 'add'));
        ?>
        <fieldset>
            <?php echo $this->Form->input('category_id', array('type'=>'select','options'=>$portfoliolisting,'class'=>'span4')); ?>
            <?php echo $this->Form->input('description', array('label' => 'Description','class'=>'span4')); ?>
            <?php echo $this->Form->input('sponsee_id', array('type' => 'hidden', 'value'=>$sponsee_id)); ?>
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
</script>