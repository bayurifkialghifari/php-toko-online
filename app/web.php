<?php

	use App\Core\Route;

	$app 			= new Route;

	// Router
	$app->add('/', '\User\Page');





	/*---------------------------------------------*/
	
	/*---------------------------------------------*/
	
	/* 				ADMIN ROUTE LIST 			   */		

	/*---------------------------------------------*/

	/*---------------------------------------------*/





	// Login Admin
	$app->add('/admin/login', '\Admin\Login');
	$app->add('/admin/login/post', '\Admin\Login', 'auth', 'post');
	$app->add('/admin/login/logout', '\Admin\Login', 'logout');
	
	// Dashboard
	$app->add('/admin/dashboard', '\Admin\Dashboard');
	
	// Catalog Category
	$app->add('/admin/catalog-category', '\Admin\Catalog\Category');
	$app->add('/admin/catalog-category-create', '\Admin\Catalog\Category', 'create', 'post');
	$app->add('/admin/catalog-category-update', '\Admin\Catalog\Category', 'update', 'put');
	$app->add('/admin/catalog-category-delete', '\Admin\Catalog\Category', 'destroy', 'delete');

	// Catalog Product
	$app->add('/admin/catalog-product', '\Admin\Catalog\Product');
	$app->add('/admin/catalog-product-create', '\Admin\Catalog\Product', 'create', 'post');
	$app->add('/admin/catalog-product-update', '\Admin\Catalog\Product', 'update', 'post');
	$app->add('/admin/catalog-product-delete', '\Admin\Catalog\Product', 'destroy', 'delete');

	// Catalog Color
	$app->add('/admin/catalog-color', '\Admin\Catalog\Color');
	$app->add('/admin/catalog-color-create', '\Admin\Catalog\Color', 'create', 'post');
	$app->add('/admin/catalog-color-update', '\Admin\Catalog\Color', 'update', 'put');
	$app->add('/admin/catalog-color-delete', '\Admin\Catalog\Color', 'destroy', 'delete');

	// Catalog Size
	$app->add('admin/catalog-size', '\Admin\Catalog\Size');
	$app->add('admin/catalog-size-create', '\Admin\Catalog\Size', 'create', 'post');
	$app->add('admin/catalog-size-update', '\Admin\Catalog\Size', 'update', 'put');
	$app->add('admin/catalog-size-delete', '\Admin\Catalog\Size', 'destroy', 'delete');

	// Catalog Tags
	$app->add('/admin/catalog-tags', '\Admin\Catalog\Tags');
	$app->add('/admin/catalog-tags-create', '\Admin\Catalog\Tags', 'create', 'post');
	$app->add('/admin/catalog-tags-update', '\Admin\Catalog\Tags', 'update', 'put');
	$app->add('/admin/catalog-tags-delete', '\Admin\Catalog\Tags', 'destroy', 'delete');

	// Discount Theme
	$app->add('/admin/discount-theme', '\Admin\Discount\Theme');
	$app->add('/admin/discount-theme-create', '\Admin\Discount\Theme', 'create', 'post');
	$app->add('/admin/discount-theme-update', '\Admin\Discount\Theme', 'update', 'put');
	$app->add('/admin/discount-theme-delete', '\Admin\Discount\Theme', 'destroy', 'delete');

	// Setting Level
	$app->add('/admin/setting/level', '\Admin\Setting\Level');
	$app->add('/admin/setting/level-create', '\Admin\Setting\Level', 'create', 'post');
	$app->add('/admin/setting/level-update', '\Admin\Setting\Level', 'update', 'put');
	$app->add('/admin/setting/level-delete', '\Admin\Setting\Level', 'destroy', 'delete');

	// Setting Menu
	$app->add('/admin/setting/menu', '\Admin\Setting\Menu');
	$app->add('/admin/setting/menu-create', '\Admin\Setting\Menu', 'create', 'post');
	$app->add('/admin/setting/menu-update', '\Admin\Setting\Menu', 'update', 'put');
	$app->add('/admin/setting/menu-delete', '\Admin\Setting\Menu', 'destroy', 'delete');

	// Setting Role Menu
	$app->add('/admin/setting/role-menu', '\Admin\Setting\RoleMenu');
	$app->add('/admin/setting/role-menu-submnu/:id', '\Admin\Setting\RoleMenu', 'sub_menu');
	$app->add('/admin/setting/role-menu-create', '\Admin\Setting\RoleMenu', 'create', 'post');
	$app->add('/admin/setting/role-menu-update', '\Admin\Setting\RoleMenu', 'update', 'put');
	$app->add('/admin/setting/role-menu-delete', '\Admin\Setting\RoleMenu', 'destroy', 'delete');

	// Webiste Configuration
	$app->add('/admin/website-setting', '\Admin\Website\Configuration');
	$app->add('/admin/website-setting-post', '\Admin\Website\Configuration', 'save', 'post');

	// Website Slider
	$app->add('/admin/website-slider', '\Admin\Website\Slider');
	$app->add('/admin/website-slider-create', '\Admin\Website\Slider', 'create', 'post');
	$app->add('/admin/website-slider-update', '\Admin\Website\Slider', 'update', 'post');
	$app->add('/admin/website-slider-delete', '\Admin\Setting\Slider', 'destroy', 'delete');

	// Website Banner
	$app->add('/admin/website-banner', '\Admin\Website\Banner');
	$app->add('/admin/website-banner-create', '\Admin\Website\Banner', 'create', 'post');
	$app->add('/admin/website-banner-update', '\Admin\Website\Banner', 'update', 'post');
	$app->add('/admin/website-banner-delete', '\Admin\Website\Banner', 'destroy', 'delete');





	/*---------------------------------------------*/
	
	/*---------------------------------------------*/
	
	/* 				USER ROUTE LIST 			   */		

	/*---------------------------------------------*/

	/*---------------------------------------------*/





	// User Login
	$app->add('/auth', '\User\Login');
	$app->add('/auth/login_post', '\User\Login', 'auth', 'post');
	$app->add('/auth/register', '\User\Login', 'register');
	$app->add('/auth/register_post', '\User\Login', 'register_post', 'post');
	$app->add('/auth/after_register', '\User\Login', 'after_register');
	$app->add('/auth/mail/register/verify/value-token/:token', '\User\Login', 'register_verify');
	$app->add('/auth/logout', '\User\Login', 'logout');

	// My Page
	$app->add('/my/account', '\User\My', 'account');
	$app->add('/my/cart', '\User\My', 'cart');
	$app->add('/my/checkout', '\User\My', 'checkout');
	$app->add('/my/wishlist', '\User\My', 'wishlist');
	

	// Action Account 
	$app->add('/my/account-change', '\User\Account', 'account_change', 'post');

	// Action Shipping
	$app->add('/shipping/province', '\User\Shipping', 'province', 'post');
	$app->add('/shipping/city', '\User\Shipping', 'city', 'post');
	$app->add('/shipping/cost', '\User\Shipping', 'calculate', 'post');

	// Action Cart
	$app->add('/my/cart/get-my-cart', '\User\Cart', 'get_my_cart');
	$app->add('/my/cart/add-to-cart', '\User\Cart', 'add_to_cart', 'post');
	$app->add('/my/cart/update-my-cart', '\User\Cart', 'update_cart', 'post');
	$app->add('/my/cart/delete-my-cart', '\User\Cart', 'delete_cart', 'post');

	// Action Checkout
	$app->add('/my/checkout-create', '\User\Checkout', 'create', 'post');
	$app->add('/my/checkout/list/detail/by/id/:id', '\User\Checkout', 'checkout_detail');
	$app->add('/my/checkout/list/paid/by', '\User\Checkout', 'paid_by_id');
	$app->add('/my/checkout/paid/by/midtrans', '\User\Checkout', 'get_token_midtrans', 'post');
	$app->add('/my/checkout/paid/by/manual', '\User\Checkout', 'post_manual', 'post');


	// User Page
	$app->add('/user/product-detail/:url', '\User\Page', 'detail');
	$app->add('/user/product/list/paginate/:page', '\User\Page', 'product_paginate');
	$app->add('/user/:page', '\User\Page', 'page');

	$app->run('/');
