<?php
$user = $this->Session->read('Auth.User');
?>

<style>
    .container form {
        padding: 0;
        margin: 0;
        width: 100%;
    }

    .container form div {
        padding-left: 0;
    }

    a {color:#333333;}
    a:hover {color:#4385ce; text-decoration:none;}
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
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 0 0; background: #fff; margin-top:103px;">
        <div class="clearfix pull-left headerstyle">
            <?php
            $sponsee = $sponsee['SponseeListingItem'];
            ?>
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1 banner">DONATE FOR <?php echo strtoupper($sponsee['firstname'] . ' ' . $sponsee['lastname']) ?></p>
            </div>
        </div>
        <div style="width:870px;" class="clearfix pull-left">
            <div class="pull-left box topmargin1 span3">
                <div style="margin-right:10px;" class="leftmargin1">
                    <?php
                            $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
                            $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                            echo $this->Html->image($imageURl, $attrs);
                    ?>
                    <div class="topmargin1">
                        <hr>
                        <?php
                            echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                            echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                        ?>
                        <hr>
                    </div>
                 </div>
            </div>
            <div class="pull-left">
                <div class="pull-left span5">
                    <h3 class="fontcolor1">BIOGRAPHY</h3>
                    <p style="text-align: justify;">
                        <?php
                             $information = explode("\n", $sponsee['long_description']);

                             foreach ($information as $line):
                                 echo '<p style="text-align: justify;"> ' . $line . "</p>\n";
                             endforeach;
                        ?>
                     </p>
                     <h3 class="fontcolor1">SPONSEE NEEDS</h3>
                     <p class="bottommargin3">
                        By selecting the recurring or monthly support payments,
                        at abounding in love you may pause or cancel your support at any time for any reason.
                     </p>
                     <?php
                        if(empty($sponseeneeds)){
                            echo "<table class='table table-hover table-bordered'>
                               <tr>
                                    <td>
                                       No record found.
                                    </td>
                               </tr>
                            </table>";
                        }
                        else{
                            echo "<tr><td>";
                               echo $this->Session->flash();
                            echo "</td></tr>";
                            $itemIndex = 0;
                            foreach ($sponseeneeds as $itemLabel=>$itemArray) :

                                $ctr = 1;
                                $prevCat = 0;

                                echo "<h4 class='fontcolor1'>$itemLabel</h4>";
                                echo "<table class='table table-hover table-bordered'>";
                                echo "<tr>
                                    <th bgcolor='#f9f9f9'>Needed Amount</th>
                                    <th bgcolor='#f9f9f9'>Description</th>
                                    <th bgcolor='#f9f9f9'>Date of Donation</th>
                                    <th bgcolor='#f9f9f9'>Donor</th>
                                </tr>";

                                foreach ($itemArray as $item) :

                                    $need = $item['SponseeNeed'];
                                    $status = $item['SponseeNeed']['status'];
                                    $category = $item['Category'];
                                    $addedBy = $item['AddedBy'];
                                    $donation = $item['Donation'];

                                    if ($prevCat != $category['id']) : ?>
                                        <tr>
                                            <th bgcolor="#eef6fa" colspan="9">
                                                <?php echo '<span class="category leftmargin1">'.$category['description'].'</span>'; ?>
                                            </th>
                                        </tr
                                    <?php
                                    $prevCat = $category['id'];
                                    endif;
                                    ?>
                                    <tr>
                                        <td bgcolor="#fff" style="text-align: right;">
                                            <?php if($status == 'CLOSED') : ?>
                                                    <?php echo $this->Html->image('check.png'); ?>
                                            <?php endif; ?>
                                            <?php echo '<span class="neededamount">'.$this->Number->currency($need['neededamount']).'</span>'; ?>
                                        </td>
                                        <td bgcolor="#fff"><?php echo '<span class="description">'.$need['description'].'</span>'; ?></td>
                                        <?php if($status != 'CLOSED') : ?>
                                            <td style="padding-left:30px;" colspan="3">
                                                <div>
                                                    <input type="hidden" name="sponseeneed_id" value="<?php echo $need['id']; ?>">
                                                    <input type="hidden" name="sponseeneed_amount" value="<?php echo $need['neededamount']; ?>">
                                                    <?php if($need['donation_method'] === 'onetime') : ?>
                                                        <div class='pull-left paypal-btn' data-type="monthly">
                                                            <?php echo $this->paypal->button('Donate through paypal', array(
                                                                'type' => 'subscribe',
                                                                'item_name' => $need['description'],
                                                                'amount' => $need['neededamount'],
                                                                'term' => 'month', 'period' => '1'
                                                                ), array('class' => 'pull-right btn btn-info')); ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <div>For how long?</div>
                                                        <div class='pull-left'>
                                                            <input type="number" name="no_of_months" class="span1"/>
                                                        </div>
                                                        <div class='pull-left topmargin4 leftmargin1'>Months</div>
                                                        <div class='pull-left paypal-btn' data-type="monthly">
                                                            <?php echo $this->paypal->button('Donate through paypal', array(
                                                                'type' => 'subscribe',
                                                                'item_name' => $need['description'],
                                                                'amount' => $need['neededamount'],
                                                                'term' => 'month', 'period' => ''
                                                                ), array('class' => 'pull-right btn btn-info')); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <?php else: ?>
                                            <td>
                                                <?php echo $this->Time->format($donation['payment_date']); ?>
                                            </td>
                                            <td>
                                                <a data-toggle="modal" href="<?php echo $this->Html->url( array('action' => 'donor', $donation['user_id'])); ?>" data-target="#modal"><?php echo $donation['first_name'].' '.$donation['last_name']; ?></a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php
                                    
                                    $ctr++;
                                    $itemIndex++;

                                endforeach;

                                echo '</table>';

                            endforeach;
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">DONOR INFORMATION</h3>
    </div>
    <div class="modal-body">

    </div>
</div>


<!-- Loading Modal -->
<div id="loading-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body" style="text-align: center">
        <h4>Processing donation. Please wait.</h4>
    </div>
</div>


<script>
    $(function(){
        var $spinner = $('#loading-modal');

        $('.paypal-btn form').submit(function(){
            var $form = $(this);
            if ($form.data('forceSubmit')) {
                $form.data('forceSubmit', null);
                return true;
            }

            saveDonationRequest(this);

            return false;
        });

        function saveDonationRequest(form) {
            var $tr = $(form).closest('tr');
            var needId = $tr.find('input[name=sponseeneed_id]').val();
            var needAmt = $tr.find('input[name=sponseeneed_amount]').val();
            var noOfMonths = 1;

            if($tr.find('input[name=no_of_months]').length > 0){
                noOfMonths = $tr.find('input[name=no_of_months]').val();
                form.p3.value = noOfMonths;
            }

            if(!noOfMonths){
                alert("Number of months required.");
                $tr.find('input[name=no_of_months]').focus();
                return;
            }

            var formData = {
                'data[DonationRequest][details]' : needId + '=' + needAmt,
                'data[DonationRequest][sponsee_id]' : <?php echo $sponsee['id'] ?>,
                'data[DonationRequest][type]' : 'sponsee',
                'data[DonationRequest][no_of_months]' : noOfMonths
            };

            var url = '<?php echo $this->Html->url(array('action' => 'saveRequest')) ?>';

            $spinner.modal({keyboard: false});

            $.post(url, formData)
            .done(function(args) {
                args = eval('(' +args+ ')');
                $(form).data('forceSubmit', true);
                form.item_number.value = formatNumber('00000000', args.id);
                $(form).submit();
            })
            .fail(function() {
                alert('Failed to process request. Try again.');
                $spinner.modal('hide');
            });
        }

    });
</script>