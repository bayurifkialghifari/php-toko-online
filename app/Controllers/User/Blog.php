<?php
	
	namespace App\Controllers\User;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Blog as Blogs;

	Class Blog extends Controller
	{
		/**
		* Load View
		*/
		public function index()
		{
			$javascript = "$(() =>
			{
				let url = new URLSearchParams(window.location.search)
				let id = url.get('id')

				run()
				update_view()

				function run()
				{
					$.ajax({
						method: 'post',
						url: '".base_url."/blog-detail/get_blog',
						data: {
							id: id,
						}
					})
					.then(data => JSON.parse(data))
					.then(data => {
						$('#blog-thumbnail').attr('src', '".base_url."website/blog/'+data.blog_thumbnal)
						$('#blog-thumbnail-date').html(data.created_at)
						$('#title-blog-breadcrumb').html(data.blog_title)
						$('#author').html(data.user_name)
						$('#blog-category').html(data.cate_name)
						$('#view').html(data.blog_view)
						$('#blog-title').html(data.blog_title)
						$('#blog-content').html(data.blog_content)
					})
				}

				function update_view()
				{
					$.ajax({
						method: 'post',
						url: '".base_url."/blog-detail/update_view',
						data: {
							id: id,
						}
					})
				}
			})";

			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/blog-detail',
				'javascript' => $javascript,
				'title' => 'Blog Detail',
			]);
		}

		/**
		* Get Blog Detail
		*/
		public function get_blog()
		{
			$id = parent::post('id');

			$blog = new Blogs;
			$data = $blog->select('*, blog.*')
			->leftJoin('category', 'category.cate_id', 'blog.blog_cate_id')
			->leftJoin('user', 'user.user_id', 'blog.bolg_user_id')
			->where('blog.blog_id', $id)
			->get();

			echo json_encode($data->fetch_assoc());
		}

		/**
		* Plus View
		*/
		public function update_view()
		{
			$id = parent::post('id');

			$blog = new Blogs;
			$blog = $blog->select('*')->where('blog_id', $id)->get();
			$blog = $blog->fetch_assoc();

			$update_view = Blogs::update(['blog_id' => $id], [
				'blog_view' => (int)$blog['blog_view'] + 1,
			]);

			echo json_encode(1);
		}
	}
		