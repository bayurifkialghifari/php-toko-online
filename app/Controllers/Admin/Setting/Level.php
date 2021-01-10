<?php
	
	namespace App\Controllers\Admin\Setting;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Level as Levels;

	Class Level extends Controller
	{
		/**
		* Load View Level
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Level data
			$data = Levels::all();

			// Load view
			view('admin/main-page', [
				'page' => 'setting/level',
				'title' => 'Level',
				'records' => $data,
				'plugin' => 'datatables',
				'navigation' => ['Setting'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Setting',
				'breadcrumb_3' => 'Level',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Level
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Level data
			$data = parent::all();
			$exe = Levels::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Level
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Level data
			$data = parent::all();
			$exe = Levels::update(['lev_id' => $data['lev_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Level
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Level data
			$exe = Levels::delete(['lev_id' => parent::all()['lev_id']]);

			echo json_encode($exe);
		}
	}