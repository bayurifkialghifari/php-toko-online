<?php
	
	namespace App\Controllers\Admin\Sales;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Payment_method;

	Class PaymentMethod extends Controller
	{
		/**
		* Load View Payment Method
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Payment Method data
			$data = Payment_method::all();

			// Load view
			view('admin/main-page', [
				'page' => 'sales/payment-method',
				'title' => 'Payment Method',
				'records' => $data,
				'plugin' => 'datatables',
				'navigation' => ['Sales'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Sales',
				'breadcrumb_3' => 'Payment Method',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Payment Method
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Payment Method data
			$data = parent::all();
			$exe = Payment_method::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Payment Method
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Payment Method data
			$data = parent::all();
			$exe = Payment_method::update(['paynt_id' => $data['paynt_id']], $data);

			echo json_encode($exe);
		}
	}