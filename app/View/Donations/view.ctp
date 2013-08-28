<div style="margin-right:145px;" class="container tabs logincontent well span9 pull-right">
    <div>
        <?php
        $sponsee = $sponsee['SponseeListingItem'];
        ?>
        <div class="pull-left rightmargin1 topmargin5 box span3">
            <div class="banner">
                <p>
                    <h2 class="fontcolor1">
                        <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                    </h2>
                </p>
            </div>
            <?php
                    $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                    $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                    echo $this->Html->image($imageURl, $attrs);
            ?>
            <div class="topmargin1">
                <hr>
                <?php 
                    echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                    echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                    echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                    echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
                ?>
                <hr>
            </div>
        </div>
        <div class="pull-left">
            <div class="pull-left span5 topmargin2">
                <h3 class="fontcolor1 topmargin1">Biography</h3>
                <p>
                    <hr>
                    <?php
                    echo $sponsee['information'];
                    ?>
                </p>
                <h3 class="fontcolor1">Needs</h3>
                <div class="overlayable">
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
                        echo "<table class='table table-hover table-bordered'>";
                        echo "
                            <tr>
                                <th></th>
                                <th>Need Amount</th>
                                <th>Need</th>
                            </tr>
                        ";
                        $prevCat = 0;
                        foreach ($sponseeneeds as $item) :
                            $need = $item['SponseeNeed'];
                            $category = $item['Category'];
                            $status = $need['status'];
                            
                            if ($prevCat != $category['id']) : ?>
                                <tr>
                                    <th colspan="4">
                                        <?php echo $category['description'] ?>
                                    </th>
                                </tr>
                            <?php 
                            $prevCat = $category['id'];
                            endif; 
                            ?>
                            <tr>
                                <?php if($status != 'CLOSED') : ?>
                                <td style="width:30px;">
                                    <input type="checkbox" name="sponseeneeds"
                                           value="<?php echo $need['neededamount'] ?>"
                                           data-desc="<?php echo $need['description'] ?>"
                                           data-id="<?php echo $need['id'] ?>"/>
                                </td>
                                <?php else: ?>
                                <td style="width:30px;">
                                    <?php echo $this->Html->image('check.png'); ?>
                                </td>
                                <?php endif; ?>
                                <td style="width: 50px; text-align: right; font-weight: bold;">
                                    <?php echo $this->Number->currency($need['neededamount']) ?>
                                </td>
                                <td>
                                    <?php echo $need['description'] ?>
                                </td>  
                            </tr>
                        <?php
                        endforeach;
                        
                        echo "</table>"; 
                    }
                    echo '<div id="error"></div>';
                    echo '<div id="paypal-btn">';
                    echo '<div style="padding:0 0 0 15px; margin:0;">';
                        echo $this->Html->image('cards.gif');
                    echo '</div>';
                        echo $this->paypal->button('Donate through paypal', array('type' => 'donate', 'item_name' => '', 'amount' => ''));
                    echo '</div>';
                    ?>
                    
                    <div class="modal-backdrop overlay hide"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="alert-tpl" class="alert alert-error hide">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <span class="text"></span>
</div>

<script>
    $(function(){
        var forceSubmit = false;
        
        $('input[name=sponseeneeds]').click(function(){
            updateDonationInputs();
        });
        
        $('#paypal-btn form').submit(function(){
            if (forceSubmit) return true;
            
            if (this.amount.value === '0') {
                showAlert('Please select the amount to donate.');
            }
            else {
                saveDonationRequest();
            }
            
            return false;
        });
        
        // initialize values
        updateDonationInputs();
    
        function saveDonationRequest() {
            $('.overlayable .overlay').show();

            var form = $('#paypal-btn form')[0];
            var formData = {
                'data[DonationRequest][details]' : form.item_number.value,
                'data[DonationRequest][sponsee_id]' : <?php echo $sponsee['id'] ?>,
                'data[DonationRequest][type]' : 'sponsee'
            };

            var url = '<?php echo $this->Html->url(array('action' => 'saveRequest')) ?>';
            
            $.post(url, formData)
            .done(function(args) {
                args = eval('(' +args+ ')');
                forceSubmit = true;
                form.item_number.value = formatNumber('00000000', args.id);
                $('#paypal-btn form').submit();
            })
            .fail(function() {
                alert('Failed to process request. Try again.');
                $('.overlayable .overlay').hide();
            });
        }

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
            form.item_name.value = 'Donation: ' + desc.join('/');
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
    });
</script>