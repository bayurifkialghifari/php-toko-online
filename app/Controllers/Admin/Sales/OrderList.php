<?php
	
	namespace App\Controllers\Admin\Sales;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Checkout;

	Class OrderList extends Controller
	{
		/**
		* Load View Order List
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Payment Method data
			$order = new Checkout;
			$data = $order->select('*')
			->leftJoin('user', 'user.user_id', 'checkout.check_user_id')
			->get();

			// Load view
			view('admin/main-page', [
				'page' => 'sales/order-list',
				'title' => 'Orders',
				'records' => $data,
				'plugin' => 'datatables',
				'navigation' => ['Sales'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Sales',
				'breadcrumb_3' => 'Orders',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}
	}