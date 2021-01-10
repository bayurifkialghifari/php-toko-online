<?php
	
	namespace App\Controllers\Admin\Catalog;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Tags as Tagss;

	Class Tags extends Controller
	{
		/**
		* Load View Tags
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Tags data
			$data = Tagss::all();

			// Load view
			view('admin/main-page', [
				'page' => 'catalog/tag',
				'title' => 'Tag',
				'records' => $data,
				'plugin' => 'datatables',
				'navigation' => ['Catalog'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Catalog',
				'breadcrumb_3' => 'Tag',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Tags
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Tags data
			$data = parent::all();
			$exe = Tagss::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Tags
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Tags data
			$data = parent::all();
			$exe = Tagss::update(['tage_id' => $data['tage_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Tags
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Tags data
			$exe = Tagss::delete(['tage_id' => parent::all()['tage_id']]);

			echo json_encode($exe);
		}
	}