<?php include 'db_connect.php' ?>
<?php if($_SESSION['login_type'] == 1||$_SESSION['login_type'] ==3): ?>
<div class="container-fluid"style=" padding-top: 40px;">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Borrower List</b>
				</large>
				<button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_borrower"><i class="fa fa-plus"></i> New Borrower</button>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="borrower-list">
					<colgroup>
						<col width="10%">
						<col width="35%">
						<col width="30%">
						<col width="15%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Borrower</th>
							<th class="text-center">Current Loan</th>
							<th class="text-center">Next Payment Schedule</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
							$qry = $conn->query("SELECT * FROM borrowers order by id desc");
							while($row = $qry->fetch_assoc()):

						 ?>
						 <tr>
						 	
						 	<td class="text-center"><?php echo $i++ ?></td>
						 	<td>
						 		<p>Name :<b><?php echo ucwords($row['firstname'].", ".$row['middlename'].' '.$row['lastname']) ?></b></p>
						 		<p><small>Address :<b><?php echo $row['address'] ?></small></b></p>
						 		<p><small>Contact # :<b><?php echo $row['contact_no'] ?></small></b></p>
						 		<p><small>Email :<b><?php echo $row['email'] ?></small></b></p>
						 		<p><small>Tin No :<b><?php echo $row['tax_id'] ?></small></b></p>
						 		
						 	</td>

							 <?php if($row['firstname'] ): ?>
						 	<td class="">yes</td>
							 <?php else: ?>
								None
						 		<?php endif; ?>
						 	<td class="">N/A</td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_borrower" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_borrower" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			</div>
          </div>
		</div>
		<?php endif; ?>
		<?php if($_SESSION['login_type'] == 2): ?>
			<?php 
	if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM borrowers where id=".$_GET['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}

?>

<div class="container-fluid"style=" padding-top: 60px;">
	<div class="col-lg-12">
	<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>New Borrower </b>
				</large>
			</div>
		<form id="manage-borrower">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="" class="control-label">First Name/ሰም</label>
						<input name="firstname" id="firstname"placeholder="ስም" class="form-control"   value="<?php echo isset($firstname) ? $firstname : '' ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Middle Name/የአባት ስም</label>
						<input name="middlename"id="middlename" placeholder="የአባት ስም"class="form-control"  value="<?php echo isset($middlename) ? $middlename : '' ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Last Name/የአያት ስም</label>
						<input name="lastname" id="lastname"  placeholder="የአያት ስም"class="form-control" value="<?php echo isset($lastname) ? $lastname : '' ?>">
					</div>
				</div>
			</div>
			<div class="row">
			   <div class="col-md-4">
			        <div class="form-group">
							<label for="">Email/ኢ ሜይል</label>
							<input type="email"  class="form-control"  placeholder="ኢ ሜይል"name="email" id="email"  value="<?php echo isset($email) ? $email : '' ?>">
				    </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Tin no/ቲን ነምበር </label>
						<input type="text" class="form-control" placeholder="ቲን ነምበር（optional）"name="tax_id" value="<?php echo isset($tax_id) ? $tax_id : '' ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">phone no/ሰልክ ቁጥር</label>
						<input type="number"  class="form-control" placeholder="ሰልክ ቁጥር"name="contact_no"id="contact_no"  value="<?php echo isset($contact_no) ? $contact_no : '' ?>">
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
							<label for="">Address/አድራሻ</label>
							<textarea name="address" id="address" cols="30" rows="2" placeholder="አድራሻ" class="form-control" ><?php echo isset($address) ? $address : '' ?></textarea>
				</div>
				<div class="col-md-6">
			<label for="file">Upload Your file:</label> &nbsp;
        <input type="file" id="file" name="file">
		</div>
			</div>
			<button type="button" class="btn btn-primary" id="submit">Save</button>

		</form>
	</div>
</div>
</div>
        
<style>
	#manage-borrower {
background-color: #fff;
padding: 20px;
border-radius: 5px;
}

#manage-borrower label {
font-weight: bold;
}
#manage-borrower input[type=“text”],
#manage-borrower input[type=“email”],
#manage-borrower input[type=“number”],
#manage-borrower textarea {
border: 1px solid #ccc;
border-radius: 3px;
padding: 5px;
width: 100%;
margin-bottom: 10px;
}
#manage-borrower button {
background-color: #007bff;
color: #fff;
border: none;
border-radius: 3px;
padding: 10px 20px;
cursor: pointer;
}
#manage-borrower button:hover {
background-color: #0069d9;
}
</style>
		<?php endif; ?>


<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}

</style>	
<script>
	$('#borrower-list').dataTable()
	$('#new_borrower').click(function(){
		uni_modal("New borrower","manage_borrower.php",'mid-large')
	})
	$('.edit_borrower').click(function(){
		uni_modal("Edit borrower","manage_borrower.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_borrower').click(function(){
		_conf("Are you sure to delete this borrower?","delete_borrower",[$(this).attr('data-id')])
	})
function delete_borrower($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_borrower',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("borrower successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

	$('#submit').click(function() {
    $('#manage-borrower').submit();
});
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