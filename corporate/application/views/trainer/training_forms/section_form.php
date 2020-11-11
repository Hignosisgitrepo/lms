<form action="#" class="section_form" novalidate>
		<div class="row">
			<div id="section_alert" class="alert alert-success hide" data-dismiss="alert" role="alert">
			  Section details has been added successfully.
			</div>
			<div class="col-xl-12 card">
				<div class="card-body">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label"><?php echo $text_Section_Name; ?></label>
						<div class="col-lg-9">
							<input type="text" data-value = "1" id="section_name_1" class="form-control section_name" required >
							<div id="" class="error_duplication hide dup_section_alert_1" >
							  Duplicate value
							</div>
							<div class="invalid-feedback">
								Please provide valid <?php echo $text_Section_Name; ?>.
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-3 col-form-label"><?php echo $text_sort_order; ?></label>
						<div class="col-lg-9">
							<input type="text" data-value = "1" id="sort_order_1" class="form-control sort_order" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">
							<div id="" class="error_duplication hide dup_sort_alert_1" >
							  Duplicate value
							</div>
							<div class="invalid-feedback">
								Please provide valid <?php echo $text_sort_order; ?>.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="new_section">
				
		</div>
		<button type="button" data-value="1" id="" class="add_section btn btn-primary">Add Section</button>
	<div class="text-right">
		<!-- <button type="button" data-value="2" class="pervious_button btn btn-primary ">Pervious</button> -->
		<button type="submit" data-value="2" id="submit_section" class="btn btn-primary">Submit</button>
		<button type="button" data-value="2" id="next_button_2" class="next_button btn btn-primary disabled">Next</button>
	</div>
</form>