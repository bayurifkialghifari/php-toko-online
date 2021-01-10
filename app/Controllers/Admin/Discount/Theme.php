<?php
	
	namespace App\Controllers\Admin\Discount;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Discount_theme;

	Class Theme extends Controller
	{
		/**
		* Load View Theme
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Theme data
			$data = Discount_theme::all();

			// Load view
			view('admin/main-page', [
				'page' => 'discount/theme',
				'title' => 'Theme',
				'records' => $data,
				'plugin' => 'datatables',
				'navigation' => ['Discount'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Discount',
				'breadcrumb_3' => 'Theme',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Theme
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Theme data
			$data = parent::all();
			$exe = Discount_theme::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Theme
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Theme data
			$data = parent::all();
			$exe = Discount_theme::update(['dist_id' => $data['dist_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Theme
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Theme data
			$exe = Discount_theme::delete(['dist_id' => parent::all()['dist_id']]);

			echo json_encode($exe);
		}
	}