<div class="container tabs">
    <div>
        <div class="clearfix pull-left headerstyle">
            <?php
            $sponsee = $sponsee['SponseeListingItem'];
            ?>
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1 banner">DONATE FOR <?php echo strtoupper($sponsee['firstname'] . ' ' . $sponsee['lastname']) ?></p>
            </div>
        </div>
        <div class="clearfix pull-left span12">
            <div style="margin-left:0;" class="pull-left box topmargin1 span3 bottommargin1">
                <div style="padding-right:8px;">
                    <?php
                            $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
                            $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                            echo $this->Html->image($imageURl, $attrs);
                    ?>
                    <div style="width:270px; margin:auto;" class="topmargin1">
                        <?php
                            echo "<div><center><p class='fontcolor2 fontsize1 topmargin1'>".$this->Number->toPercentage($sponsee['percentage'])." Raised </p></center></div>";
                            echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                        ?>
                    </div>
                 </div>
            </div>
            <div class="pull-left topmargin1">
                <div class="pull-left span8">
                    <h3 class="fontcolor1">BIOGRAPHY</h3>
                    <hr style="border:dashed 1px #ccc;">
                    <p style="text-align: justify;">
                        <?php
                             $information = explode("\n", $sponsee['long_description']);

                             foreach ($information as $line):
                                 echo '<p style="text-align: justify;"> ' . $line . "</p>\n";
                             endforeach;
                        ?>
                     </p>
                     <h3 class="fontcolor1 topmargin2">SPONSEE NEEDS</h3>
                     <hr style="border:dashed 1px #ccc;">
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
                                            <th bgcolor="#eef6fa" colspan="4">
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

                                                <!-- for the sponsee info -->
                                                <input type="hidden" name="sponseeneed_id" value="<?php echo $need['id'] ?>"/>
                                                <input type="hidden" name="sponseeneed_amount" value="<?php echo $need['neededamount'] ?>"/>
                                        </td>
                                        <?php if($need['donation_method'] === 'onetime') : ?>
                                            <?php if($status === 'CLOSED') : ?>
                                                <td><?php echo '<div class="pull-left"><span class="description">'.$need['description'].'</span></div>'; ?></td>
                                                <td><?php echo $this->Time->format($donation['payment_date']); ?></td>
                                                <td>
                                                    <?php
                                                    if($donation['first_name'] === '' and $donation['last_name'] === ''){ echo 'Anonymous'; }
                                                    else{
                                                        echo "<a data-toggle=\"modal\" href=\"".$this->Html->url( array('action' => 'donor', $donation['user_id']))."\" data-target=\"#modal\">";
                                                            echo $donation['first_name'].' '.$donation['last_name'];
                                                        echo "</a>";
                                                    }
                                                    ?>
                                                    
                                                </td>
                                            <?php else: ?>
                                                <td colspan="3">
                                                    <?php echo '<div class="pull-left"><span class="description">'.$need['description'].'</span></div>'; ?>
                                                    <div style="margin:0;" class='pull-right paypal-btn  btn-small' data-type="monthly">
                                                    <?php echo $this->paypal->button('Donate through Paypal', array(
                                                        'type' => 'subscribe',
                                                        'item_name' => $need['description'],
                                                        'amount' => $need['neededamount'],
                                                        'term' => 'month', 'period' => '1'
                                                        ), array('class' => 'pull-right btn btn-info')); ?>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($status === 'CLOSED') : ?>
                                                <td>
                                                    <?php echo '<div class="pull-left"><span class="description">'.$need['description'].'</span></div>'; ?>
                                                </td>
												<td><?php echo $this->Time->format($donation['payment_date']); ?></td>
                                                <td>
                                                    <?php
                                                    if($donation['first_name'] === '' and $donation['last_name'] === ''){ echo 'Anonymous'; }
                                                    else{
                                                        echo "<a data-toggle=\"modal\" href=\"".$this->Html->url( array('action' => 'donor', $donation['user_id']))."\" data-target=\"#modal\">";
                                                            echo $donation['first_name'].' '.$donation['last_name'];
                                                        echo "</a>";
                                                    }
                                                    ?>
                                                    
                                                </td>
                                            <?php else: ?>
                                                <td colspan="3">
                                                    <?php echo '<div class="pull-left"><span class="description">'.$need['description'].'</span></div>'; ?>
                                                    <div class='pull-right paypal-btn btn-small' data-type="monthly">
                                                        <?php echo $this->paypal->button('Donate through Paypal', array(
                                                            'type' => 'subscribe',
                                                            'item_name' => $need['description'],
                                                            'amount' => $need['neededamount'],
                                                            'term' => 'day', 'period' => ''
                                                            ), array('class' => 'pull-right btn btn-info'));
                                                        ?>
                                                    </div>
                                                    <div class='pull-right'>
                                                        <span>For how long?</span>
                                                        <input type="number" name="no_of_months" class="span1"/>
                                                        <span>Months</span>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
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
    <div class="modal-body" style="margin:20px; text-align: center; border:dashed 1px #eaeaea;">
        <span><?php echo $this->Html->image('ajax-loader.gif');?></span><h4 class="fontcolor1">Processing donation. Please wait.</h4>
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

            if(noOfMonths <= 0) {
                alert("Invalid number of months.");
                $tr.find('input[name=no_of_months]').focus();
                return;
            }

            var formData = {
                'data[DonationRequest][details]' : needId + '=' + needAmt,
                'data[DonationRequest][sponsee_need_id]' : needId,
                'data[DonationRequest][total]' : needAmt,
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