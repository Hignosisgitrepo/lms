<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

	<div class="pt-32pt">
		<div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
			<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

				<div class="mb-24pt mb-sm-0 mr-sm-24pt">
					<h2 class="mb-0">Shopping Cart</h2>

					<ol class="breadcrumb p-0 m-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>

						<li class="breadcrumb-item active">

							Shopping Cart

						</li>

					</ol>

				</div>
			</div>

		</div>
	</div>

	<div class="container page__container page__container page-section">
		<div class="page-separator">
			<div class="page-separator__text"><?php echo $total; ?> Trainings in cart</div>
		</div>
		<?php if($trainings) { ?>
		<div class="row">
          <div class="col-md-8">
			<div class="posts-cards mb-24pt">
				<?php foreach($trainings as $item) {?><div class="card posts-card">
					<div class="posts-card__content d-flex  flex-wrap">
						<div class="avatar avatar-lg mr-3">
							<img src="<?php echo $item['training_image']; ?>"
									 alt="avatar"
									 class="avatar-img rounded">
						</div>
						<div class="posts-card__title flex d-flex flex-column" style="max-width:500px">
							<strong><?php echo $item['training_name']; ?></strong>
							<small class="text-50">By <?php echo $item['trainer_name']; ?></small>
						</div>
						<div class="d-flex align-items-center flex-column flex-sm-row posts-card__meta" style="margin:15px">
							
							<div class="media mr-2 ml-sm-auto align-items-center">
								<div class="media-left mr-2 avatar-group">
									<h4><?php echo $item['price']; ?></h4>
								</div>
							</div>

							
						</div>
						
						<div class="mr-3 text-right text-50 text-uppercase posts-card__tag d-flex align-items-right" style="margin:15px">
							<small><a onclick="deleteCart('<?php echo $item['cart_id']; ?>');" class="btn btn-danger">
									
							<i class="fa fa-times" aria-hidden="true"></i>
									
							</a></small>
						</div>
					</div>
				  </div>
				<?php } ?>
			</div>
		  </div>
		  <div class="col-md-4">
			<div class="card">
				<div class="list-group list-group-flush">
					<div class="list-group-item d-flex">
						<h4>Total : <?php echo $total_sum; ?></h4>
					</div>
				</div>
				<div class="card-header text-center">
					<a href="<?php echo base_url(); ?>checkout" class="btn btn-accent">Checkout</a>
				</div>
			</div>
		  </div>
		</div>
	  <?php } else { ?>
		<div class="card posts-card">
			Your cart is empty!
		</div>
	  <?php } ?>
	</div>

</div>