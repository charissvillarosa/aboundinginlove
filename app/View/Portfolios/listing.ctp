<div class="container tabs">
    <div class="span11 margin3">
        <div class="pull-right bottomargin2">
            <?php
                echo $this->Html->link(
                        'Add New Portfolio',
                        array('controller' => 'Portfolios', 'action' => 'add', $sponsee_id),
                        array('class' => 'btn btn-info btn-small'));
            ?>
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