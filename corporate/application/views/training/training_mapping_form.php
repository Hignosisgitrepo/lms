<div class="pt-32pt">
	<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
		<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

			<div class="mb-24pt mb-sm-0 mr-sm-24pt">
				<h2 class="mb-0"><?php echo $text_title; ?></h2>

				<ol class="breadcrumb p-0 m-0">
				  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><?php echo $text_dashboard; ?></a></li>
				  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>maintainance"><?php echo $text_title; ?></a></li>
				  <li class="breadcrumb-item active"><?php echo $text_form; ?></li>

				</ol>

			</div>
		</div>

		<div class="row"
			 role="tablist">
			<div class="col-auto">
				<button type="submit" form="form-mapping" data-toggle="tooltip" title="<?php echo $btn_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<a href="<?php echo base_url(); ?>map-trainings" data-toggle="tooltip" title="<?php echo $btn_back; ?>" class="btn btn-white"><i class="fa fa-reply"></i></a>
			</div>
		</div>

	</div>
</div>
<div class="container page__container page-section">
<?php
	$error = $this->session->flashdata('error');
	if($error) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo $error; ?>                    
	</div>
<?php } ?>
<div class="row mb-32pt">
	<div class="col-lg-12 d-flex align-items-center">
		<div class="flex"
			 style="max-width: 100%">

			<div class="card m-0">

				<div class="card-body">
				<form action="<?php echo base_url(); ?>add-map-training" method="post" enctype="multipart/form-data" id="form-mapping" class="form-horizontal">
				 <div class="form-group row">
					<label for="training_id" class="col-sm-2 col-form-label"><?php echo $entry_designation; ?></label>
					<div class="col-sm-10">
					   <select class="form-control" name="designation_id" id="designation_id">
						  <option value=""><?php echo $text_select; ?></option>
						  <?php foreach($designations as $designation): ?>
							<option value="<?php echo $designation->corporate_designation_id; ?>"><?php echo $designation->designation_name; ?></option>
						  <?php endforeach; ?>
					   </select>
					</div>
				 </div>
				 <div style=" color:#FF0000;"><?php echo form_error('designation_id'); ?></div>
				 <div class="table-responsive">
					<table id="map" class="table table-bordered table-hover">
					   <thead>
						  <tr>
							 <td class="text-left"><?php echo $entry_name; ?></td>
							 <td></td>
						  </tr>
					   </thead>
					   <tbody>
						  <?php $map_row = 0; ?>
						  <?php foreach($map_details as $detail): ?>
						  <tr id="map-row<?php echo $map_row; ?>">
							 <td class="text-left">
								<div class="input-group">
								   <select class="form-control" name="map_deatil[<?php echo $map_row; ?>][designation_id]" id="designation_id">
									  <option value=""><?php echo $text_select; ?></option>
									  <?php foreach($designations as $designation): ?>
										<?php if($designation->training_master_id == $training_id) { ?>
										  <option value="<?php echo $designation->corporate_designation_id; ?>" selected="selected"><?php echo $designation->designation_name; ?></option>
										<?php } else { ?>
										  <option value="<?php echo $designation->corporate_designation_id; ?>"><?php echo $designation->designation_name; ?></option>
										<?php } ?>
									  <?php endforeach; ?>
								   </select>
								   <input type="text" name="maintainance_detail[<?php echo $map_row; ?>][maintainance_value]" placeholder="<?php echo $entry_value; ?>" class="form-control" value="<?php echo $detail->maintainance_value; ?>"/>
								</div>
							 </td>
							 <td class="text-right"><button type="button" onclick="$('#map-row<?php echo $map_row; ?>').remove();" data-toggle="tooltip" title="{{ btn_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
						  </tr>
						  <?php $map_row++; ?>
						  <?php endforeach; ?>
					   </tbody>
					   <tfoot>
						  <tr>
							 <td colspan="2"></td>
							 <td class="text-right"><button type="button" onclick="addMappings();" title="<?php echo $btn_add; ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i></button></td>
						  </tr>
					   </tfoot>
					</table>
				 </div>
				</form>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript"><!--
   var map_row = <?php echo $map_row; ?>;
   
   function addMappings() {
    html = '<tr id="map-row' + map_row + '">';
    html += '<td class="text-left"><div class="input-group">';
	html +='<select class="form-control" name="map_deatil[' + map_row + '][training_id]" id="training_id"><option value=""><?php echo $text_select; ?></option><?php foreach($trainings as $training): ?><option value="<?php echo $training->training_master_id; ?>"><?php echo $training->training_name; ?></option><?php endforeach; ?></select></div></td>';
    html += '<td class="text-right"><button type="button" onclick="$(\'#map-row' + map_row + '\').remove();" data-toggle="tooltip" title="<?php echo $btn_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#map tbody').append(html);
    map_row++;
   }
</script>