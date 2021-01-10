<?php
	
	namespace App\Controllers\Admin\Website;

	use App\Core\Controller;
	use App\Core\Model;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Slider_setting;

	Class Slider extends Controller
	{
		/**
		* Load View Slider
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Slider data
			$slider = new Slider_setting; 
			$data = $slider->select('*')
			->leftJoin('menu', 'slider_setting.slide_menu_id', 'menu.menu_id')
			->get();

			// Parent Menu List
			$model = new Model;
			$menu = $model->select('*')
			->from('menu a')
			->leftJoin('role_menu b', 'a.menu_id', 'b.role_menu_id')
			->leftJoin('level c', 'b.role_lev_id', 'c.lev_id')
			->where('c.lev_name', 'Customer')
			->get();

			// Load view
			view('admin/main-page', [
				'page' => 'website/slider',
				'title' => 'Slider',
				'records' => $data,
				'menu' => $menu,
				'plugin' => 'datatables',
				'navigation' => ['Website'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Website',
				'breadcrumb_3' => 'Slider',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Slider
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Slider data
			$data = parent::post_all();

			// Image
			if(isset($_FILES['image']))
			{
				$data = array_merge($data, ['slide_image' => Upload::execute('image', ['folder' => 'website/slide/', 'max_size' => 500000])]);
			}

			// Slider data save
			$exe = Slider_setting::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Slider
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Slider data
			$data = parent::post_all();

			// Image
			if(isset($_FILES['image']))
			{
				$data = array_merge($data, ['slide_image' => Upload::execute('image', ['folder' => 'website/slide/', 'max_size' => 500000])]);
			}

			// Slider data save
			$exe = Slider_setting::update(['slide_id' => $data['slide_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Slider
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Slider data
			$exe = Slider_setting::delete(['slide_id' => parent::all()['slide_id']]);
			
			echo json_encode($exe);
		}
	}