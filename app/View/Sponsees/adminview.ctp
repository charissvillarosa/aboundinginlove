<?php
$user = $this->Session->read('Auth.User');
?>
<div class="tabs">
    <div style="background: #fff;" class="pull-right">
        <div class="pull-right rightmargin1 bottommargin1 topmargin1">
            <div class="topmargin2">
                <div class="banner"></div>
                <div class="pull-right">
                    <?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-medium')); ?>
                </div>
                <div class="span2 box">
                    <div>
                        <?php
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                        $attrs = array('alt' => '', 'width' => '160', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                        ?>
                    </div>
                    <?php if (!empty($user) && $user['role'] == 'admin') : ?>
                    <div>
                        <?php
                        $action = array('controller' => 'SponseeImages', 'action' => 'upload', $sponsee['id']);
                        echo $this->Html->link('Change Photo', $action, array('class' => 'btn btn-info btn-block'));
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="margin1">
                        <p>
                            <b class="fontcolor1">
                                <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                            </b><br>
                            <b><?php echo $sponsee['country'] ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></b>
                        </p>
                    </div>
                    <hr/>
                    <div>
                        <?php 
                            $totalneededamount = 0;
                            $totaldonatedamount = 0;
                            $percentage = 0;
                            foreach ($sponseeneeds as $item) :
                                $need = $item['SponseeNeed'];
                                $totalneededamount = $totalneededamount + $need['neededamount'];
                                $totaldonatedamount = $totaldonatedamount + $need['donatedamount'];
                            endforeach;
                            if($totaldonatedamount == 0 or $totalneededamount == 0){
                                $percentage = 0;
                            }else {
                                $percentage = ($totaldonatedamount/$totalneededamount)*100;
                            }
                            
                        ?>
                        <?php
                            echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($percentage)."</b> raised</div>";
                            echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($percentage)."'></div></div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($totalneededamount, 'USD')."</b> = Needed</div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($totaldonatedamount, 'USD')."</b> = Donated</div>";
                            echo $this->Html->link('Donate', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info'));
                        ?>
                    </div>
                    <hr/>
                </div>
                <div class="pull-left span9">
                    <div class="leftmargin1 bottommargin1">
                        <hr>
                        <h4 class="fontcolor1">Biography</h4>
                        <p style="text-align: justify;">
                           <?php
                                $information = explode("\n", $sponsee['long_description']);

                                foreach ($information as $line):
                                    echo '<p> ' . $line . "</p>\n";
                                endforeach;
                           ?>
                        </p>
                        <h4 class="fontcolor1 topmargin2">Needs</h4>
                        <?php
                            $user = $this->Session->read('Auth.User');

                            if(empty($sponseeneeds)){
                                
                                $controller = $this->name;

                                if ($user && $user['role'] == 'admin'){
                                    echo "<div class='alert alert-info'>
                                        <h4>Not yet specified.</h4> 
                                        <p class='topmargin1'>To add, just click the add button below.</p>";
                                    echo "<a href='#myModal' role='button' class='btn btn-info add'><i class='icon-plus'></i> Add Record</a>";
                                    echo "</div>";
                                }
                                else {
                                    echo "<div class='alert alert-info'><h4>Not yet specified.</h4></div>";
                                }
                         }
                            else {
                                $ctr = 1;
                                $prevCat = 0;
                                echo "<table class='table table-hover table-bordered'>";
                                    foreach ($sponseeneeds as $item) :
                                        $need = $item['SponseeNeed'];
                                        $category = $item['Category'];
                                        
                                        if ($prevCat != $category['id']) : ?>
                                            <tr>
                                                <th bgcolor="#eef6fa" colspan="7">
                                                    <?php echo $category['description'] ?>
                                                </th>
                                            </tr
                                            <tr>
                                                <td bgcolor="#f9f9f9">No.</td>
                                                <td bgcolor="#f9f9f9">Description</td>
                                                <td bgcolor="#f9f9f9">Needed Amount</td>
                                                <td bgcolor="#f9f9f9">Donated Amount</td>
                                                <?php if ($user && $user['role'] == 'admin'){
                                                   echo "
                                                     <td bgcolor='#f9f9f9'>Added By</td>
                                                     <td bgcolor='#f9f9f9'>Date Added</td>
                                                     <td bgcolor='#f9f9f9'>Date Modified</td>
                                                   ";
                                                }?>
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
                                            <?php if ($user && $user['role'] == 'admin'){
                                                echo "<td bgcolor='#fff'>".$need['added_by']."</td>";
                                                echo "<td bgcolor='#fff'>".$need['created']."</td>";
                                                echo "<td bgcolor='#fff'>".$need['modified']."</td>";
                                             }?>
                                        </tr>
                                        <?php
                                    $ctr++;
                                    endforeach;
                               echo "</table>";
                            }?>
                    </div>
                </div>
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
</script>