<?php 
	
	// PRODUCT FUNCTION
	use App\Models\Product;
	use App\Models\Category;
	use App\Liblaries\Pagination;

	// PRODUCT MODEL
	$product = new Product;

	// NUMBER PAGINATION
	if(isset($page_now))
	{
		$page_now = $page_now;
	}
	else
	{
		$page_now = 1;
	}

	// PAGINATION
	$no_of_record = 16;
	$offset = ((int)$page_now - 1) * (int)$no_of_record;

	// ALL DATA PRODUCT
	$data_all = $product->all();
	$data_all = $data_all->num_rows;

	// DATA PAGINATE
	$data = $product->select('*')
	->leftJoin('category', 'prod_cate_id', 'cate_id')
	->paginate($offset, $no_of_record)
	->get();


	// CATEGORY PRODUCT
	$category = Category::all();


	// CREATE PAGINATION
	$pagination = Pagination::create_link($data_all, 16, [
		'href' => base_url . 'user/product/list/paginate',
		'page_now' => $page_now,
		'ul_class' => 'pagination justify-content-center',
		'li_class' => 'page-item',
		'anchor_class' => 'page-link',
	]);
	
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

<!-- Product -->
<section class="bg0 p-t-23 p-b-130">
	<div class="container">

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>

				<?php foreach($category as $c) : ?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?= $c['cate_name'] ?>">
						<?= $c['cate_name'] ?>
					</button>
				<?php endforeach ?>
				
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<!-- Filter Button -->
				<!-- TEMPLATE FILTER -->

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>
			
			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
				</div>	
			</div>

			<!-- Filter -->
			<!-- TEMPLATE FILTER -->

		</div>

		<div class="row isotope-grid">
			<!-- PRODUCT LIST -->
			<?php foreach($data as $r) : ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?= $r['cate_name'] ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0 label-new" data-label="<?= $r['cate_name'] ?>">
							<img src="<?= base_url ?>catalog/product/<?= $r['prod_image'] ?>" alt="<?= $r['prod_name'] ?>">

							<a href="<?= base_url ?>user/product-detail/<?= $r['prod_id'] ?>|<?= $r['prod_url'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?= base_url ?>user/product-detail/<?= $r['prod_url'] ?>+<?= $r['prod_id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $r['prod_name'] ?>
								</a>

								<span class="stext-105 cl3">
									<?= nominal($r['prod_price']) ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" onclick="addWish(event, this)" prod-id="<?= $r['prod_id'] ?>" prod-name="<?= $r['prod_name'] ?>" prod-status="false">
									<img class="icon-heart1 dis-block trans-04" src="<?= base_url ?>assets/template-1/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?= base_url ?>assets/template-1/images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<!-- # PRODUCT LIST -->
		</div>

		<!-- Load More -->
		<div class="flex-c-m flex-w w-full p-t-38">
			<nav aria-label="Page navigation example">
				<?= $pagination ?>
			</nav>
		</div>

	</div>
</section>