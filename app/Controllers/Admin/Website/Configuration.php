<?php
	
	namespace App\Controllers\Admin\Website;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Web_setting;

	Class Configuration extends Controller
	{
		/**
		* Load View Configuration
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Configuration data
			$data = Web_setting::all();

			// Load view
			view('admin/main-page', [
				'page' => 'website/configuration',
				'title' => 'Configuration',
				'records' => $data->fetch_assoc(),
				'navigation' => ['Website'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Website',
				'breadcrumb_3' => 'Configuration',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Save Data Configuration
		*/
		public function save()
		{
			Sesion::cekBelum();

			// Configuration data
			$data = parent::post_all();

			// Logo
			if(isset($_FILES['logo']))
			{
				$data = array_merge($data, ['web_logo' => Upload::execute('logo', ['folder' => 'website/configuration/'])]);
			}

			// Icon
			if(isset($_FILES['icon']))
			{
				$data = array_merge($data, ['web_icon' => Upload::execute('icon', ['folder' => 'website/configuration/'])]);
			}

			// Configuration data save
			$exe = Web_setting::update(['web_id' => 1], $data);

			echo json_encode($exe);
		}
	}