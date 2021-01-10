<?php
	
	namespace App\Controllers\Admin\Setting;

	use App\Core\Controller;
	use App\Core\Model;
	use App\Liblaries\Sesion;
	use App\Models\Role_menu;
	use App\Models\Level;
	use App\Models\Menu;

	Class RoleMenu extends Controller
	{
		/**
		* Load View Role Menu
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Role Menu data
			$role = new Model;
			$data = $role->select(' a.*, b.*, c.menu_id as parent_id, c.menu_name as parent, d.lev_name ')
			->from('role_menu a')
			->join('menu b', 'a.role_menu_id', 'b.menu_id')
			->leftJoin('menu c', 'b.menu_menu_id', 'c.menu_id')
			->join('level d', 'a.role_lev_id', 'd.lev_id')
			->get();

			// Parent and Level data
			$level = Level::all();
			$parent = Menu::on([
				'menu_menu_id' => 0
			]);


			// Load view
			view('admin/main-page', [
				'page' => 'setting/role-menu',
				'title' => 'Role Menu',
				'records' => $data,
				'level' => $level,
				'parent' => $parent,
				'plugin' => 'datatables',
				'navigation' => ['Setting'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Setting',
				'breadcrumb_3' => 'Role Menu',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Get sub menu
		*/
		public function sub_menu($id)
		{
			// Sub menu data
			$menu = Menu::on([
				'menu_menu_id' => $id
			]);


			echo json_encode(Menu::result_array($menu));
		}

		/**
		* Add Data Role Menu
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Role Menu data
			$data = parent::all();

			// Cek data
			$menu = 0;
			if($data['menu_menu_id'] !== '')
			{
				$menu = $data['menu_menu_id'];
			}
			else
			{
				$menu = $data['menu_id'];
			}

			// Create Role Menu
			$exe = Role_menu::create([
				'role_menu_id' => $menu,
				'role_lev_id' => $data['lev_id'],
				'role_status' => $data['role_status'],
			]);

			echo json_encode($exe);
		}

		/**
		* Update Data Role Menu
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Role Menu data
			$data = parent::all();

			// Cek data
			$menu = 0;

			if($data['menu_menu_id'] !== null)
			{
				$menu = $data['menu_menu_id'];
			}
			else
			{
				$menu = $data['menu_id'];
			}

			// Update Role Menu
			$exe = Role_menu::update(['role_id' => $data['role_id']], [
				'role_menu_id' => $menu,
				'role_lev_id' => $data['lev_id'],
				'role_status' => $data['role_status'],
			]);

			echo json_encode($exe);
		}

		/**
		* Delete Data Role Menu
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Role Menu data
			$exe = Role_menu::delete(['role_id' => parent::all()['role_id']]);

			echo json_encode($exe);
		}
	}