
<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Page Content -->
   <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title"><?php echo $text_title; ?></h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><?php echo $text_dashboard; ?></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>maintainance"><?php echo $text_title; ?></a></li>
                  <li class="breadcrumb-item active"><?php echo $text_form; ?></li>
               </ul>
            </div>
            <div class="col-auto float-right ml-auto">
			  <div class="pull-right">
				<button type="submit" form="form-maintaince" data-toggle="tooltip" title="<?php echo $btn_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<a href="<?php echo base_url(); ?>maintainance" data-toggle="tooltip" title="<?php echo $btn_back; ?>" class="btn btn-primary"><i class="fa fa-reply"></i></a>
              </div>
            </div>
         </div>
      </div>
      <!-- /Page Header -->
   <div class="card mb-0">
      <div class="card-header">
         <h3 class="card-title"><?php echo $text_form; ?></h3>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-12">
			   <?php $b64_mid = urlencode(base64_encode($maintainance_id)); ?>
               <?php if($b64_mid != '') {  ?>
               <form action="<?php echo base_url().'edit_maintainance/'.$b64_mid; ?>" method="post" enctype="multipart/form-data" id="form-maintaince" class="form-horizontal">
                  <?php } else { ?>
               <form action="<?php echo base_url(); ?>add_maintainance" method="post" enctype="multipart/form-data" id="form-maintaince" class="form-horizontal">
                  <?php } ?>
                  <div class="card-body">
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
                                 <td class="text-right"><button type="button" onclick="addMaintainance();" data-toggle="tooltip" title="<?php echo $btn_add; ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i></button></td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /Page Content -->
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