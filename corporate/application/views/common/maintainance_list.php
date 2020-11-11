<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Page Content -->
   <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title"><?php echo $text_list; ?></h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><?php echo $text_dashboard; ?></a></li>
                  <li class="breadcrumb-item active"><?php echo $text_title; ?></li>
               </ul>
            </div>
            <div class="col-auto float-right ml-auto">
               <a href="<?php echo base_url(); ?>add_maintainance" class="btn btn-block btn-primary" title="<?php echo $btn_add; ?>"><i class="fa fa-plus-square"></i></a>
            </div>
         </div>
      </div>
      <!-- /Page Header -->
	  <div class="card mb-0">
		<div class="card-body">
		  <div class="row">
			 <div class="col-md-12">
				<div class="table-responsive"
						 data-toggle="lists"
						 data-lists-sort-by="js-lists-values-categoryname"
						 data-lists-values='["js-lists-values-categoryname"]'>

						<div class="card-header">
							<div class="search-form">
								<input type="text"
									   class="form-control search"
									   placeholder="Search ...">
								<button class="btn"
										type="button"><i class="material-icons">search</i></button>
							</div>
						</div>

						<table class="table mb-0 thead-border-top-0 table-nowrap">
							<thead>
								<tr>
									<th>
										<a href="javascript:void(0)"
										   class="sort"
										   data-sort="js-lists-values-categoryname"><?php echo $entry_name; ?></a>
									</th>
									<th><?php echo $text_action; ?></th>
								</tr>
							</thead>
							<tbody class="list"
								   id="search">
								<?php if(!empty($maintainances)) { ?>
								  <?php foreach($maintainances as $res): ?>
									<?php
										$b64_mid = urlencode(base64_encode($res->maintainance_id));
										?>
									<tr>
										<td>

											<div class="d-flex flex-column">
												<p class="mb-0"><strong class="js-lists-values-categoryname"><?php echo $res->maintainance_name; ?> </strong></p>
											</div>

										</td>
										<td>
										  <div class="btn-group mb-2">
											<?php $b64_ugid = urlencode(base64_encode($res->maintainance_id)); ?>
											<a type="button" class="btn btn-dark" href="<?php echo base_url().'view_maintainance/'.$b64_mid; ?>">
												Edit
											</a>
										  </div>
										</td>
									</tr>
								  <?php endforeach; ?>
								<?php } else { ?>
								  <tr><td colspan="7"><?php echo $text_no_data; ?></td></tr>
								<?php } ?>

							</tbody>
						</table>
					</div>
			 </div>
		  </div>
		</div>
	  </div>
   </div>
   <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->