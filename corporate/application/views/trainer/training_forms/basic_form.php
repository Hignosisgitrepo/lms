<form action="#" class="basic_form" novalidate>
		<div class="row p_t_10">
			<div id="basic_alert" class="alert alert-success hide" data-dismiss="alert" role="alert">
			  Basic details has been added successfully.
			</div>
			<div class="col-xl-12">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label"><?php echo $text_Training_Name; ?></label>
					<div class="col-lg-9">
						<input type="text" id="training_name" class="form-control" required >
						<div class="invalid-feedback">
							Please provide valid <?php echo $text_Training_Name; ?>.
						</div>
					</div>
					
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label"><?php echo $text_Category_Name; ?></label>
					<div class="col-lg-9">
						<select class="form-control" name="course_category" id="course_category" required>
							 <option value=""><?php echo $text_select; ?></option>
							<?php foreach($course_category as $category): ?>
                                <?php if($category->category_id == $category_id) { ?>
                                <option value="<?php echo $category->category_id; ?>" selected="selected"><?php echo $category->category_name; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                                <?php } ?>
                               <?php endforeach; ?>
						</select>
						<div class="invalid-feedback">
							Please select a <?php echo $text_Category_Name; ?>.
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label"><?php echo $text_Training_Type; ?></label>
					<div class="col-lg-9">
						<select class="form-control" name="training_type" id="training_type" required>
							 <option value=""><?php echo $text_select; ?></option>
							 <?php foreach($training_type as $training): ?>
                               
                                <option data-value ="<?php echo $training->maintainance_value; ?>" value="<?php echo $training->maintainance_detail_id; ?>"><?php echo $training->maintainance_value; ?></option>
                               <?php endforeach; ?>
						</select>
						<div class="invalid-feedback">
							Please select a <?php echo $text_Training_Type; ?>.
						</div>
					</div>
					
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label"><?php echo $text_currencies; ?></label>
					<div class="col-lg-9">
						<select class="form-control" name="currencies" id="currencies" required>
							 <option value=""><?php echo $text_select; ?></option>
							 <?php foreach($currencies as $currency): ?>
                                <?php if($currency->currency_id == $currency) { ?>
                                <option value="<?php echo $currency->currency_id; ?>" selected="selected"><?php echo $currency->currency_name; ?> - <?php echo $currency->currency_code; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $currency->currency_id; ?>"><?php echo $currency->currency_name; ?> - <?php echo $currency->currency_code; ?></option>
                                <?php } ?>
                               <?php endforeach; ?>
						</select>
						<div class="invalid-feedback">
							Please select a <?php echo $text_currencies; ?>.
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label"><?php echo $text_price; ?></label>
					<div class="col-lg-9">
						<input type="text" id="price" class="form-control" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
						<div class="invalid-feedback">
							Please select a <?php echo $text_price; ?>.
						</div>
					</div>					
				</div>

				<div class="hide" id="online_section">
					<hr>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Course Duration(in Hours)</label>
								<input type="text" id="course_duration" class="form-control" placeholder="Integer only"  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Session Duration(in Hours)</label>
								<input type="text" id="session_duration" class="form-control" placeholder="Integer only"  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>No of Session</label>
								<input type="text" disabled id="no_of_session" class="form-control" placeholder="Integer only"  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group" >
				                <label>Days</label>
				                <select class="form-control select2 days_select" name="days[]" multiple="multiple">
				                	<?php $i=0 ?>
				                	<?php foreach($days as $day): ?>
	                                <?php if($day->maintainance_detail_id == $day) { ?>
	                                <option value="<?php echo $i; ?>" selected="selected"><?php echo $day->maintainance_value; ?></option>
	                                <?php } else { ?>
	                                <option value="<?php echo $i; ?>"><?php echo $day->maintainance_value; ?></option>
	                                <?php } ?>
	                                <?php $i++ ?>
	                               <?php endforeach; ?>
				                </select>				                
				            </div>
						</div>
						<div class="col">
							<div class="form-group">
				                <label>Start Date and Time:</label>
				                <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input type="text" class="form-control pull-right" id="datepicker">
				                  <input type="hidden" id="start_date" value="">
				                  <input type="hidden" id="start_time" value="">
				                </div>
				                <!-- /.input group -->
				              </div>
						</div>
						
					</div>
					<div class="row">
						
					</div>
				</div>
			</div>
		</div>          
	<div class="text-right">
		<button type="submit" data-value="1" id="submit_basic_details" class="btn btn-primary">Submit</button>
		<button type="button" data-value="1" id="next_button_1" class="next_button btn btn-primary disabled">Next</button>
	</div>
</form>

<script type="text/javascript">
	var add_trainer_basic_details = "<?php echo site_url('add_trainer_basic_details'); ?>";
	var add_trainer_section_info = "<?php echo site_url('add_trainer_section_info'); ?>";
    var add_trainer_section_details_info = "<?php echo site_url('add_trainer_section_details_info'); ?>";
</script>

