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
	
		<!-- FROM UPLOAD PAYMENT  -->
		<?php if($checkout['checp_status_value'] === 'SETTLEMENT' or $checkout['checp_status_value'] === 'FAILURE') : ?>
		<?php else: ?>
			<form action="<?= base_url ?>my/checkout/paid/by/manual" method="post" id="upload-view" enctype="multipart/form-data" style="display: <?= ($checkout['checp_type'] === 'manual') ? 'block' : 'none' ?>">
				<input type="hidden" name="check_code" value="<?= $checkout['check_code'] ?>">
				<div class="size-212 p-t-2">
					<span class="mtext-110 cl2">
						<i class="fa fa-upload"></i> Proof of Payment Upload
					</span>
					<br>
					<br>

					<!-- Payment Data -->
					<label>BANK</label>
					<div class="bor8 m-b-20 how-pos4-parent">
						<select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required name="bank">
							<option selected disabled>--BANK--</option>
							<option <?= ($checkout['checp_bank'] === 'bca') ? 'selected' : '' ?> value="bca">BCA</option>
							<option <?= ($checkout['checp_bank'] === 'bni') ? 'selected' : '' ?> value="bni">BNI</option>
							<option <?= ($checkout['checp_bank'] === 'bri') ? 'selected' : '' ?> value="bri">BRI</option>
						</select>
						<div class="how-pos4 pointer-none">
							<i class="fa fa-bank"></i>
						</div>
					</div>

					<label>ACCOUNT NUMBER</label>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input type="number" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" placeholder="Account number" required name="account_number" value="<?= $checkout['checp_account_number'] ?>">
						<div class="how-pos4 pointer-none">
							<i class="fa fa-user"></i>
						</div>
					</div>

					<label>PROOF OF PAYMENT </label>
					<input type="file" accept="image/*" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="proof_of_payment" name="proof_of_payment">
					<div class="text-center">
						<img id="payment-proof-image" width="25%" src="<?= ($checkout['checp_file'] !== '') ? base_url . 'transaction/proof/' . $checkout['checp_file'] : '' ?>">
					</div>
					<br>

					<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						SAVE
					</button>

					<p class="stext-115 cl6 p-t-18">
						* File can be emptied.
					</p>

					<br>
				</div>
			</form>
		<?php endif ?>

		<!-- Row data detail checkout -->
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
							<?php if($checkout['checp_type'] === '') : ?>
								<br>
								<br>
								<button class="btn btn-danger btn-md" onclick="cancel(<?= $checkout['check_code'] ?>)">Cancel</button>
								<a href="<?= base_url ?>my/checkout/list/paid/by?id=<?= $checkout['check_code'] ?>" class="btn btn-success btn-md">Paid</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>