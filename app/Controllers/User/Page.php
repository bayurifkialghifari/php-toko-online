<?php
	
	namespace App\Controllers\User;

	use App\Core\Controller;
	use App\Models\Product;

	Class Page extends Controller
	{
		/**
		* Load View Home
		*/
		public function index()
		{
			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/home',
				'title' => 'Home',
				'url' => 'user/home',
			]);
		}

		/**
		* Load View Per Page
		*/
		public function page($page)
		{
			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/' . $page,
				'title' => $page,
			]);
		}

		/**
		* Load View Product Detail Page 
		*/
		public function detail($url)
		{
			$url = explode('|', $url);
			
			// Product detail data
			$prod_id = $url[0];
			$prod_url = $url[1];


			// Get Product detail data by id
			$product = Product::find([
				'prod_id' => $prod_id
			]);
			$product = $product->fetch_assoc();


			// Update Product View
			$update_view = Product::update(['prod_id' => $prod_id], ['prod_views' => (int)$product['prod_views'] + 1]);
			
			
			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/product-detail',
				'product' => $product,
				'title' => 'Product'
			]);
		}

		/**
		* Load View Product Paginate
		*/
		public function product_paginate($page)
		{
			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/product-list',
				'page_now' => $page,
			]);	
		}
	}