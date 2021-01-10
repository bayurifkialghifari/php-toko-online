<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="<?= base_url ?>auth/register" class="stext-109 cl8 hov-cl1 trans-04">
			Register
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
				<h4 class="mtext-105 cl2 txt-center p-b-30">
					<?= $title ?>
				</h4>
				<p>
					You will get a verification email from us, please open the email and click verify.
					<br>
					<br>
					If it has been clicked and successful, please try logging in with the account that you registered earlier
				</p>
			</div>

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="fa fa-sign-in"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Sign In
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							<a href="<?= base_url ?>auth">Your email has been verified ?, Sign In now !</a>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>