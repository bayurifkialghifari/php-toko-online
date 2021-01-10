<?php
	
	namespace App\Controllers\Admin\Catalog;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Category as Categorys;

	Class Category extends Controller
	{
		/**
		* Load View Category
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Category data
			$data = Categorys::all();

			// Load view
			view('admin/main-page', [
				'page' => 'catalog/category',
				'title' => 'Category',
				'records' => $data,
				'plugin' => 'datatables',
				'navigation' => ['Catalog'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Catalog',
				'breadcrumb_3' => 'Category',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Category
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Category data
			$data = parent::all();
			$exe = Categorys::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Category
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Category data
			$data = parent::all();
			$exe = Categorys::update(['cate_id' => $data['cate_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Category
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Category data
			$exe = Categorys::delete(['cate_id' => parent::all()['cate_id']]);

			echo json_encode($exe);
		}
	}