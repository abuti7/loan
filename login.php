<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LMS</title>
 	

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
	    background-size: 700px;
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
@keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    
    /* Apply animation to login form */
    .logo {
      animation: fadeIn 1s ease-in-out;
    }



    @keyframes animateL {
      0% { transform: scaleX(1); }
      50% { transform: scaleX(0.5); opacity: 0.5; }
      100% { transform: scaleX(1); opacity: 1; }
    }

    @keyframes animateM {
      0% { transform: scale(1); }
      50% { transform: scale(0.2); opacity: 0.2; }
      100% { transform: scale(1); opacity: 1; }
    }

    @keyframes animateS {
      0% { transform: rotate(0); }
      50% { transform: rotate(180deg); opacity: 0.5; }
      100% { transform: rotate(0); opacity: 1; }
    }

    .animated-letter {
      display: inline-block;
      animation-duration: 3s;
      animation-timing-function: ease-in-out;
      animation-iteration-count: infinite;
    }

    .animated-letter--L {
      animation-name: animateL;
    }

    .animated-letter--M {
      animation-name: animateM;
    }

    .animated-letter--S {
      animation-name: animateS;
    }
</style>

   
 

<body>


  <main id="main" class=" bg-dark">
  		<div id="login-left">
  			
  		</div>

  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
  						<div class="logo">
			              <center><b> <span class="animated-letter animated-letter--L">L</span>
    <span class="animated-letter animated-letter--M">M</span>
    <span class="animated-letter animated-letter--S">S</span></b></center>
			  			</div>
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
						  Don't have an account yet? <a href="register.php">Register here</a>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='loans.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
	window.onload = function() {
      var loginForm = document.querySelector('.logo');
      loginForm.classList.add('animate');
    };

</script>	
</html>