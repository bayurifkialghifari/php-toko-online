<?php
	
	namespace App\Liblaries;

	Class Sesion
	{
		/**
        * @var
        *
        * Session check login
        *
        */
		public function cekLogin()
		{
			if(isset($_SESSION['status']))
			{
				if($_SESSION['status'] == true)
				{
					if($_SESSION['lev_name'] == 'Administrator')
					{
						redirect(base_url . 'admin/dashboard');			
					}
					else
					{
						redirect(base_url . logged_in_true);
					}
				}
			}
		}

		/**
        * @var
        *
        * Session check login
        *
        */
		public function cekBelum()
		{
			if(isset($_SESSION['status']))
			{
				if($_SESSION['status'] != true)
				{
					redirect(base_url . logged_in_false);			
				}
			}
			else
			{
				redirect(base_url . logged_in_false);			
			}
		}
	}