
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | LMS</title>
 
<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:49%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#59b6ec61;
		display: flex;
		align-items: center;
		background: url(assets/img/logo.jpg);
	    background-repeat: no-repeat;
	    background-size:700px;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo {
	font-size: 100px;
    margin: auto;
    color: #000000b3;
    padding-bottom: 10px;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
	width: calc(100%);
    height: calc(100%);
    background: #000000e0;
}
img{
	background-position:centre;
	height: 180px;
}
.error {
  background-color: #f2dede;
  color: #a94442;
  padding: 1px;
  margin-bottom: 1px;
  border: 1px solid #ebccd1;
  border-radius: 1px;
}
.my-form {
  min-height: 10px; /* adjust the height as needed */
}
/*<span class="fa fa-money-bill-wave"></span>*/
</style>

<body>
<div id="error">
  <?php include('server.php') ?>
  </div>


  <main id="main" class=" bg-dark">
  		<div id="login-left">
  			
  		</div>

  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
  						<div class="logo">
						  <center><b>LMS</b></center>
			  			</div>
                          <form method="post" action="register.php"class="my-form">
                       	  <?php include('errors.php'); ?>
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control"value="<?php echo $username; ?>">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
  						</div>
                          <div class="form-group">
  							<label for="password" class="control-label">Confirm Password</label>
  							<input type="password" id="password" name="confirmpassword" class="form-control" value="<?php echo isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : ''; ?>">
  						</div>
  						<center><button name="reg_user" class="btn-sm btn-block btn-wave col-md-4 btn-primary">Register</button></center>
						 Have an account?  <a href="login.php">Login here</a>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>

</script>	
</html>