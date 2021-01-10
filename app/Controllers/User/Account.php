<?php
	
	namespace App\Controllers\User;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\User;

	Class Account extends Controller
	{
		/**
		* Change Account Detail
		*/
		public function account_change()
		{
			Sesion::cekBelum();
			
			// Account data
			$data = parent::post_all();

			// Account data save
			$exe = User::update(['user_id' => parent::sess('user_id')], $data);

			redirect_back();
		}
	}
		