<?php
	
	namespace App\Controllers\Admin\Catalog;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Category;
	use App\Models\Color;
	use App\Models\Size;
	use App\Models\Tags;
	use App\Models\Product as Products;

	Class Product extends Controller
	{
		/**
		* Load View Product
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Product data
			$product = new Products; 
			$data = $product->select('*')
			->leftJoin('category', 'prod_cate_id', 'cate_id')
			->get();

			// Category data
			$category = Category::all();

			// Size, Size, Tag data
			$color = Color::all();
			$size = Size::all();
			$tag = Tags::all();

			// Load view
			view('admin/main-page', [
				'page' => 'catalog/product',
				'title' => 'Product',
				'records' => $data,
				'category' => $category,
				'color' => $color,
				'size' => $size,
				'tag' => $tag,
				'plugin' => 'datatables',
				'navigation' => ['Catalog'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Catalog',
				'breadcrumb_3' => 'Product',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Product
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Product data
			$data = parent::post_all();
			
			// Image
			if(isset($_FILES['image']))
			{
				$data = array_merge($data, ['prod_image' => Upload::execute('image', ['folder' => 'catalog/product/', 'max_size' => 500000])]);
			}

			// Upload by
			$data = array_merge($data, ['prod_upload_by' => parent::sess('user_id')]);

			// Product data save
			$exe = Products::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Product
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Product data
			$data = parent::post_all();

			// Image
			if(isset($_FILES['image']))
			{
				$data = array_merge($data, ['prod_image' => Upload::execute('image', ['folder' => 'catalog/product/', 'max_size' => 500000])]);
			}

			// Upload by
			$data = array_merge($data, ['prod_upload_by' => parent::sess('user_id')]);

			// Product data save
			$exe = Products::update(['prod_id' => $data['prod_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Product
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Product data
			$exe = Products::delete(['prod_id' => parent::all()['prod_id']]);
			
			echo json_encode($exe);
		}
	}