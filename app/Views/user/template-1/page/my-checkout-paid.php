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
					<button type="button" class="hov-btn3 stext-111 cl2 plh3 size-116 p-l-62 p-r-30">Manual</button>
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

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="fa fa-sticky-note-o "></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Note
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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