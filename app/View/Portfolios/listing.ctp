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
                            <td bgcolor="#fff">
                            <?php
                            foreach ($item['Images'] as $image) :
                                $imageURl = array('controller' => 'PortfolioImages', 'action' => 'view', $image['id']);
                                $attrs = array('alt' => '', 'width' => '100', 'class' => 'img-polaroid');
                                echo $this->Html->image($imageURl, $attrs);
                            endforeach;
                    endforeach;
                }
            ?>
                            </td>
                        </tr>
        </table>
    </div>
</div>