<?php
	
	namespace App\Controllers\Admin\Website;

	use App\Core\Controller;
	use App\Core\Model;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Banner_setting;

	Class Banner extends Controller
	{
		/**
		* Load View Banner
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Banner data
			$slider = new Banner_setting; 
			$data = $slider->select('*')
			->leftJoin('menu', 'banner_setting.bann_menu_id', 'menu.menu_id')
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
				'page' => 'website/banner',
				'title' => 'Banner',
				'records' => $data,
				'menu' => $menu,
				'plugin' => 'datatables',
				'navigation' => ['Website'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Website',
				'breadcrumb_3' => 'Banner',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Banner
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Banner data
			$data = parent::post_all();
			
			// Image
			if(isset($_FILES['image']))
			{
				$data = array_merge($data, ['bann_image' => Upload::execute('image', ['folder' => 'website/banner/', 'max_size' => 500000])]);
			}

			// Banner data save
			$exe = Banner_setting::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Banner
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Banner data
			$data = parent::post_all();

			// Image
			if(isset($_FILES['image']))
			{
				$data = array_merge($data, ['bann_image' => Upload::execute('image', ['folder' => 'website/banner/', 'max_size' => 500000])]);
			}

			// Banner data save
			$exe = Banner_setting::update(['bann_id' => $data['bann_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Banner
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Banner data
			$exe = Banner_setting::delete(['bann_id' => parent::all()['bann_id']]);
			
			echo json_encode($exe);
		}
	}