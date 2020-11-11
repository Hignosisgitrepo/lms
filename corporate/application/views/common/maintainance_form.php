<div class="pt-32pt">
	<div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
		<div class="flex d-flex flex-column flex-sm-row align-items-center">

			<div class="mb-24pt mb-sm-0 mr-sm-24pt">
				<h2 class="mb-0">
				<?php echo $text_title; ?></h2>

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
			<button type="submit" data-toggle="tooltip" title="Save" form="form-maintaince" class="btn btn-outline-success"><i class="fa fa-save"></i></button>
			<a href="<?php echo base_url(); ?>maintainance" data-toggle="tooltip" title="Back" class="btn btn-white"><i class="fa fa-reply"></i></a>
         </div>
      </div>

	</div>
</div>

                <!-- BEFORE Page Content -->

                <!-- // END BEFORE Page Content -->

                <!-- Page Content -->


<div class="container page__container page-section">
   <div class="row mb-32pt">
      <div class="col-lg-12 d-flex align-items-center">
         <div class="flex"
            style="max-width: 100%">
            <div class="card m-0">
               <div class="card-body">
                  <div class="card-header">
                     <?php $b64_mid = urlencode(base64_encode($maintainance_id)); ?>
						<?php if($b64_mid != '') {  ?>
						  <form action="<?php echo base_url().'edit_maintainance/'.$b64_mid; ?>" method="post" enctype="multipart/form-data" id="form-maintaince" class="form-horizontal">
					    <?php } else { ?>
						  <form action="<?php echo base_url(); ?>add_maintainance" method="post" enctype="multipart/form-data" id="form-maintaince" class="form-horizontal">
						<?php } ?>
                        <div class="form-group row">
                        <label for="maintainance_name" class="col-sm-2 col-form-label"><?php echo $entry_name; ?></label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="maintainance_name" name="maintainance_name" placeholder="<?php echo $entry_name; ?>" value="<?php echo $maintainance_name; ?>" />
                        </div>
                     </div>
                     <div style=" color:#FF0000;"><?php echo form_error('maintainance_name'); ?></div>
                     <div class="table-responsive">
                        <table id="maintainance" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <td class="text-left"><?php echo $entry_value; ?></td>
                                 <td></td>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $maintainance_row = 0; ?>
                              <?php foreach($details as $detail): ?>
                              <tr id="maintainance-row<?php echo $maintainance_row; ?>">
                                 <td class="text-left">
                                    <div class="input-group">
                                       <input type="text" name="maintainance_detail[<?php echo $maintainance_row; ?>][maintainance_value]" placeholder="<?php echo $entry_value; ?>" class="form-control" value="<?php echo $detail->maintainance_value; ?>"/>
                                    </div>
                                 </td>
                                 <td class="text-right"><button type="button" onclick="$('#maintainance-row<?php echo $maintainance_row; ?>').remove();" data-toggle="tooltip" title="{{ btn_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                              </tr>
                              <?php $maintainance_row++; ?>
                              <?php endforeach; ?>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="2"></td>
                                 <td class="text-right"><button type="button" onclick="addMaintainance();" title="<?php echo $btn_add; ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i></button></td>
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
</div>
<script type="text/javascript"><!--
   var maintainance_row = <?php echo $maintainance_row; ?>;
   
   function addMaintainance() {
    html = '<tr id="maintainance-row' + maintainance_row + '">';
    html += '<td class="text-left"><div class="input-group"><input type="text" name="maintainance_detail[' + maintainance_row + '][maintainance_value]" placeholder="<?php echo $entry_value; ?>" class="form-control" /></div></td>';
    html += '<td class="text-right"><button type="button" onclick="$(\'#maintainance-row' + maintainance_row + '\').remove();" data-toggle="tooltip" title="<?php echo $btn_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#maintainance tbody').append(html);
    maintainance_row++;
   }
</script>