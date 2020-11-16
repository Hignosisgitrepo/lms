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
                        <h3>Sign Up and Start Learning!</h3>
                     </div>
                     <hr>
                     <!-- login Form -->
                     <div class="form-group row">
                        <div class="col-lg-12">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="sizing-addon2"><i class="fa fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="First Name" aria-describedby="sizing-addon2" name="c_first_name" id="c_first_name" required id="last_name"  value=""  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
                           </div>
                        </div>
                     </div>
                     <div id="c_firstname_err"></div>
                     <div class="form-group row">
                        <div class="col-lg-12">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="sizing-addon2"><i class="fa fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Last Name" aria-describedby="sizing-addon2" name="c_last_name" id="c_last_name" value="" required id="last_name" required  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
                           </div>
                        </div>
                     </div>
                     <div id="c_lastname_err"></div>
                     <div class="form-group row">
                        <div class="col-lg-12">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                              </div>
                              <input type="text" value="" class="form-control" placeholder="Email ID" aria-describedby="sizing-addon2" name="c_email" id="c_email" required autocomplete="off" />
                           </div>
                        </div>
                     </div>
                     <div id="c_mail_err"></div>
                     <div class="form-group row">
                        <div class="col-lg-12">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                              </div>
								<select class="form-control" name="c_phonecode" id="c_phonecode">
									<?php foreach($countries as $country) { ?>
									  <?php if($country->id == $country_id) { ?>
										<option value="<?php echo $country->id; ?>" selected="selected"><?php echo $country->sortname; ?> (+<?php echo $country->phonecode; ?>)</option>
									  <?php } else { ?>
										<option value="<?php echo $country->id; ?>"><?php echo $country->sortname; ?> (+<?php echo $country->phonecode; ?>)</option>
									  <?php } ?>
									<?php } ?>
								</select>
                              <input type="text" class="form-control" placeholder="Phone Number" aria-describedby="sizing-addon2" name="c_telephone" id="c_telephone" required value=""onkeypress="return isNumberKey(event)" maxlength="10" autocomplete="off">
                           </div>
                        </div>
                     </div>
                     <div id="c_phone_err"></div>
                     <div class="form-group row">
                        <div class="col-lg-12">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                              </div>
                              <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2" name="c_password" id="c_password" required autocomplete="off" />
                           </div>
                        </div>
                     </div>
                     <div id="c_password_err"></div>
                     <br>
                     <button class="btn btn-primary btn-block btn-lg login-btn" type="submit" onclick="addCustomer();">Signin</button><br><br>
                     <div class="text-center dont-have">Already have account! <a href="<?php echo base_url(); ?>login">Login</a></div>
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
<!-- /Page Content -->
<?php $this->load->view('includes/footer'); ?>