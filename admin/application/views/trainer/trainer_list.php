<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

	<!-- Drawer Layout -->
	<div class="mdk-drawer-layout js-mdk-drawer-layout"
		 data-push
		 data-responsive-width="992px">

		<!-- Drawer Layout Content -->
		<div class="mdk-drawer-layout__content page-content">

			<div class="container page__container page-section pb-0">
				<h1 class="h2 mb-0"><?php echo $text_list; ?></h1>
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>
					<li class="breadcrumb-item active"><?php echo $pageTitle; ?></li>
				</ol>
			</div>

			<div class="container page__container page-section">

				<div class="row mb-32pt">
					<div class="col-lg-12 d-flex align-items-center">
						<div class="flex"
							 style="max-width: 100%">

							<div class="card m-0">

								<div class="table-responsive"
									 data-toggle="lists"
									 data-lists-sort-by="js-lists-values-fullname"
									 data-lists-values='["js-lists-values-fullname", "js-lists-values-email", "js-lists-values-phonenumber"]'>

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
													   data-sort="js-lists-values-fullname"><?php echo $text_fullname; ?></a>
												</th>
												<th>
													<a href="javascript:void(0)"
													   class="sort"
													   data-sort="js-lists-values-email"><?php echo $text_email; ?></a>
												</th>

												
												<th>
													<a href="javascript:void(0)"
													   class="sort"
													   data-sort="js-lists-values-phonenumber"><?php echo $text_telephone; ?></a>
												</th>
												<th style="width: 37px;"><?php echo $text_fullname; ?></th>
												<th class="text-right pl-0">Action</th>
											</tr>
										</thead>
										<tbody class="list"
											   id="search">
											<?php if(!empty($trainers)) { ?>
											  <?php foreach($trainers as $res): ?>
												<tr>

													<td>

														<div class="d-flex flex-column">
															<p class="mb-0"><strong class="js-lists-values-fullname"><?php echo $res['first_name']; ?> <?php echo $res['last_name']; ?></strong></p>
														</div>

													</td>

													<td class="text-50 js-lists-values-email"><?php echo $res['email']; ?></td>
													<td class="js-lists-values-phonenumber small"><?php echo $res['phone']; ?></td>

													<td>

														<?php echo $res['status_name']; ?>

													</td>
													<td class="text-right pl-0">
													
													<?php $b64_cid = urlencode(base64_encode($res['customer_id'])); ?>
														<?php $b64_tid = urlencode(base64_encode($res['trainer_id'])); ?>
														<?php if($res['active_status'] == 0) { ?>
															<button type="button" class="btn btn-primary" onclick="activateTrainer('<?php echo $res['trainer_id']; ?>');" data-toggle="tooltip" title="Activate">
																<i class="fa fa-thumbs-up"></i>
															</button>
														<?php } else { ?>
															<a class="btn btn-warning" data-toggle="tooltip" title="Deactivate">
																<i class="fa fa-thumbs-down"></i>
															</a>
															<a class="btn btn-info" data-toggle="tooltip" title="View Courses">
																<i class="fa fa-code"></i>
															</a>
														
															<a  href="<?php echo base_url().'commission/'.$b64_cid; ?>" class="btn btn-success">
															<i class="fa fa-percent"></i>
                                        </a>
														<?php } ?>
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
	function activateTrainer(trainer_id) {
		var url_path = '<?php echo base_url(); ?>trainers';
		$.ajax({
			url: '<?php echo base_url(); ?>trainer/trainer/activateTrainer',
			method: 'POST',
			data: {trainer_id: trainer_id},
			dataType: 'json',	
			success: function(json){
				if(json['success']) {
					window.location = url_path;
				}			
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
</script>