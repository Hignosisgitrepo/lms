<div class="pt-32pt">
	<div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
		<div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

			<div class="mb-24pt mb-sm-0 mr-sm-24pt">
				<h2 class="mb-0">Checkout</h2>

				<ol class="breadcrumb p-0 m-0">
					<ol class="breadcrumb p-0 m-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active">

							Payment Success

						</li>

					</ol>

				</ol>

			</div>
		</div>
	</div>
</div>

<!-- BEFORE Page Content -->

<!-- // END BEFORE Page Content -->

<!-- Page Content -->

<div class="container-fluid page__container">
	<div class="page-section">

		<div class="page-separator">
			<div class="page-separator__text">Overview</div>
		</div>

		<div class="row mb-lg-8pt">
			<div class="col-lg-12">
				<div class="col-md-12 column">
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th class="center">Price</th>
							<th class="center">QTY</th>
							<th class="center">Total</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach($cart['shopping_cart']['items'] as $cart_item) {
							?>
							<tr>
								<td><?php echo $cart_item['id']; ?></td>
								<td><?php echo $cart_item['name']; ?></td>
								<td class="center"> $<?php echo number_format($cart_item['price'],2); ?></td>
								<td class="center"><?php echo $cart_item['qty']; ?></td>
								<td class="center"> $<?php echo round($cart_item['qty'] * $cart_item['price'],2); ?></td>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>
					<div class="row clearfix">
						<div class="col-md-4 column"> </div>
						<div class="col-md-4 column"> </div>
						<div class="col-md-4 column">
							<table class="table">
								<tbody>
								<tr>
									<td><strong> Subtotal</strong></td>
									<td> $<?php echo number_format($cart['shopping_cart']['subtotal'],2); ?></td>
								</tr>
								<tr>
									<td><strong>Shipping</strong></td>
									<td>$<?php echo number_format($cart['shopping_cart']['shipping'],2); ?></td>
								</tr>
								<tr>
									<td><strong>Handling</strong></td>
									<td>$<?php echo number_format($cart['shopping_cart']['handling'],2); ?></td>
								</tr>
								<tr>
									<td><strong>Tax</strong></td>
									<td>$<?php echo number_format($cart['shopping_cart']['tax'],2); ?></td>
								</tr>
								<tr>
									<td><strong>Grand Total</strong></td>
									<td>$<?php echo number_format($cart['shopping_cart']['grand_total'],2); ?></td>
								</tr>
								</tbody>
							</table>
						</div>
						<a class="btn btn-primary" href="<?php echo base_url();?>dashboard">Start over</a>
					</div>
                </div>
            </div>
        </div>

	</div>
</div>

<!-- // END Page Content -->