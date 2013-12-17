<?php
// ----- LOAD OBJECTS ------
$user = $this->Session->read('Auth.User');
$sponsee = $donation['Sponsee'];
$sponseeImage = $sponsee['Image'];
$sponseeneeds = $donation['Items'];
?>

<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donor Profile', array('controller' => 'Profile', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 0 0; background: #fff; margin-top:103px;">
        <div style="padding:0 10px 0 0;" class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1 banner topmargin1">CONFIRM DONATIONS</p>
            </div>
        </div>
        <div class="clearfix pull-left">
            <div class="pull-left topmargin1 span3">
                <?php
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
                        $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                ?>
            </div>
            <div class="pull-left">
                <div class="pull-left span5">
                    <h3 class="fontcolor1"><?php echo strtoupper($sponsee['firstname'] . ' ' . $sponsee['lastname']) ?></h3>
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
                            $prevCat = 0;
                            $ctr = 1;
                            $total = 0;
                            $formattotal = 0;
                            
                            foreach ($sponseeneeds as $item) :
                                $need = $item['SponseeNeed'];
                                $category = $need['Category'];
                                $status = $need['status'];
                                $total = $total + $need['neededamount'];

                                if ($prevCat != $category['id']) : ?>
                                    <tr>
                                        <th colspan="2">
                                            <?php echo $category['description'] ?>
                                        </th>
                                    </tr>
                                <?php
                                $prevCat = $category['id'];
                                endif;
                                ?>
                                <tr>
                                    <td>
                                        <span class="pull-left rightmargin1"><?php echo $ctr.'.'; ?></span>
                                        <span class="pull-left"><?php echo $need['description'] ?></span>
                                        <span class="pull-right"><?php echo $this->Number->currency($need['neededamount']); ?></span>
                                    </td>
                                    <td>
                                        <span class="pull-left"><?php echo 'How long?<br>'.$item['no_of_months']; if($item['no_of_months'] > 1){echo ' months';} else {echo ' month';} ?></span>
                                    </td>
                                </tr>
                            <?php
                            $ctr++;
                            endforeach;
                            $formattotal = $this->Number->currency($total);

                            echo "
                                <tr>
                                    <td style='text-align:right'; colspan='4'><span class='rightmargin1'><strong>TOTAL DONATION:</strong></span><strong>$formattotal<strong></td>
                                </tr>
                            </table>";
                        }
                        echo '<div id="error"></div>';
                        ?>

                        <div class="modal-backdrop overlay hide"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix pull-left leftmargin2 topmargin1 footerstyle">
                <?php
                    echo '<div id="btn btn-info btn-large paypal-btn" data-type="monthly">';
                    echo $this->paypal->button('Donate through paypal', array('type' => 'subscribe', 'item_name' => '', 'amount' => $formattotal, 'term' => 'month', 'period' => '2'), array('class' => 'pull-right topmargin1 rightmargin1'));
                    echo '</div>';
                ?>
                <?php echo $this->Html->link('Cancel',
                    array('controller'=>'Donations', 'action'=>'cancel', $sponsee['id']),
                    array('class' => 'pull-right btn btn-info topmargin1 rightmargin1 btn-large'),
                    'Sorry to see you go. Are you sure you want to cancel this donation?');
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        var forceSubmit = false;

        $('#paypal-btn form').submit(function(){
            if (forceSubmit) return true;

            saveDonationRequest();

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
                console.log(elm);
                total += parseFloat(elm.value);
                desc.push($(elm).data('desc'));
                items.push($(elm).data('id')+'='+elm.value);
            });

            var form = $('#paypal-btn form')[0];
            form.item_name.value = 'Donation: ' + desc.join('/');
            form.item_number.value = items.join(',');
        }
    });
</script>