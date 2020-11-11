<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

	<!-- Drawer Layout -->
	<div class="mdk-drawer-layout js-mdk-drawer-layout"
		 data-push
		 data-responsive-width="992px">

		<!-- Drawer Layout Content -->
		<div class="mdk-drawer-layout__content page-content">

			<div class="pt-32pt">
				<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
					<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

						<div class="mb-24pt mb-sm-0 mr-sm-24pt">
							<h2 class="mb-0"><?php echo $text_list; ?></h2>

							<ol class="breadcrumb p-0 m-0">
								<li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>

								<li class="breadcrumb-item active">

									<?php echo $pageTitle; ?>

								</li>

							</ol>

						</div>
					</div>

					<div class="row"
						 role="tablist">
						<div class="col-auto">
							<a href="<?php echo base_url(); ?>add-user" class="btn btn-outline-secondary"><?php echo $text_add; ?></a>
						</div>
					</div>

				</div>
			</div>

<div id="successModal" style="display:none"><p id="success_div"></div>
<div class="container page__container page-section">

	<div class="row mb-32pt">
		<div class="col-lg-12 d-flex align-items-center">
			<div class="flex"
				 style="max-width: 100%">

				<div class="card m-0">

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
										   data-sort="js-lists-values-categoryname"><?php echo $text_empname; ?></a>
									</th>
									<th>
										<a href="javascript:void(0)"
										   class="sort"
										   data-sort="js-lists-values-email"><?php echo $text_email; ?></a>
									</th>
									<th><a href="javascript:void(0)"
										   class="sort"
										   data-sort="js-lists-values-email"><?php echo $text_mobile; ?></a></th>
									<th><a href="javascript:void(0)"
										   class="sort"
										   data-sort="js-lists-values-email"><?php echo $text_user_group; ?></a></th>
									<th><?php echo $text_status; ?></th>
									<th class="text-right"><?php echo $text_action; ?></th>
								</tr>
							</thead>
							<tbody class="list"
								   id="search">
								<?php if(!empty($users)) { ?>
								  <?php foreach($users as $res): ?>
									<tr>
										<td>

											<div class="d-flex flex-column">
												<p class="mb-0"><strong class="js-lists-values-categoryname"><?php echo $res['name']; ?> </strong></p><small class="js-lists-values-email text-50"><?php echo $res['email']; ?></small>
											</div>

										</td>
										<td>
											<small class="js-lists-values-phone text-50"><?php echo $res['phone_no']; ?></small>
										</td>
										<td>
											<small class="js-lists-values-phone text-50"><?php echo $res['group_name']; ?></small>
										</td>
										<td>
											<small class="js-lists-values-phone text-50"><?php echo date("m-d-Y", strtotime($res['created_date'])); ?></small>
										</td>
										<td>
                                            <small class="js-lists-values-phone text-50"><?php echo $res['status']; ?></small>
										</td>
										<td>
										  <div class="btn-group mb-2">
											<?php $b64_uid = urlencode(base64_encode($res['emp_user_id'])); ?>
											<a type="button" class="btn btn-dark" href="<?php echo base_url().'edit-user/'.$b64_uid; ?>">
												<i class="material-icons">edit</i>
											</a>
											<?php if($res['stat'] == 1) { ?>
												<a class="btn btn-warning" onclick="changeStatus('<?php echo $b64_uid; ?>');" title=" <?php echo $btn_deactivate; ?>"><i class="fa fa-thumbs-down m-r-5"></i></a>
											<?php } else { ?>
												<a class="btn btn-danger" onclick="changeStatus('<?php echo $b64_uid; ?>');" title=" <?php echo $btn_activate; ?>"><i class="fa fa-thumbs-up m-r-5"></i></a>
											<?php } ?>
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

<script>
	function changeStatus(b64_uid) {
		var url_path = '<?php echo base_url(); ?>users';
		if (confirm("<?php echo $text_change_status; ?>")) {
			$.ajax({
				url: '<?php echo base_url(); ?>user/user/changeStatus',
				method: 'POST',
				data: {b64_uid: b64_uid},
				dataType: 'json',	
				success: function(json){
					if(json['success'] == 1) {
						window.location = url_path;
					}						
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		} else {
			return false;
		}
	}
</script>