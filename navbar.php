
<style>
  @keyframes animatedText {
    0% { opacity: 0; transform: translateX(-50px); }
    50% { opacity: 1; transform: translateX(0); }
    100% { opacity: 0; transform: translateX(50px); }
  }

  .animated-letter {
    display: inline-block;
    animation: animatedText 5s linear infinite;
  }
</style>

<?php
function animate_text($text) {
  $animated_text = '';
  for ($i = 0; $i < strlen($text); $i++) {
    $animated_text .= '<span class="animated-letter">' . $text[$i] . '</span>';
  }
  return $animated_text;
}
?>



<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list"style=" padding-top: 49px; background-color: #6A0DAD;">

		<?php if ($_SESSION['login_type'] == 1): ?>
  <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> <?php echo animate_text("Home"); ?></a>
  <a href="index.php?page=loans" class="nav-item nav-loans"><span class='icon-field'><i class="fa fa-file-invoice-dollar"></i></span> <?php echo animate_text("Loans"); ?></a>	
  <a href="index.php?page=payments" class="nav-item nav-payments"><span class='icon-field'><i class="fa fa-money-bill"></i></span> <?php echo animate_text("Payments"); ?></a>
  <a href="index.php?page=borrowers" class="nav-item nav-borrowers"><span class='icon-field'><i class="fa fa-user-friends"></i></span> <?php echo animate_text("Borrowers information"); ?></a>
  <a href="index.php?page=plan" class="nav-item nav-plan"><span class='icon-field'><i class="fa fa-list-alt"></i></span> <?php echo animate_text("Loan Plan"); ?></a>	
  <a href="index.php?page=loan_type" class="nav-item nav-loan_type"><span class='icon-field'><i class="fa fa-th-list"></i></span> <?php echo animate_text("Loan Types"); ?></a>		
  <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> <?php echo animate_text("Users"); ?></a>
<?php endif; ?>
				<?php if($_SESSION['login_type'] == 3): ?>
					<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> <?php echo animate_text("Home"); ?></a>
  <a href="index.php?page=loans" class="nav-item nav-loans"><span class='icon-field'><i class="fa fa-file-invoice-dollar"></i></span> <?php echo animate_text("Loans"); ?></a>	
  <a href="index.php?page=payments" class="nav-item nav-payments"><span class='icon-field'><i class="fa fa-money-bill"></i></span> <?php echo animate_text("Payments"); ?></a>
  <a href="index.php?page=borrowers" class="nav-item nav-borrowers"><span class='icon-field'><i class="fa fa-user-friends"></i></span> <?php echo animate_text("Borrowers information"); ?></a>
  <a href="index.php?page=plan" class="nav-item nav-plan"><span class='icon-field'><i class="fa fa-list-alt"></i></span> <?php echo animate_text("Loan Plan"); ?></a>	
  <a href="index.php?page=loan_type" class="nav-item nav-loan_type"><span class='icon-field'><i class="fa fa-th-list"></i></span> <?php echo animate_text("Loan Types"); ?></a>		

				<?php endif; ?>
				<?php if($_SESSION['login_type'] == 2): ?>
					<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> <?php echo animate_text("Home"); ?></a>
					<a href="index.php?page=borrowers" class="nav-item nav-borrowers"><span class='icon-field'><i class="fa fa-user-friends"></i></span> <?php echo animate_text("Your Information "); ?></a>
					<a href="index.php?page=payments" class="nav-item nav-payments"><span class='icon-field'><i class="fa fa-money-bill"></i></span><?php echo animate_text("Payments"); ?></a>

					<a href="index.php?page=loans" class="nav-item nav-loans"><span class='icon-field'><i class="fa fa-file-invoice-dollar"></i></span>  <?php echo animate_text("Loans"); ?></a>	
					<a href="index.php?page=link" class="nav-item nav-link"><span class='icon-field'><i class="fas fa-university"></i></span> <?php echo animate_text("Link Your Bank Account"); ?></a>	 	
					<a href="index.php?page=news" class="nav-item nav-news"><span class='icon-field'><i class="fas fa-newspaper"></i></span> <?php echo animate_text("News"); ?></a>	

					<a href="index.php?page=about_us" class="nav-item nav-about_us"><span class='icon-field'><i class="fas fa-info-circle"></i></span> <?php echo animate_text("About Us"); ?></a>	
					
			<?php endif; ?>
		</div>
		
</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
