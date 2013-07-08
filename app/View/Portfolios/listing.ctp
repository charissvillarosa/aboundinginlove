<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2">
            <?php echo $this->Html->link('Add New Portfolio', array('controller' => 'Portfolio', 'action' => 'add'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div class="leftmargin1">
            <?php echo $this->Session->flash(); ?>
        </div>
        <table class="leftmargin1 table">
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
                        $image= $item['Image'];
                        
                        if ($prevCat != $category['id']) : ?>
                            <tr>
                                <th bgcolor="#eef6fa" colspan="9">
                                    <?php echo $category['description'] ?>
                                </th>
                            </tr
                            <tr>
                                <td bgcolor="#eef6fa" colspan="9">
                                    <?php echo $portfolio['description'] ?>
                                </td>
                            </tr
                        <?php 
                        $prevCat = $category['id'];
                        endif; 
                        ?>
                        <tr>
                            <td bgcolor="#fff"><?php echo $image['image'] ?></td>
                        </tr>
                        <?php
                    endforeach;
                }
            ?>
        </table>
    </div>
</div>