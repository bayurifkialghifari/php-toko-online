<?php  
	use App\Models\Category;
	use App\Models\Blog;

	$category = Category::all();
	$blog = new Blog; 
	$blog_data = $blog->select('*, blog.*')
	->leftJoin('category', 'category.cate_id', 'blog.blog_cate_id')
	->leftJoin('user', 'user.user_id', 'blog.bolg_user_id')
	->get();
?>

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

<!-- Blog -->
<section class="bg0 p-t-62 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">
					<!-- item blog -->
					<?php foreach($blog_data as $b) : ?>
						<div class="p-b-63">
							<a href="<?= base_url ?>blog-detail?id=<?= $b['blog_id'] ?>" class="hov-img0 how-pos5-parent">
								<img src="<?= base_url ?>website/blog/<?= $b['blog_thumbnal'] ?>" alt="IMG-BLOG">

								<div class="flex-col-c-m size-123 bg9 how-pos5">

									<span class="stext-109 cl3 txt-center">
										<?= date_text($b['created_at']) ?>
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="<?= base_url ?>blog-detail?id=<?= $b['blog_id'] ?>" class="ltext-108 cl2 hov-cl1 trans-04">
										<?= $b['blog_title'] ?>
									</a>
								</h4>

								<p class="stext-117 cl6">
									<?= substr($b['blog_content'], 0, 250) . ' ........' ?>
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> <?= $b['user_name'] ?>  
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											<?= $b['cate_name'] ?>
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<!-- <span>
											8 Comments
										</span> -->
									</span>

									<a href="<?= base_url ?>blog-detail?id=<?= $b['blog_id'] ?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

					<!-- Pagination -->
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