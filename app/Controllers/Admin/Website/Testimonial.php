<?php
	
	namespace App\Controllers\Admin\Website;

	use App\Core\Controller;
	use App\Core\Model;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Testimonial as Testimonials;

	Class Testimonial extends Controller
	{
		/**
		* Load View Testimonial
		*/
		public function index()
		{
			Sesion::cekBelum();

			// Testimonial data
			$data = Testimonials::all();

			// Load view
			view('admin/main-page', [
				'page' => 'website/testimonial',
				'title' => 'Testimonial',
				'records' => $data,
				'plugin' => 'datatables',
				'navigation' => ['Website'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Website',
				'breadcrumb_3' => 'Testimonial',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
				'breadcrumb_3_url' => '#',
			]);
		}

		/**
		* Add Data Testimonial
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Testimonial data
			$data = parent::post_all();

			// Image
			if(isset($_FILES['image']))
			{
				$data = array_merge($data, ['test_image' => Upload::execute('image', ['folder' => 'website/testimonials/', 'max_size' => 500000])]);
			}

			// Testimonial data save
			$exe = Testimonials::create($data);

			echo json_encode($exe);
		}

		/**
		* Update Data Testimonial
		*/
		public function update()
		{
			Sesion::cekBelum();

			// Testimonial data
			$data = parent::post_all();

			// Image
			if(isset($_FILES['image']))
			{
				$data = array_merge($data, ['test_image' => Upload::execute('image', ['folder' => 'website/testimonials/', 'max_size' => 500000])]);
			}

			// Testimonial data save
			$exe = Testimonials::update(['test_id' => $data['test_id']], $data);

			echo json_encode($exe);
		}

		/**
		* Delete Data Testimonial
		*/
		public function destroy()
		{
			Sesion::cekBelum();

			// Testimonial data
			$exe = Testimonials::delete(['test_id' => parent::all()['test_id']]);
			
			echo json_encode($exe);
		}
	}