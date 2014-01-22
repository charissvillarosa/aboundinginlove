<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container tabs">
    <div class="headerstyle banner">
        <div class="leftmargin1"><p class="fontsize1">Donate Any Amount to the Sponsored Children of Abounding In Love</p></div>
    </div>
    <div class="span11">
        <div style="width:600px; margin:40px auto; overflow:auto;" class="box overlayable">
            <label class="fontsize1">Donation:</label>
            <input type="number" id="sponsee-donation" class="text-right" value="0"/>
            <p>
                Suggested donation to Abounding in love operation expenses:
                <b>$<span id="org-donation">0.00</span></b>
                <a href="#" id="edit-org-donation" class="btn btn-info"><i class="icon-edit"></i> Edit</a>
            </p>
            <p>Why this organization need your help?</p>
            <hr>
            <div>
                <div class="pull-left"><p class="fontsize1">TOTAL: $<span id="total">0.00</span></p></div>
                <div id="paypal-btn">
                    <div class="pull-right">
                        <?php echo $this->paypal->button('Donate through paypal', array('type' => 'donate', 'item_name' => '', 'amount' => '')) ?>
                    </div>
                </div>
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
                'data[DonationRequest][total]' : getSponseeDonation() + getOrgDonation(),
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