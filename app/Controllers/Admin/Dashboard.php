<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;

	Class Dashboard extends Controller
	{
		/**
		* Load View Login
		*/
		public function index()
		{
			Sesion::cekBelum();
			
			view('admin/main-page', [
				// 'page' => 'setting/menu',
				'title' => 'Dashboard',
				'navigation' => ['Dashboard'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_1_url' => '#',
			]);
		}
	}