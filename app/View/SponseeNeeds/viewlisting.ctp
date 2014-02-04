<style>
    .headerstyle {
        width:1130px;
        padding:40px 10px 10px 30px;
    }
    .center {
        width:910px;
        margin:30px auto;
    }
</style>
<div class="container tabs">
    <div>
        <div class="pull-right headerstyle banner span11">
            <div class="pull-left">
                <p class="fontsize1">
                    <?php
                    $sponsee = $sponsee['Sponsee'];
                    echo "<p class='fontsize1'>".$sponsee['firstname']." ".$sponsee['middlename']." ".$sponsee['lastname']." Needs</p>"
                    ?>
                </p>
            </div>
            <div class="pull-right"><?php echo $this->Html->link('Go back to Sponsee List', array('controller' => 'sponsees', 'action' => 'index'), array('class' => 'btn btn-info btn-medium')); ?></div>
        </div>
        <div class="span11">
            <div class="pull-right">
                <!-- Button to trigger modal -->
                <a href="#myModal" role="button" class="btn btn-info add"><i class="icon-plus"></i> Add Record</a>
            </div>
            <div class="leftmargin1">
                <?php echo $this->Session->flash(); ?>
            </div>
            <?php
                if(empty($sponseeneeds)){
                    echo '
                        <table class="leftmargin1 table table-hover table-bordered">
                            <tr class="alert alert-info">
                                <td><p class="fontcolor1">Not yet specified.</p></td>
                            </tr>';
                }
                else {
                    foreach ($sponseeneeds as $itemLabel=>$itemArray) :

                        $ctr = 1;
                        $prevCat = 0;

                        echo "<h3 class='fontcolor1 leftmargin1'>$itemLabel</h3>";
                        echo '<table class="leftmargin1 table table-hover table-bordered">';

                        foreach ($itemArray as $item) :
                        
                            $need = $item['SponseeNeed'];
                            $category = $item['Category'];
                            $addedBy = $item['AddedBy'];

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
                                    <span class="donationmethod" style="display:none;"><?php echo $need['donation_method'] ?></span>
                                </td>
                                <td bgcolor="#fff"><?php echo '<span class="description">'.$need['description'].'</span>'; ?></td>
                                <td bgcolor="#fff" style="text-align: right;"><?php echo '<span class="neededamount">'.$this->Number->currency($need['neededamount']).'</span>'; ?></td>
                                <td bgcolor="#fff" style="text-align: right;"><?php echo $this->Number->currency($need['donatedamount'])?></td>
                                <td bgcolor="#fff"><?php echo $addedBy['firstname'].' '.$addedBy['middlename'].' '.$addedBy['lastname'] ?></td>
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

                        echo '</table>';

                    endforeach;
                }
            ?>
         </div>
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
            <?php
                echo '<div style="padding-left:0; margin-left:0;">';
                echo '<div style="padding-left:0; margin-left:0;" class="pull-left">'.$this->Form->input('neededamount', array('label' => 'Needed Amount', 'class' => 'span2', 'style'=>'text-align:right;')).'</div>';
                echo '<div class="pull-left">'. $this->Form->input('donation_method', array(
                    'label' => 'Donation Method',
                    'class' => 'span2',
                    'options' => array('onetime' => 'Once Time Donation', 'monthly' => 'Monthly Donation')
                )).'</div>';
                echo '</div>';
            ?>
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
        $('#SponseeNeedDonationMethod').val(tr.find('.donationmethod').html());
        $('#SponseeNeedNeededamount').val(tr.find('.neededamount').html().replace(/[^\d.]/g, ''));
        $('#SponseeNeedId').val(tr.find('.id').html());
        $('#SponseeNeedSponseeid').val(tr.find('.sponseeid').html());
        $('#myModal').modal('show');
    });

</script>