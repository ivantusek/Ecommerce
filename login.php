<?php include 'inc/header.php'; ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="hello" method="get" id="member">
                	<input name="Domain" type="text" value="Username" >
                    <input name="Domain" type="password" value="Password">
                 </form>
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey">Sign In</button></div></div>
                    </div>
                <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
                            $customerReg = $cmr->customerRegistration($_POST);
                        }
                ?>
    	<div class="register_account">
            <?php
                if (isset($customerReg)){
                    echo $customerReg;
                }
            ?>
    		<h3>Register New Account</h3>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City">
							</div>
							
							<div>
								<input type="text"name="zip" placeholder="Zip-Code">
							</div>
							<div>
								<input type="text" name="email" placeholder="Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address">
						</div>
                            <div>
                                <input type="text" name="country" placeholder="Country">
                            </div>
	
		           <div>
		          <input type="text"  name="phone" placeholder="Phone">
		          </div>
				  
				  <div>
					<input type="text"  name="pass" placeholder="Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include 'inc/footer.php'; ?>