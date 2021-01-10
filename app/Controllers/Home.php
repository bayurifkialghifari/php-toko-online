<?php
	
	namespace App\Controllers;

	use App\Core\Controller;

	Class Home extends Controller
	{
		public function index()
		{
			// view() untuk load view
			// parent::post('nama')
			// parent::all()
			// parent::post_all()
			// parent::get_all()
			// parent::get('nama')
			// parent::sess(nama)
			// parent::set_session(array)
			// parent::unset_session(array / string)
			// parent::destroy_session()

			$data['app_name'] = 'Welcome';

			view('home', $data);
		}
	}