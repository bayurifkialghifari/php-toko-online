<?php
	
	namespace App\Controllers\Admin\Setting;

	use App\Core\Controller;
	use App\Core\Model;
	use App\Liblaries\Sesion;
	use App\Models\Menu as Menus;

	Class Menu extends Controller
	{
		/**
		* Load View Menu
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Menu data
			$menu = new Model;
			$data = $menu->select(' a.*, b.menu_name as parent ')
			->from('menu a')
			->leftJoin('menu b', 'b.menu_id', 'a.menu_menu_id')
			->get();

			// Parent Menu List
			$parent = Menus::on([
				'menu_menu_id' => 0
			]);

			// Load view
			view('admin/main-page', [
				'page' => 'setting/menu',
				'title' => 'Menu',
				'records' => $data,
				'parent' => $parent,
				'plugin' => 'datatables',
				'navigation' => ['Setting'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Setting',
				'breadcrumb_3' => 'Menu',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Menu
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Menu data
			$data = parent::all();
			$exe = Menus::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Menu
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Menu data
			$data = parent::all();
			$exe = Menus::update(['menu_id' => $data['menu_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Menu
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Menu data
			$exe = Menus::delete(['menu_id' => parent::all()['menu_id']]);
			
			echo json_encode($exe);
		}
	}