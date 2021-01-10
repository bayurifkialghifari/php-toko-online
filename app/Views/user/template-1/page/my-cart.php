<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
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
					<form method="post" action="<?= base_url ?>my/cart/update-my-cart">
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
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>
												<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product[]" value="<?= $cart['card_qty'] ?>" readonly>

												
												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>
										<td class="column-5"><?= nominal($cart['card_total_price']) ?></td>
									</tr>
								<?php endforeach ?>
								<!-- # CART LIST -->

								<?php if($total_price == 0) : ?>
									<tr class="table_row text-center">
										<td colspan="5"><h1>Cart is empty</h1></td>
									</tr>
								<?php endif ?>

							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<!-- <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div> -->
							</div>

							<button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</button>
						</div>
					</form>
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

					<!-- SHIPPING -->
					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">
								There are no shipping methods available. Please double check your city, or contact us if you need any help.
							</p>
							
							<div class="p-t-15">
								<form id="shipping-form">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<input type="hidden" id="cart_id" value="<?= $cart['cart_id'] ?>">
									<input type="hidden" id="total_price" value="<?= $total_price ?>">

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" id="courier">
											<option disabled selected>Select a courier...</option>
											<option value="jne">JNE</option>
	                                        <option value="tiki">TIKI</option>
	                                        <option value="pos">POS INDONESIA</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select id="destination" name="destination">
										</select>
									</div>

									<!-- <div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div> -->
									
									<div class="flex-w">
										<button type="submit" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Calculate cost
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- SHIPPING DETAIL -->
					<div class="flex-w flex-t bor12 p-t-15 p-b-30" id="shipping-detail" style="display: none">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping Detail:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">Courir : <span id="courier-shipping">JNE</span></p>
							<p class="stext-111 cl6 p-t-2">From : <span id="from-shipping">Cimahi</span></p>
							<p class="stext-111 cl6 p-t-2">To : <span id="destination-shipping">Bandung</span></p>
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
								<tbody id="detail-table-body">
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
							<span class="mtext-110 cl2" id="total-price-shipping">
								<?= nominal($total_price) ?>
							</span>
						</div>
					</div>

					<?php if($total_price > 0) : ?>
						<button id="submit-chekout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					<?php else: ?>
						<a href="<?= base_url ?>user/product-list" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Continue Shopping
						</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>