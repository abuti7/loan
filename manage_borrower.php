<?php include 'db_connect.php' ?>
<?php 

if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM borrowers where id=".$_GET['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-borrower">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="" class="control-label">First Name/ሰም</label>
						<input name="firstname" id="firstname" class="form-control"   value="<?php echo isset($firstname) ? $firstname : '' ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Middle Name/የአባት ስም</label>
						<input name="middlename"id="middlename" class="form-control"  value="<?php echo isset($middlename) ? $middlename : '' ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Last Name/የአያት ስም</label>
						<input name="lastname" id="lastname"  class="form-control" value="<?php echo isset($lastname) ? $lastname : '' ?>">
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
							<label for="">Address/አድራሻ</label>
							<textarea name="address" id="address" cols="30" rows="2"  class="form-control" ><?php echo isset($address) ? $address : '' ?></textarea>
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">phone no/ሰልክ ቁጥር</label>
						<input type="number"  class="form-control" name="contact_no"id="contact_no"  value="<?php echo isset($contact_no) ? $contact_no : '' ?>">
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
							<label for="">Email/ኢ ሜይል</label>
							<input type="email"  class="form-control" name="email" id="email"  value="<?php echo isset($email) ? $email : '' ?>">
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">Tin no </label>
						<input type="text" class="form-control" name="tax_id" value="<?php echo isset($tax_id) ? $tax_id : '' ?>">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	 $('#manage-borrower').submit(function(e){
	 	e.preventDefault()
		 if(validateForm()){
	 	start_load()
	 	$.ajax({
	 		url:'ajax.php?action=save_borrower',
	 		method:'POST',
	 		data:$(this).serialize(),
	 		success:function(resp){
	 			if(resp == 1){
	 				alert_toast("Borrower data successfully saved.","success");
	 				setTimeout(function(e){
	 					location.reload()
	 				},1500)
	 			}
	 		}
	 	})
	}
	 })
	 function validateForm(){
	 	var valid = true;
	 	// add validation rules here
	 	if($('#firstname').val() == ''){
	 		valid = false;
	 		alert_toast("Name is required.","warning");
	 	}
		 if($('#middlename').val() == ''){
        valid = false;
        alert_toast("Middle name is required.","warning");
    }
    if($('#lastname').val() == ''){
        valid = false;
        alert_toast("Last name is required.","warning");
    }
    if($('#address').val() == ''){
        valid = false;
        alert_toast("Address is required.","warning");
    }
	 	if($('#email').val() == ''){
	 		valid = false;
			 alert_toast("Email is required.","warning");
	 	}
	 	if($('#contact_no').val() == ''){
	 		valid = false;
	 		alert_toast("Phone is required.","warning");
	 	}
	 	return valid;
	 }
</script>