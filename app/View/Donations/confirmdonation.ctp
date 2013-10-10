<?php
// ----- LOAD OBJECTS ------
$user = $this->Session->read('Auth.User');
$sponseeDonation = $donation['SponseeDonation'];
$sponsee = $donation['Sponsee'];
$sponseeImage = $sponsee['Image'];
$sponseeneeds = $donation['Items'];
?>
<style>
    form .submit input[type=submit] {
        background: #57bcda;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#50b6d4), to(#339ab8));
        background-image: -webkit-linear-gradient(top, #50b6d4, #339ab8);
        background-image: -moz-linear-gradient(top, #50b6d4, #339ab8);
        border-color: #37849a;
        color: #fff;
        padding: 13px 15px 9px 15px;
        font-size: 17px;
    }
</style>

<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donor Profile', array('controller' => 'Profile', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'PendingDonations' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Pending Donations', array('controller' => 'PendingDonations', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 0 0; background: #fff; margin-top:103px;">
        <div style="padding:0 0 0 10px;" class="clearfix pull-right headerstyle">
            <div class="pull-left leftmargin1 bottommargin2">
                <p class="fontsize1 banner topmargin1">DONATIONS</p>
            </div>
            <div class="pull-right">
                <div style="position:relative; top:0px; right:0;">
                    <div id="confirmdonation"></div>
                </div>
            </div>
        </div>
        <div class="clearfix pull-left">
            <div class="pull-left topmargin1 span3">
                <?php
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
                        $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                ?>
                <center><h3 class="fontcolor1"><?php echo strtoupper($sponsee['firstname'] . ' ' . $sponsee['lastname']) ?></h3></center>
            </div>
            <div class="pull-left">
                <div class="pull-left span5 topmargin1">
                    <div>
                        <?php
                            if($sponseeDonation['donation_method'] == 'monthly'){
                                echo "<div class='pull-left'><p class='fontcolor1'><b>Donation Method: </b></p></div>";
                                echo "<div class='pull-left leftmargin5'>Monthly Donation</div>";

                                echo "<div class='pull-left leftmargin1'><p class='fontcolor1'><b>From: </b></p></div>";
                                echo "<div class='pull-left leftmargin5'>".$this->Time->format($sponseeDonation['from']).'</div>';

                                echo "<div class='pull-left leftmargin1'><p class='fontcolor1'><b>To: </b></p></div>";
                                echo "<div class='pull-left leftmargin5'>".$this->Time->format($sponseeDonation['to']).'</div>';
                            }
                            else{
                                echo "<div class='pull-left'><p class='fontcolor1'><b>Donation Method: </b></p></div>";
                                echo "<div class='pull-left leftmargin5'>One Time Donation</div>";
                            }
                        ?>
                    </div>
                    <div class="clearfix">
                        <div class="pull-left topmargin1"><p class="fontcolor1"><b>Categories</b></p></div>
                        <div class="pull-right topmargin1"><p class="fontcolor1"><b>Donated Amount</b></p></div>
                    </div>
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

                            foreach ($sponseeneeds as $item) :
                                $need = $item['SponseeNeed'];
                                $category = $need['Category'];
                                $status = $need['status'];
                                $total = $total + $need['neededamount'];

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
                                    <td>
                                        <span class="pull-left rightmargin1"><?php echo $ctr.'.'; ?></span>
                                        <span class="pull-left"><?php echo $need['description'] ?></span>
                                        <span class="pull-right"><?php echo $this->Number->currency($need['neededamount']) ?></span>
                                        <input type="hidden"
                                               name="sponseeneeds"
                                               value="<?php echo $need['neededamount']?>"
                                               data-id="<?php echo $need['id']?>"
                                               data-desc="<?php echo $need['description']?>"/>

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
                    if($sponseeDonation['donation_method'] == 'monthly'){
                        echo '<div class="pull-right topmargin8" id="paypal-btn">';
                        echo $this->paypal->button('Recurring Donation through paypal', array('type' => 'donate', 'item_name' => '', 'amount' => ''), array('class' => 'pull-right btn btn-info topmargin1 rightmargin1 btn-large'));
                        echo '</div>';
                    }
                    else{
                        echo '<div class="pull-right topmargin8" id="paypal-btn">';
                        echo $this->paypal->button('Donate through paypal', array('type' => 'donate', 'item_name' => '', 'amount' => ''), array('class' => 'pull-right btn btn-info topmargin1 rightmargin1 btn-large'));
                        echo '</div>';
                    }
                ?>
                <?php echo $this->Html->link('Pause this donation', 
                        array('controller' => 'donations',
                            'action' => 'view', $sponsee['id']),
                        array('class' => 'pull-right btn btn-info topmargin1 rightmargin1 btn-large'),
                        'This process are saved on your pending donations record. This is valid only within 6 months prior from the date of your donation process. If in case you want to proceed this donation in the future, please check your pending donation history in your account.');
                ?>
                <?php echo $this->Form->button('Cancel',
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
            form.amount.value = total;
            form.item_name.value = 'Donation: ' + desc.join('/');
            form.item_number.value = items.join(',');
        }
    });
</script>