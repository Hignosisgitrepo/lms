<form action="#" class="concept_form" novalidate>
		<div class="row">
			<div id="concept_alert" class="alert alert-success hide" data-dismiss="alert" role="alert">
			  concept details has been added successfully.
			</div>
			<div class="col-xl-12 card">
				<div class="card-body">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label"><?php echo $text_concept_Name; ?></label>
						<div class="col-lg-9">
							<input type="text" data-value = "1" id="concept_name_1" class="form-control concept_name" required >
							<div id="" class="error_duplication hide dup_concept_alert_1" >
							  Duplicate value
							</div>
							<div class="invalid-feedback">
								Please provide valid <?php echo $text_concept_Name; ?>.
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</div>
		<div id="new_concept">
				
		</div>
		
		<button type="button" data-value="1" id="" class="add_concept btn btn-info"><i class="fa fa-plus-circle"></i></button>
	<div class="text-right">
		<!-- <button type="button" data-value="2" class="pervious_button btn btn-primary ">Pervious</button> -->
		<button type="submit" data-value="2" id="submit_concept" class="btn btn-primary">Submit</button>
		<button type="button" data-value="2" id="next_button_2" class="next_button btn btn-primary disabled">Next</button>
	</div>
</form>