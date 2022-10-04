<?php

	namespace App\Core;
	
	use App\Liblaries\SqliFilter;
	use App\Liblaries\XssFilter;

	Class Request
	{
		/** 
		* POST SINGLE DATA
		*
		*/
		public function post($index)
		{
			return XssFilter::xss_clean(SqliFilter::sqli_clean($_POST[$index]));
		}

		/** 
		* GET SINGLE DATA
		*
		*/
		public function get($index)
		{
			$get_final;
			$get = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1]);
			foreach($get as $g) {
				$getget = explode("=", $g);

				$get_final[$getget[0]] = $getget[1];
			}

			return XssFilter::xss_clean(SqliFilter::sqli_clean($get_final[$index]));
		}

		/** 
		* POST ALL DATA
		*
		*/
		public function post_all()
		{
			return $_POST;
		}

		/** 
		* GET ALL DATA
		*
		*/
		public function get_all()
		{
			$get_final;
			$get = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1]);
			foreach($get as $g) {
				$getget = explode("=", $g);

				$get_final[$getget[0]] = $getget[1];
			}

			return $get_final;
		}

		/** 
		* POST/GET ALL DATA
		*
		*/
		public function all()
		{
			parse_str(file_get_contents('php://input'), $get_post);
			
			return $get_post;
		}

		/** 
		* GET SESSION DATA
		*
		*/
		public function sess($sess)
		{
			return $_SESSION[$sess];
		}

		/** 
		* SET SESSION DATA
		*
		*/
		public function set_session($data = [])
		{
			foreach($data as $name => $value)
			{
				$_SESSION[$name] 	= $value;
			}

			return $data;
		}

		/** 
		* UNSET SESSION DATA
		*
		*/
		public function unset_session($data = [])
		{
			if(is_array($data))
			{
				for($i = 0;$i < count($data); $i++)
				{
					unset($_SESSION[$data[$i]]);
				}
			}
			else
			{
				unset($_SESSION[$data]);
			}

			return true;
		}

		/** 
		* DESTROY SESSION DATA
		*
		*/
		public function destroy_session()
		{
			session_destroy();

			return true;
		}
	}