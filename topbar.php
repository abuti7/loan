
<style>
  .logo img {
    height: 78px;
  }
  .navbar {
    background-color: #6A0DAD;
    padding: 5px 20px;
  }
  .navbar-brand {
    font-size: 25px;
    margin-left: -10px;
  }
  .dropdown-toggle {
    font-size: 18px;
  }
  a {
    color: #fff; 
  }
  a:hover{
    color: #6A5ACD; 
  }
</style>

<nav class="navbar navbar-light fixed-top">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <div class="col-md-1 float-left" style="display: flex;">
        <div class="logo">
          <img src="assets/img/logo2.png"/>
        </div>
      </div>
      <div class="col-md-4 float-left text-white"style="font-size: 35px; margin: 10px; margin-left: -3px;">
      <large><b>LMS</b></large>
      </div>
      <div class="col-md-2 float-right text-white"style=" font-size: 35px; margin: 10px;">
        <div class="dropdown">
          <span class="ml-2"><?php echo $_SESSION['login_username'] ?></span>
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          
            <a class="dropdown-item" href="ajax.php?action=logout">Logout</a>
          </div>
          </div>
      </div>
    </div>
  </div>
</nav>
<script>
  $('#edit').click(function(){
		uni_modal("edit your profile","manage_edit.php",'mid-large')
	})
  </script>
