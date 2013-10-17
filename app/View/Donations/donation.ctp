<?php
$user = $this->Session->read('Auth.User');
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
            <li class="<?php echo $this->name == 'Donations' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Pending Donations', array('controller' => 'Donations', 'action' => 'pendingdonation')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 30px 0; background: #fff; margin-top:103px;">
        <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1">Donate Any Amount to the Sponsored Children of Abounding In Love</p>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2 width2 overlayable">
            <label>Donation:</label>
            <input type="number" id="sponsee-donation" class="text-right" value="0"/>
            <p>
                Suggested donation to Abounding in love operation expenses: 
                <b>$<span id="org-donation">0.00</span></b>  
                <a href="#" id="edit-org-donation">Edit</a>
            </p>
            <p>Why this organization need your help?</p>
            <hr>
            <p><b>TOTAL: $<span id="total">0.00</span></b></p>
            <div id="paypal-btn">
<!--                <div style="padding:0 0 0 15px; margin:0;">
                    <?php echo $this->Html->image('cards.gif') ?>
                </div>-->
                <?php echo $this->paypal->button('Donate through paypal', array('type' => 'donate', 'item_name' => '', 'amount' => '')) ?>
            </div>
            
            <div class="modal-backdrop overlay hide"></div>
        </div>
    </div>
</div>

<script>
    $(function(){
        var forceSubmit = false;
        
        $('#sponsee-donation').keyup(sponseeDonationChanged);
        $('#sponsee-donation').click(sponseeDonationChanged);
        $('#sponsee-donation').blur(sponseeDonationBlurred);
        
        $('#edit-org-donation').click(function(e){
            e.preventDefault();
            
            var amt = prompt('Enter an amount:');
            if (!isNaN(amt) && parseFloat(amt) > 0) {
                $('#org-donation').html(parseFloat(amt).toFixed(2));
                updateTotal();
            }
            else {
                alert('Please enter a valid amount.');
            }
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
            
        function saveDonationRequest() {
            var form = $('#paypal-btn form')[0];
            
            var details = [];
            var description = [];
            var sponseeDonation = getSponseeDonation();
            var orgDonation = getOrgDonation();
            
            if (sponseeDonation > 0) {
                details.push('sponsee=' + sponseeDonation);
                description.push('Sponsees');
            }
            if (orgDonation > 0) {
                details.push('org=' + orgDonation);
                description.push('Abounding In Love');
            }
            
            if (details.length === 0) {
                alert('Please specify the amount to donate.');
                return;
            }
            
            var formData = {
                'data[DonationRequest][details]' : details.join(','),
                'data[DonationRequest][type]' : 'organization'
            };
            
            $('.overlayable .overlay').show();

            var url = '<?php echo $this->Html->url(array('action' => 'saveRequest')) ?>';
            
            $.post(url, formData)
            .done(function(args) {
                args = eval('(' +args+ ')');
                forceSubmit = true;
                form.amount.value = getSponseeDonation() + getOrgDonation();
                form.item_number.value = formatNumber('00000000', args.id);
                form.item_name.value = 'Donation: ' + description.join('/');
                $('#paypal-btn form').submit();
            })
            .fail(function() {
                alert('Failed to process request. Try again.');
                $('.overlayable .overlay').hide();
            });
        }
        
        function sponseeDonationChanged() {
            var input = $('#sponsee-donation')[0];
            if (input.value.trim() && !isNaN(input.value)) {
                updateTotal();
            }
        }
        
        function sponseeDonationBlurred() {
            var input = $('#sponsee-donation')[0];
            if (!input.value.trim() || isNaN(input.value) || parseFloat(input.value) < 0) {
                input.value = '0.00';
                updateTotal();
            }
        }

        function updateTotal() {
            var total = getSponseeDonation() + getOrgDonation();
            $('#total').html(total.toFixed(2));
        }
        
        function getSponseeDonation() {
            var value = $('#sponsee-donation').val();
            return isNaN(value) ? 0 : parseFloat(value);
        }
        
        function getOrgDonation() {
            var value = $('#org-donation').html();
            return isNaN(value) ? 0 : parseFloat(value);
        }
    });
</script>