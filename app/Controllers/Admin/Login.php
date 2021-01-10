<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Auth;
	use App\Liblaries\Sesion;

	Class Login extends Controller
	{
		/**
		* Load View Login
		*/
		public function index()
		{
			Sesion::cekLogin();

			view('admin/login');
		}

		/**
		* Login Proses
		*/
		public function auth()
		{
			Sesion::cekLogin();

			// Post data
			$username = parent::post('username');
			$password = parent::post('password');

			// Auth
			Auth::table('user');
			Auth::user_field('user_email');
			Auth::password_field('user_password');
			
			// Execute Auth
			$exe = Auth::login($username, $password);

			echo json_encode($exe);
		}

		/**
		* Logout Proses
		*/
		public function logout()
		{
			Sesion::cekLogin();
			
			Auth::logout();

			redirect(base_url . 'admin/login');
		}
	}