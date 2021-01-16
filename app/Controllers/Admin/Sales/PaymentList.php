<?php
	
	namespace App\Controllers\Admin\Sales;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Checkout;
	use App\Models\Checkout_payment;

	Class PaymentList extends Controller
	{
		/**
		* Load View Payment List
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Payment List data
			$payment = new Checkout_payment;
			$data = $payment->select('*')
			->leftJoin('checkout', 'checkout.check_code', 'checkout_payment.checp_check_code')
			->leftJoin('user', 'user.user_id', 'checkout.check_user_id')
			->get();

			// Load view
			view('admin/main-page', [
				'page' => 'sales/payment-list',
				'title' => 'Payment List',
				'records' => $data,
				'plugin' => 'datatables',
				'navigation' => ['Sales'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Sales',
				'breadcrumb_3' => 'Payment List',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Update Data Payment List
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Payment List data
			$data = parent::all();
			$status = ($data['type'] === 'SETTLEMENT') ? 1 : 0;
			
			$exe = Checkout::update(['check_code' => $data['id']], [
				'check_status_value' => $data['type'],
				'check_status_code' => $status,
			]);

			$exe2 = Checkout_payment::update(['checp_check_code' => $data['id']], [
				'checp_status_value' => $data['type'],
				'checp_status_code' => $status,
			]);

			echo json_encode($exe);
		}
	}