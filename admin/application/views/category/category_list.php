<!-- Header Layout Content -->
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
										<a href="<?php echo base_url().'add-category'; ?>" class="btn btn-outline-secondary"><?php echo $text_add; ?></a>
                                    </div>
                                </div>

                            </div>
                        </div>

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
													   data-sort="js-lists-values-categoryname"><?php echo $text_categoryname; ?></a>
												</th>
												<th>
													<a href="javascript:void(0)"
													   class="sort"
													   data-sort="js-lists-values-email"><?php echo $text_status; ?></a>
												</th>
												<th class="pl-0"><?php echo $text_action; ?></th>
											</tr>
										</thead>
										<tbody class="list"
											   id="search">
											<?php if(!empty($categories)) { ?>
											  <?php foreach($categories as $res): ?>
												<tr>

													<td>

														<div class="d-flex flex-column">
															<p class="mb-0"><strong class="js-lists-values-categoryname"><?php echo $res['category_name']; ?> </strong></p>
														</div>

													</td>
													<td><?php echo $res['status_name']; ?></td>
													<td>
														<?php $b64_cid = urlencode(base64_encode($res['category_id'])); ?>
														<a type="button" class="btn btn-dark" href="<?php echo base_url().'edit-category/'.$b64_cid; ?>">
															<i class="material-icons">edit</i>
														</a>
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