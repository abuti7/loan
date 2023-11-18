<?php include 'db_connect.php' ?>
<style>

</style>


<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3"style=" padding-top: 70px;">
			<div class="col-lg-12">
			<div class="card">
            <?php if($_SESSION['login_type'] == 1): ?>
				<div class="card-body">
				<?php echo "Welcome  ".($_SESSION['login_type'] == 0? "Dr. ".$_SESSION['login_name'].','.$_SESSION['login_name_pref'] : $_SESSION['login_username'])."!"  ?>&nbsp<i class="far fa-smile-beam"aria-hidden="true"></i>
									
				</div>
				<hr>
				<div class="row ml-2 mr-2">
				<div class="col-md-3">
                        <div class="card  text-white mb-3"style="background: url(assets/img/payment.jpg);background-color:#996515;
	    background-repeat: no-repeat;background-size: 275px;padding:12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3 ">
                                    <div class="text-white-75 small"><br/></div>                                      
                                      <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:30px 0;">
                                        	<?php 
                                        	$payments = $conn->query("SELECT sum(amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                        	echo $payments->num_rows > 0 ? number_format($payments->fetch_array()['total'],2) : "0.00";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-calendar"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=payments">View Payments</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-md-3">
                <div class="card text-white mb-3 bg-dark"style="background: url(assets/img/borrowers.jpg);background-color:;
	    background-repeat: no-repeat;background-size:295px;padding:12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small"></div>
                                        <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:40px 0;">
                                        	<?php 
                                        	$borrowers = $conn->query("SELECT * FROM borrowers");
                                        	echo $borrowers->num_rows > 0 ? $borrowers->num_rows : "0";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-user-friends"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center ">
                                <a class="small text-white stretched-link" href="index.php?page=borrowers">View Borrowers</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="col-md-3">
                  <div class="card text-white mb-3 bg-dark"style="background: url(assets/img/active.jpg);background-color:;
	    background-repeat: no-repeat;background-size: 275px;padding:12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small"></div>
                                        <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:40px 0;">
                                        	<?php 
                                        	$loans = $conn->query("SELECT * FROM loan_list where status = 2");
                                        	echo $loans->num_rows > 0 ? $loans->num_rows : "0";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fas fa-hand-holding-usd"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=loans">View Loan List</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card  text-white mb-3"style="background: url(assets/img/totals.jpg);background-color:#996515;
	    background-repeat: no-repeat;background-size: 295px;padding:12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small"></div>
                                        <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:50px 0;">
                                      
                                        		
                                    	</div>
                                    </div>
                                    <i class="fas fa-file-invoice-dollar"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php 
                                        	$payments = $conn->query("SELECT sum(amount - penalty_amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                        	$loans = $conn->query("SELECT sum(l.amount + (l.amount * (p.interest_percentage/100))) as total FROM loan_list l inner join loan_plan p on p.id = l.plan_id where l.status = 2");
                                        	$loans =  $loans->num_rows > 0 ? $loans->fetch_array()['total'] : "0";
                                        	$payments =  $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
                                        	echo number_format($loans - $payments,2);
                                        	 ?>
                        </div>
                    </div>

				</div>
			
                <?php endif; ?>
            </div>
           
		</div>
		</div>
	</div>
    <div class="row mt-3 ml-3 mr-3"style=" padding-top: -80px;">
			<div class="col-lg-12">
			<div class="card">
            <?php if($_SESSION['login_type'] == 3): ?>
				<div class="card-body">
				<?php echo "Welcome ".($_SESSION['login_type'] == 0? "Dr. ".$_SESSION['login_name'].','.$_SESSION['login_name_pref'] : $_SESSION['login_username'])."!"  ?>&nbsp<i class="far fa-smile-beam"aria-hidden="true"></i>
									
				</div>
				<hr>
				<div class="row ml-2 mr-2">
				<div class="col-md-3">
                <div class="card  text-white mb-3"style="background: url(assets/img/payment.jpg);background-color:#996515;
	    background-repeat: no-repeat;background-size: 275px;padding:12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3 ">
                                    <div class="text-white-75 small"><br/></div>                                      
                                      <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:30px 0;">
                                        	<?php 
                                        	$payments = $conn->query("SELECT sum(amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                        	echo $payments->num_rows > 0 ? number_format($payments->fetch_array()['total'],2) : "0.00";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-calendar"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=payments">View Payments</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-md-3">
                <div class="card text-white mb-3 bg-dark"style="background: url(assets/img/borrowers.jpg);background-color:;
	    background-repeat: no-repeat;background-size:295px;padding:12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small"></div>
                                        <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start;padding:40px 0;">
                                        	<?php 
                                        	$borrowers = $conn->query("SELECT * FROM borrowers");
                                        	echo $borrowers->num_rows > 0 ? $borrowers->num_rows : "0";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-user-friends"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=borrowers">View Borrowers</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="col-md-3">
                  <div class="card text-white mb-3 bg-dark"style="background: url(assets/img/active.jpg);background-color:;
                  	    background-repeat: no-repeat;background-size:275px;padding:12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small"></div>
                                        <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:40px 0;">
                                        	<?php 
                                        	
                                        	$loans = $conn->query("SELECT * FROM loan_list where status = 2");
                                        	echo $loans->num_rows > 0 ? $loans->num_rows : "0";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fas fa-hand-holding-usd"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=loans">View Loan List</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                     <div class="card  text-white mb-3"style="background: url(assets/img/totals.jpg);background-color:#996515;
                     background-repeat: no-repeat;background-size: 295px;padding:12px;">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-center">
                                                 <div class="mr-3">
                                                     <div class="text-white-75 small"></div>
                                                     <div class="text-black font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:50px 0;">
                                                       
                                                             
                                                     </div>
                                                 </div>
                                                 <i class="fas fa-file-invoice-dollar"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                     <?php 
                                                         $payments = $conn->query("SELECT sum(amount - penalty_amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                                         $loans = $conn->query("SELECT sum(l.amount + (l.amount * (p.interest_percentage/100))) as total FROM loan_list l inner join loan_plan p on p.id = l.plan_id where l.status = 2");
                                                         $loans =  $loans->num_rows > 0 ? $loans->fetch_array()['total'] : "0";
                                                         $payments =  $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
                                                         echo number_format($loans - $payments,2);
                                                          ?>
                          
                        </div>
                    </div>

				</div>
			
                <?php endif; ?>
            </div>
           
		</div>
		</div>
	</div>
    <div class="row mt-3 ml-3 mr-3"style="position: relative; top: -30px;">
			<div class="col-lg-12">
			<div class="card">
            <?php if($_SESSION['login_type'] == 2): ?>
				<div class="card-body">
				<?php echo "Welcome  ".($_SESSION['login_type'] == 0? "Dr. ".$_SESSION['login_name'].','.$_SESSION['login_name_pref'] : $_SESSION['login_username'])."!"  ?>&nbsp<i class="far fa-smile-beam"aria-hidden="true"></i>
									
				</div>
				<hr>
				<div class="row ml-2 mr-2">
				<div class="col-md-3">
                <div class="card  text-white mb-3"style="background: url(assets/img/payment.jpg);background-color:#996515;
                background-repeat: no-repeat;background-size: 275px;padding:9px;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3 ">
                                            <div class="text-white-75 small"><br/></div>                                      
                                              <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:50px 0;">
                                                   
                                                        
                                                </div>
                                            </div>
                                            <i class="fa fa-calendar"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=payments">View Payments</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-md-3">
                <div class="card text-white mb-3 "style="background: url(assets/img/user.jpg);background-color:#6495ED;
                background-repeat: no-repeat;background-size:295px;padding:12px;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small"></div>
                                                <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:57px 0;">
                                            
                                                        
                                                </div>
                                            </div>
                                            <i class="fa fa-user-friends"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=borrowers">View Your Information</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="col-md-3">
                  <div class="card text-white mb-3 bg-dark"style="background: url(assets/img/active.jpg);background-color:;
                  background-repeat: no-repeat;background-size:275px;padding:12px;">
                                      <div class="card-body">
                                          <div class="d-flex justify-content-between align-items-center">
                                              <div class="mr-3">
                                              <div class="text-white-75 small"></div>
                                                  <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:57px 0;">
                                           
                                                  </div>
                                              </div>
                                              <i class="fas fa-hand-holding-usd"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=loans">View Loan List</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                     

				
                <div class="col-md-3">
                <div class="card text-white mb-3"style="background: url(assets/img/link.jpg);background-color:#4682B4;
                background-repeat: no-repeat;background-size:295px;padding:12px;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small"></div>
                                                <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:57px 0;">
                                            
                                                        
                                                </div>
                                            </div>
                                            <i class="fas fa-university"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=link">  link your bank account </a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                <div class="card text-white mb-3"style="background: url(assets/img/news.jpg);background-color:#1E90FF;
                background-repeat: no-repeat;background-size:295px;padding:12px;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small"></div>
                                                <div class="text-lg font-weight-bold"style="display:flex; justify-content:space-evenly;align-items:flex-start; padding:57px 0;">
                                            
                                                        
                                                </div>
                                            </div>
                                            <i class="fas fa-newspaper"style="position: absolute; right: 0; top: 0;"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=news">  view news </a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
           
		</div>
		</div>
	</div>
</div>
<script>
	
</script>