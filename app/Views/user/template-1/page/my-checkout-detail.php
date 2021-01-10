<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="<?= base_url ?>my/checkout" class="stext-109 cl8 hov-cl1 trans-04">
			My checkout
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			<?= $title ?>
		</span>
	</div>
</div>
	

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
							</tr>

							<!-- CART LIST -->
							<?php $total_price = 0; ?>
							<?php foreach($records as $cart) : ?>

								<?php $total_price = (int)$total_price + (int)$cart['card_total_price'];  ?>
								
								<input type="hidden" name="prod-id[]" value="<?= $cart['card_id'] ?>">
								<tr class="table_row text-center">
									<td class="column-1">
										<div class="how-itemcart1" onclick="delete_cart(<?= $cart['card_id'] ?>, true)">
											<img src="<?= base_url ?>catalog/product/<?= $cart['prod_image'] ?>" alt="<?= $cart['prod_name'] ?>">
										</div>
									</td>
									<td class="column-2"><?= $cart['prod_name'] ?> | Size <?= $cart['size_name'] ?> | Color <?= $cart['color_name'] ?></td>
									<td class="column-3"><?= nominal($cart['prod_price']) ?></td>
									<td class="column-4">
										<h5><b><?= $cart['card_qty'] ?></b></h5>
									</td>
									<td class="column-5"><?= nominal($cart['card_total_price']) ?></td>
								</tr>
							<?php endforeach ?>
							<!-- # CART LIST -->

						</table>
					</div>
				</div>
			</div>

			<!-- CART TOTAL -->
			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?= nominal($total_price) ?>
							</span>
						</div>
					</div>

					<!-- SHIPPING DETAIL -->
					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping Detail:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">Courir : <?= $checkout['checs_aggent'] ?></p>
							<p class="stext-111 cl6 p-t-2">From : <?= $checkout['checs_from_city'] ?> <?= $checkout['checs_from_province'] ?></p>
							<p class="stext-111 cl6 p-t-2">To : <?= $checkout['checs_to_city'] ?> <?= $checkout['checs_to_province'] ?></p>
						</div>
						<div class="p-t-15">
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th>Check</th>
										<th>Service</th>
										<th>Price</th>
										<th>Estimated Days</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									<td><input type="radio" checked></td>
									<td><?= $checkout['checs_service_description'] ?></td>
									<td><?= nominal($checkout['checs_cost']) ?></td>
									<td><?= $checkout['checs_etd'] ?></td>
								</tr>
								</tbody>
							</table>
								
						</div>
					</div>

					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								<?= nominal($checkout['check_total']) ?>
							</span>
						</div>
					</div>

					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Status:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2 text-primary">
								<?= $checkout['check_status_value'] ?>
							</span>
							<br>
							<br>
							<button class="btn btn-danger btn-md">Cancel</button>
							<a href="<?= base_url ?>my/checkout/list/paid/by?id=<?= $checkout['check_code'] ?>" class="btn btn-success btn-md">Paid</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>