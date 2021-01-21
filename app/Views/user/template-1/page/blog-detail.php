<?php  
	use App\Models\Category;

	$category = Category::all()
?>
<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?= base_url ?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="<?= base_url ?>user/blog" class="stext-109 cl8 hov-cl1 trans-04">
				Blog
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?= $records['blog_title'] ?>
			</span>
		</div>
	</div>


	<!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!--  -->
						<div class="wrap-pic-w how-pos5-parent">
							<img src="<?= base_url ?>website/blog/<?= $records['blog_thumbnal'] ?>" alt="IMG-BLOG">
						</div>

						<div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">By</span> <span><?= $records['user_name'] ?></span>  
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									<span><?= $records['created_at'] ?></span>
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									<span><?= $records['cate_name'] ?></span>
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									<?= $records['blog_view'] ?>
								</span>
							</span>

							<h4 class="ltext-109 cl2 p-b-28">
								<?= $records['blog_title'] ?>
							</h4>

							<p class="stext-117 cl6 p-b-26">
								<?= $records['blog_content'] ?>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>

							<ul>
								<?php foreach ($category as $c) : ?>
									<li class="bor18">
										<a href="<?= base_url ?>user/product-list" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
											<?= $c['cate_name'] ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	