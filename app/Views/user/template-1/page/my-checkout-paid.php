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

		<a href="<?= base_url ?>my/checkout/list/detail/by/id/16101917473837" class="stext-109 cl8 hov-cl1 trans-04" id="code-checkout-href">
			Detail Code <span id="code-checkout-html"></span>
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			<?= $title ?>
		</span>
	</div>
</div>

<!-- My transaction -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<h4 class="mtext-105 cl2 txt-center p-b-30">
					<?= $title ?>
				</h4>

				<div class="bor8 m-b-20 how-pos4-parent">
					<button type="button" id="btn-manual" class="hov-btn3 stext-111 cl2 plh3 size-116 p-l-62 p-r-30">Manual</button>
					<div class="how-pos4 pointer-none">
						<i class="fa fa-file"></i>
					</div>
				</div>

				<div class="bor8 m-b-20 how-pos4-parent">
					<button type="button" id="btn-midtrans" class="hov-btn3 stext-111 cl2 plh3 size-116 p-l-62 p-r-30">Midtrans</button>
					<div class="how-pos4 pointer-none">
						<i class="fa fa-exchange"></i>
					</div>
				</div>

			</div>

			<!-- Upload proof of payment -->
			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				
				<form action="<?= base_url ?>my/checkout/paid/by/manual" method="post" enctype="multipart/form-data" class="flex-w w-full p-b-42" id="upload-view" style="display: none">
					<input type="hidden" name="check_code" id="check_code">
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
								<option value="bca">BCA</option>
								<option value="bni">BNI</option>
								<option value="bri">BRI</option>
							</select>
							<div class="how-pos4 pointer-none">
								<i class="fa fa-bank"></i>
							</div>
						</div>

						<label>ACCOUNT NUMBER</label>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input type="number" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" placeholder="Account number" required name="account_number">
							<div class="how-pos4 pointer-none">
								<i class="fa fa-user"></i>
							</div>
						</div>

						<label>PROOF OF PAYMENT </label>
						<input type="file" accept="image/*" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="proof_of_payment" name="proof_of_payment_1">
						<img id="payment-proof-image" width="100%">
						<br>
						<br>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							UPLOAD
						</button>

						<p class="stext-115 cl6 size-213 p-t-18">
							* File can be emptied.
						</p>
					</div>
				</form>

				<!-- Note -->
				<div class="flex-w w-full p-b-42" id="note-view">
					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Note
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<!-- Midtrans Script -->
<script type="text/javascript"
            src="<?= midtrans_snap_js_url ?>"
            data-client-key="<?= midtrans_client_key ?>"></script>