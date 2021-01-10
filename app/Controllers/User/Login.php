<?php
	
	namespace App\Controllers\User;

	use App\Core\Controller;
	use App\Liblaries\Auth;
	use App\Liblaries\Hash;
	use App\Liblaries\Sesion;
	use App\Liblaries\Email;
	use App\Models\Web_setting;
	use App\Models\User;

	Class Login extends Controller
	{
		/**
		* Load View Login
		*/
		public function index()
		{
			Sesion::cekLogin();

			// Javascript Code For Page
			$javascript = "$('#auth-form').submit(e => 
			{
				e.preventDefault()

				let username = $('#user-email').val()
				let password = $('#user-password').val()

				$.ajax({
					method: 'post',
					url: '".base_url."auth/login_post',
					data: {
						username: username,
						password: password,
					},
				})
				.then(data => JSON.parse(data))
				.then(data =>
				{
					if(data.status > 0)
					{
						swal('Login', 'is success !', 'success')

						setInterval(() => { location.href = '".base_url."' }, 1000)
					}
					else
					{
						if(data.message == 'Username tidak ada')
						{
							$('#user-email').val('')
							$('#user-password').val('')
							$('#user-email').focus()
						}
						else
						{
							$('#user-password').val('')
							$('#user-password').focus()
						}

						swal('Login', data.message, 'warning')
					}
				})
			})";

			view('user/template-1/main-page', [
				'page' => 'user/template-1/login',
				'title' => 'Sign In',
				'javascript' => $javascript,
			]);
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
		* Load View Register
		*/
		public function register()
		{
			Sesion::cekLogin();

			// Javascript Code For Page
			$javascript = "$('#user-repeat-password').on('change', e =>
			{
				e.preventDefault()

				let password = $('#user-password').val()
				let rpassword = $('#user-repeat-password').val()

				if(password !== rpassword)
				{
					swal('Register', 'Password not same', 'warning')

					$('#user-repeat-password').val('')
					$('#user-repeat-password').focus()

					$('#btn-submit').prop('disabled', true)
				}
				else
				{
					$('#btn-submit').prop('disabled', false)
				}
			})";

			view('user/template-1/main-page', [
				'page' => 'user/template-1/register',
				'title' => 'Register',
				'javascript' => $javascript,
			]);
		}

		/**
		* Register Proses
		*/
		public function register_post()
		{
			Sesion::cekLogin();

			// Account data
			$data = parent::post_all();

			// Generate token
			$token = bin2hex(openssl_random_pseudo_bytes(16));

			// Merge data and token
			$data = array_merge($data, [
				'user_token' => $token, 
				'user_lev_id' => 2, 
				'user_password' => Hash::bcrypt_hash($data['user_password']),
			]);

			// Account data save
			$exe = Auth::register($data, [
				'table' => 'user',
			]);

			// Website data
			$website = Web_setting::all();
			$website = $website->fetch_assoc();


			// LINK FOR VERIFICATION EMAIL
			$link = base_url . 'auth/mail/register/verify/value-token/' . $token;

			// HTML ONLY LOAD FOR EMAIL
			$out = view_html_only('email/verify-email', [
				'base_url' => base_url,
				'app_name' => $website['web_name'],
				'token' => $token,
				'username' => $data['user_name'],
				'link' => $link,
			]);


			// Send email
			Email::host('zonaseller.sudamiskin.com');
			Email::username('test@zonaseller.sudamiskin.com');
			Email::password('@Cimahi123');
			Email::from(['test@zonaseller.sudamiskin.com', $website['web_name']]);
			Email::to([$data['user_email'], 'Your Account Verification']);
			Email::subject('Your Account Verification');
			Email::body($out);
			Email::send();

			redirect(base_url . 'auth/after_register');
		}

		/**
		* After Register Proses
		*/
		public function after_register()
		{
			Sesion::cekLogin();

			view('user/template-1/main-page', [
				'page' => 'user/template-1/after_register',
				'title' => 'Verify Your Account'
			]);
		}

		/**
		* Verify Email Account
		*/
		public function register_verify($token)
		{
			// Find user by token
			$exe = User::update(['user_token' => $token], [
				'verified_email' => 1,
			]);

			alert('Account has been verified');
			
			redirect(base_url . 'auth');
		}

		/**
		* Logout Proses
		*/
		public function logout()
		{
			Sesion::cekLogin();

			Auth::logout();

			redirect(base_url);
		}
	}