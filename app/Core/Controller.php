<?php

	namespace App\Core;

	use App\Core\Request;
	
	Class Controller
	{
		protected function post($index)
		{
			return Request::post($index);
		} 

		protected function get($index)
		{
			return Request::get($index);
		} 

		protected function get_all()
		{
			return Request::get_all();
		} 

		protected function post_all()
		{
			return Request::post_all();
		} 

		protected function all()
		{
			return Request::all();
		}

		protected function sess($sess)
		{
			return Request::sess($sess);
		}

		protected function set_session($sess)
		{
			return Request::set_session($sess);
		}

		protected function unset_session($sess)
		{
			return Request::unset_session($sess);
		}

		protected function destroy_session()
		{
			return Request::destroy_session();
		}
	}