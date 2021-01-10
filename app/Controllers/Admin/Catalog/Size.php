<?php
	
	namespace App\Controllers\Admin\Catalog;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Category;
	use App\Models\Size as Sizes;

	Class Size extends Controller
	{
		/**
		* Load View Size
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Size data
			$data = new Sizes;
			$data = $data->select('*')
			->leftJoin('category', 'category.cate_id', 'size.size_category_id')
			->get();

			// Category data
			$category = Category::all();

			// Load view
			view('admin/main-page', [
				'page' => 'catalog/size',
				'title' => 'Size',
				'records' => $data,
				'category' => $category,
				'plugin' => 'datatables',
				'navigation' => ['Catalog'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Catalog',
				'breadcrumb_3' => 'Size',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Size
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Size data
			$data = parent::all();
			$exe = Sizes::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Size
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Size data
			$data = parent::all();
			$exe = Sizes::update(['size_id' => $data['size_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Size
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Size data
			$exe = Sizes::delete(['size_id' => parent::all()['size_id']]);

			echo json_encode($exe);
		}
	}