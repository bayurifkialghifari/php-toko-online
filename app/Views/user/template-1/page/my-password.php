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

<!-- My account -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form method="post" action="<?= base_url ?>my/password-change">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						<?= $title ?>
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="old_pass" placeholder="Your Old Password" autocomplete="off" required>
						<div class="how-pos4 pointer-none">
							<i class="fa fa-lock"></i>
						</div>
					</div>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="new_pass" id="new_pass" placeholder="Your New Password" autocomplete="off" required>
						<div class="how-pos4 pointer-none">
							<i class="fa fa-lock"></i>
						</div>
					</div>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="r_new_pass" id="r_new_pass" placeholder="Repeat Your New Password" autocomplete="off" required>
						<div class="how-pos4 pointer-none">
							<i class="fa fa-lock"></i>
						</div>
					</div>

					<button id="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						Save
					</button>
				</form>
			</div>

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="fa fa-user"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							My Account
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							<a href="<?= base_url ?>my/account">View Account</a>
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="zmdi zmdi-shopping-cart"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							My Checkout
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							<a href="<?= base_url ?>my/checkout">View Checkout List</a>
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="zmdi zmdi-shopping-cart"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							My Cart
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							<a href="<?= base_url ?>my/cart">View Cart</a>
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="zmdi zmdi-favorite-outline"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							My Wishlist
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							<a href="<?= base_url ?>my/wishlist">View Wishlist</a>
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="fa fa-sign-out"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							<a href="#" onclick="logout(event)">Logout</a>
						</span>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>