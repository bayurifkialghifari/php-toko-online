<?php 
  
    // PRODUCT FUNCTION
    use App\Models\Product;
    use App\Models\Category;

    $product = new Product; 
    $data = $product->select('*')
    ->leftJoin('category', 'prod_cate_id', 'cate_id')
    ->limit('16')
    ->get();

    // CATEGORY PRODUCT
    $category = Category::all();
  
?>

<!-- Banner Home -->
<div class="sec-banner bg0 p-t-95 p-b-55">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="<?= base_url ?>assets/template-1/images/banner-04.jpg" alt="IMG-BANNER">

                    <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Women
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                New Trend
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="<?= base_url ?>assets/template-1/images/banner-05.jpg" alt="IMG-BANNER">

                    <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Men
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                New Trend
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="<?= base_url ?>assets/template-1/images/banner-07.jpg" alt="IMG-BANNER">

                    <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Watches
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                Spring 2018
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="<?= base_url ?>assets/template-1/images/banner-08.jpg" alt="IMG-BANNER">

                    <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Bags
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                Spring 2018
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="<?= base_url ?>assets/template-1/images/banner-09.jpg" alt="IMG-BANNER">

                    <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Accessories
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                Spring 2018
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
        </div>

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
            <a href="<?= base_url ?>user/product-list" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04" style="border:1px solid #222">
                LOAD MORE
            </a>
        </div>

    </div>
</section>