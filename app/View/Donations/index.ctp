<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <?php
        foreach ($sponseeList as $item) :
            $sponsee = $item['SponseeListingItem'];
        ?>
        <div class="pull-left rightmargin1 span3">
        <?php
                $imageURl;
                if ($sponsee['primaryimage']) {
                    $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['primaryimage']);
                } else {
                    $imageURl = 'sponsees/nophoto.jpg';
                }
                $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
        ?>
        <div class="topmargin1">
            <hr>
            <?php 
                echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
            ?>
            <hr>
        </div>
        </div>
        <div class="pull-left">
            <div class="pull-left span7">
                <p>
                    <h2 class="fontcolor1">
                        <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                    </h2>
                </p>
                <p class="topmargin1">
                    <hr>
                    <?php
                    echo $sponsee['information'];
                    ?>
                </p>
                <h3 class="fontcolor1">Needs</h3>
                <p>
                    <?php
                    if(empty($sponseeneeds)){                                
                        $user = $this->Session->read('Auth.User');
                        $controller = $this->name;

                        if ($user && $user['role'] == 'admin'){
                            echo "<div class='alert alert-info'>
                                <h4>Not yet specified.</h4> 
                                <p class='topmargin1'>To add, just click the add button below.</p>";
                                echo $this->Html->link('Add Sponsee Needs', array('controller' => 'sponseeneeds', 'action' => 'add', $sponsee['id']), array('class' => 'btn btn-info btn-big'));
                            echo "</div>";
                        }
                        else {
                            echo "<div class='alert alert-info'><h4>Not yet specified.</h4></div>";
                        }
                    }
                    else {
                        echo "<table class='table table-hover'>";

                        $prevCat = 0;
                        foreach ($sponseeneeds as $item) :
                            $need = $item['SponseeNeed'];
                            $category = $item['Category'];
                            $amount = $need['neededamount'] - $need['donatedamount'];
                            
                            if ($prevCat != $category['id']) : ?>
                                <tr>
                                    <th colspan="3">
                                        <?php echo $category['description'] ?>
                                    </th>
                                </tr>
                            <?php 
                            $prevCat = $category['id'];
                            endif; 
                            ?>
                            <tr>
                                <td style="width:30px;">
                                    <input type="checkbox" name="sponseeneeds"
                                           value="<?php echo $amount ?>"
                                           data-desc="<?php echo $need['description'] ?>"
                                           data-id="<?php echo $need['id'] ?>"/>
                                </td>
                                <td style="width: 50px; text-align: right; font-weight: bold;">
                                    <?php echo $this->Number->currency($amount) ?>
                                </td>
                                <td>
                                    <?php echo $need['description'] ?>
                                </td>                                
                            </tr>
                        <?php
                        endforeach;
                        
                        echo "</table>"; 
                    }
//                    echo '<div id="error"></div>';
//                    echo '<div id="paypal-btn">';
//                    echo '<div style="padding:0 0 0 15px; margin:0;">';
//                        echo $this->Html->image('cards.gif');
//                    echo '</div>';
//                        echo $this->paypal->button('Donate through paypal', array('type' => 'donate', 'item_name' => '', 'amount' => ''));
//                    echo '</div>';
                    ?>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="Q3QL4BCLGN6SW">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </p>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>

<div id="alert-tpl" class="alert alert-error hide">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <span class="text"></span>
</div>

<script>
    $(function(){
        $('input[name=sponseeneeds]').click(function(){
            updateDonationInputs();
        });
        
        $('#paypal-btn form').on('submit', function(){          
            if (this.amount.value == '0') {
                showAlert('Please select the amount to donate.');
                return false;
            }
        });
        
        // initialize values
        updateDonationInputs();
    });
    
    function updateDonationInputs()
    {
        var total = 0.00;
        var desc = [];
        var items = [];
        $('input[name=sponseeneeds]').each(function(idx,elm) {
            if (elm.checked) {
                console.log(elm);
                total += parseFloat(elm.value);
                desc.push($(elm).data('desc'));
                items.push($(elm).data('id')+'='+elm.value);
            }
        });
        
        var form = $('#paypal-btn form')[0];
        form.amount.value = total;
        form.item_name.value = desc.join('/');
        form.item_number.value = items.join(',');
    }
    
    function showAlert(msg) {
        $('#error').html('');
        $('#alert-tpl')
                .clone()
                .appendTo('#error')
                .fadeIn()
                .find('.text').html(msg);
    }
</script>