<?php 
	
	namespace App\Liblaries;

	use App\Core\Model;
	use App\Core\Request;
	use App\Liblaries\Hash;
	use App\Liblaries\Sesion;

	Class Auth
	{
		/**
        * @param
        *
        * Table auth
        *
        */
        private static $table 			= 'users';

		/**
        * @param
        *
        * Field username auth
        *
        */
		private static $user_field 		= 'email';

		/**
        * @param
        *
        * Field password auth
        *
        */
        private static $password_field 	= 'password';

        /**
        * @param
        *
        * Set table auth
        *
        */
        public function table($table)
        {
        	self::$table 				= $table;
        }

        /**
        * @param
        *
        * Set user_field auth
        *
        */
        public function user_field($user_field)
        {
        	self::$user_field 			= $user_field;
        }

        /**
        * @param
        *
        * Set password_field auth
        *
        */
        public function password_field($password_field)
        {
        	self::$password_field 		= $password_field;
        }

        /**
        * @return
        * 
        * Get table
        *
        */
        public function get_table()
        {
            return self::$table;
        }

        /**
        * @return
        * 
        * Get user_field
        *
        */
        public function get_user_field()
        {
            return self::$user_field;
        }

        /**
        * @return
        * 
        * Get password_field
        *
        */
        public function get_password_field()
        {
            return self::$password_field;
        }

        /**
        * @return
        *
        * Login function
        *
        */
        public function login($username, $password, $config = array())
        {
        	/**
	        * @param
	        *
	        * Auth parameter check
	        *
	        */
			$table 						= (isset($config['table'])) 		? $config['table'] 			: self::get_table();
			$user_field 				= (isset($config['user_field'])) 	? $config['user_field'] 	: self::get_user_field();
			$password_field 			= (isset($config['password_field']))? $config['password_field'] : self::get_password_field();

        	$auth 						= new Model;

        	$cek_auth 					= $auth->select(' * ')
								        	 	->from(" {$table} a ")
                                                ->leftJoin(" level b ", " a.user_lev_id ", " b.lev_id ")
								        	 	->where(" a.{$user_field} ", $username)
                                                ->and(" a.verified_email = '1' ")
								        	 	->get();

			$count_auth 				= $cek_auth->num_rows;

			/* If username exsist */
			if($count_auth > 0)
			{
				/*
					Fetch assoc
				*/
				$cek_auth 				= $cek_auth->fetch_assoc();

				$cek_hash 				= Hash::hash_check($password, $cek_auth[$password_field]);

				/* If password true */
				if($cek_hash > 0)
				{
					/* Set session auth */
					foreach($cek_auth as $name => $value)
					{
						Request::set_session([$name => $value]);
					}

					Request::set_session(['status' => true]);

					/* Return data auth */
					return array(
						'status' 	=> 1,
						'data' 		=> $cek_auth,
					);
				}
				/* If password false */
				else
				{
					return array(
						'status' 	=> 0,
						'message' 	=> 'Password wrong',
					);		
				}
			}
			/* If username not exsist */
			else
			{
				return array(
					'status' 		=> 0,
					'message' 		=> 'Email is not registered or has not been verified',
				);
			}
        }

        /**
        * @return
        *
        * Register function
        *
        */
        public function register($data, $config = array())
        {
        	/**
	        * @param
	        *
	        * Auth parameter check
	        *
	        */
        	$table 						= (isset($config['table'])) 		? $config['table'] 			: self::get_table();
 			
 			$auth 						= new Model;
 			$register 					= $auth->store($table, $data);

 			return $register;
        }

        /**
        * @return
        *
        * Login true check function
        *
        */
        public function check_login()
        {
        	return Sesion::cekLogin();
        }

        /**
        * @return
        *
        * Login false check function
        *
        */
        public function check_not_login()
        {
        	return Sesion::cekBelum();
        }

        /**
        * @return
        *
        * Logout function
        *
        */
        public function logout()
        {
        	return Request::destroy_session();
        }
	}