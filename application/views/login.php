<?php $this->load->view('includes/header'); ?>
	</div>
</div>
<br>
<br><br><br><br><br>
<!-- Page Content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <!-- Account Content -->
            <div class="account-content">
               <div class="row align-items-center justify-content-center">
                  <div class="col-md-12 col-lg-6 login-right">
                     <div class="login-header">
                        <h3>Log In to your E-Learing Account</h3>
                     </div>
                     <hr>
                     <!-- login Form -->
					  
                     <div id="invalidLogin"></div>
                     <div class="form-group row">
                        <div class="col-lg-12">
                           
                        <label class="form-label" for="email">Email:</label>
                        <input autocomplete="off" type="text" class="form-control email" placeholder="Email ID" name="cu_email" id="cu_email" value="" required>
                           
                        </div>
                     </div>
                     <div id="cuemail_err"></div>
                     <div class="form-group row">
                        <div class="col-lg-12">

                        
                        <label class="form-label" for="password">Password:</label>
                           <input autocomplete="off" type="password" class="form-control" placeholder="Enter your password" id="cu_password" name="cu_password" value="" required>


                          
                        </div>
                     </div>
                     <div id="cupwd_err"></div>
                     <br>
                     <div class="text-center">
                     <button class="btn btn-primary" type="submit" onclick="customerLogin();">Signin</button>
</div>

                     
                     <!-- <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div> -->
                     <br><br>
                     <div class="text-center dont-have">Don’t have an account? <a href="<?php echo base_url(); ?>register">Register</a></div>
                     <br><br>
                     <!-- /login Form -->
                  </div>
               </div>
            </div>
            <!-- /Account Content -->
         </div>
      </div>
   </div>
</div>
<!-- /Page Content -->
<?php $this->load->view('includes/footer'); ?>