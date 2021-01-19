<?php
	
	namespace App\Controllers\User;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\User;
	use App\Liblaries\Auth;
	use App\Liblaries\Hash;

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

		/**
		* Change Password
		*/
		public function password_change()
		{
			Sesion::cekBelum();

			// Password data
			$data = parent::post_all();

			// Check old password by auth
			Auth::table('user');
			Auth::user_field('user_email');
			Auth::password_field('user_password');
			
			// Execute Auth
			$exe = Auth::login(parent::sess('user_email'), $data['old_pass']);

			// If true
			if($exe['status'] > 0)
			{
				User::update(['user_id' => parent::sess('user_id')], [
					'user_password' => Hash::bcrypt_hash($data['new_pass']),
				]);				

				alert('Change password success !');
			}
			else
			{
				alert('Old password is wrong !');
			}
			
			redirect_back();
		}
	}
		