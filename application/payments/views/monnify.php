<?php
$paymentsetting_mn = $data['setting_data'];
$user = $data['user'];
$order_info = $data['order_info'];

$totalAmount = $paymentsetting_mn['monnify_additional_charges']+$order_info['total'];
?>

<p>Additional charges <?= c_format($paymentsetting_mn['monnify_additional_charges']) ?> will be applied.</p>
<input type="hidden" id="monnify_response" />
<button class="btn btn-default" onclick='backCheckout()'>Back</button>
<button class="btn btn-primary" id="button-confirm">Confirm</button>

<?php if(strtolower($paymentsetting_mn['payment_mode']) == 'sandbox'){ ?>
	<script type="text/javascript" src="https://sandbox.sdk.monnify.com/plugin/monnify.js"></script>
	<?php } else { ?>
	<script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
<?php } ?>
<script type="text/javascript">
	function payWithMonnify($this) {
		var amount = "<?= c_format($totalAmount,false) ?>";
		var d = new Date();
		var now_time = d.getTime();

		MonnifySDK.initialize({
			amount: amount,
			currency: "NGN",
			reference: "<?php echo $order_info['id'] ?>_"+now_time,
			customerFullName: "<?php echo $user['firstname'] . ' ' . $user['lastname'] ?>",
			customerEmail: "<?php echo $user['email'] ?>",
			customerMobileNumber: "<?php echo $user['phone'] ?>",
			apiKey: "<?php echo $paymentsetting_mn['monnify_api_key'] ?>",
			contractCode: "<?php echo $paymentsetting_mn['monnify_contract_code'] ?>",
			paymentDescription: "Collection from <?php echo $user['firstname'] . ' ' . $user['lastname'] ?>",
			isTestMode: "<?php echo strtolower($paymentsetting_mn['payment_mode']) == 'sandbox' ? true : false ?>",
			onComplete: function(response){
				//Implement what happens when transaction is completed.
				if(response.responseCode && response.responseCode =='USER_CANCELLED'){
					location.reload(true);
					console.log(response);
				} else if(response.status && response.status =='FAILED'){
					location.reload(true);
					console.log(response);
				} else {
					var str_res = JSON.stringify( response );
					console.log(str_res);
					$("#monnify_response").val(str_res);
					buttonConfirm($this);
				}
			},
			// onClose: function(data){
			//     //Implement what should happen when the modal is closed here
			//     console.log(data);
			// }
		});
	}
	function buttonConfirm($this){
		$.ajax({
			url:'<?= base_url() ?>store/confirm_payment',
			type:'POST',
			dataType:'json',
			data:{
				comment:$('textarea[name="comment"]').val(),
				monnify_response:$('#monnify_response').val(),
			},
			beforeSend:function(){
				$this.btn("loading");
			},
			complete:function(){
				$this.btn("reset");
			},
			success:function(json){
				if(json['redirect']){
					window.location = json['redirect'];
				}
				if(json['warning']){
					alert(json['warning'])
				}
			},
		});
	}
	$("#button-confirm").click(function(){
		$this = $(this);
		payWithMonnify($this);
	})
</script>

