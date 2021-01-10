<?php
	
	namespace App\Controllers\User;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Cart;
	use App\Models\Cart_detail;
	use App\Models\Checkout as Checkouts;
	use App\Models\Checkout_shipping;
	use App\Liblaries\Midtrans\Midtrans;

	Class Checkout extends Controller
	{
		/**
		* Create chekout
		*/
		public function create()
		{
			Sesion::cekBelum();

			// Shipping data
			$data_shipp = parent::post('value');

			// Shipping data string to array
			$data_shipp = explode(',', $data_shipp);

			// Shipping detail
			$shipp['checs_service_name'] = $data_shipp[1];
			$shipp['checs_service_description'] = $data_shipp[0];
			$shipp['checs_cost'] = $data_shipp[2];
			$shipp['checs_etd'] = $data_shipp[3];
			$shipp['checs_aggent'] = $data_shipp[4];
			$shipp['checs_from_city'] = $data_shipp[5];
			$shipp['checs_from_province'] = $data_shipp[6];
			$shipp['checs_to_city'] = $data_shipp[7];
			$shipp['checs_to_province'] = $data_shipp[8];

			// Total Cart Value
			$total_price = parent::post('total_price');
			$total_price_plus_shipp = (int)$total_price + (int)$shipp['checs_cost'];

			// Cart data
			$cart = Cart::on([
				'cart_user_id' => parent::sess('user_id'),
				'cart_status' => 1,
			]);
			$cart = $cart->fetch_assoc();

			// Update total price cart
			$update_cart = Cart::update(['cart_id' => $cart['cart_id']], [
				'cart_total_price' => $total_price,
				'cart_status' => 0,
			]);



			// Unique checkout id
			$unique_id = str_replace('.','',microtime(true)).rand(000,999); 

			// Create checkout data
			$create_checkout = Checkouts::create([
				'check_code' => $unique_id,
				'check_user_id' => parent::sess('user_id'),
				'check_cart_id' => $cart['cart_id'],
				'check_total' => $total_price_plus_shipp,
				'check_description' => '-',
				'check_status_value' => 'Pendding',
				'check_status_code' => 0,
			]);

			// Get checkout id
			$checkout_id = new Checkouts;
			$checkout_id = $checkout_id->select('MAX(check_id) as check_id')
			->where('check_user_id', parent::sess('user_id'))
			->limit(1)
			->get();
			$checkout_id = $checkout_id->fetch_assoc();
			$checkout_id = $checkout_id['check_id'];




			// Create checkout shipping
			$shipp['checs_check_id'] = $checkout_id;
			$create_shipping = Checkout_shipping::create($shipp);

			echo json_encode([
				'checkout_id' => $unique_id,
			]);
		}

		/**
		* Checout detail
		*/
		public function checkout_detail($id)
		{
			Sesion::cekBelum();

			// Checkout data detail
			$checkout = new Checkouts;
			$checkout = $checkout->select('*')
			->leftJoin('checkout_shipping', 'checkout.check_id', 'checkout_shipping.checs_check_id')
			->where('checkout.check_code', $id)
			->get();
			
			$checkout = $checkout->fetch_assoc();

			// Cart data
			$cart = new Cart_detail;
			$data = $cart->select('*')
			->leftJoin('cart', 'cart.cart_id', 'cart_detail.card_cart_id')
			->leftJoin('product', 'product.prod_id', 'cart_detail.card_prod_id')
			->leftJoin('size', 'size.size_id', 'cart_detail.cart_size_id')
			->leftJoin('color', 'color.color_id', 'cart_detail.cart_color_id')
			->where('cart.cart_id', $checkout['check_cart_id'])
			->and('cart.cart_user_id', parent::sess('user_id'))
			->get();

			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/my-checkout-detail',
				'title' => 'Detail Code ' . $id,
				'records' => $data,
				'checkout' => $checkout,
			]);
		}

		/**
		* Get token midtrans
		*/
		public function get_token_midtrans()
		{
			Sesion::cekBelum();

			// Checkout uniqe code
			$code_trans = parent::post('code_trans');



			// Checkout detail data
			$checkout = new Checkouts;
			$checkout = $checkout->select('*')
			->leftJoin('checkout_shipping', 'checkout.check_id', 'checkout_shipping.checs_check_id')
			->where('check_code', $code_trans)
			->and('check_user_id', parent::sess('user_id'))
			->get();
			$checkout = $checkout->fetch_assoc();



			// Cart detail data
			$cart = new Cart_detail;
			$cart = $cart->select('*')
			->leftJoin('cart', 'cart.cart_id', 'cart_detail.card_cart_id')
			->leftJoin('product', 'product.prod_id', 'cart_detail.card_prod_id')
			->leftJoin('size', 'size.size_id', 'cart_detail.cart_size_id')
			->leftJoin('color', 'color.color_id', 'cart_detail.cart_color_id')
			->where('cart.cart_id', $checkout['check_cart_id'])
			->and('cart.cart_user_id', parent::sess('user_id'))
			->get();

			// Midtrans
			$midtrans = new Midtrans;
			$midtrans->config([
				'server_key' => midtrans_server_key,
				'production' => midtrans_production,
			]);



			// Cart data
			$cart_data = array();

			// Total harga cart
			$gross_amount 		= 0;

			foreach($cart as $val)
			{
				$new_data 		= array(
					'id' 		=> $val['card_id'],
					'price' 	=> $val['card_price'],
					'quantity' 	=> $val['card_qty'],
					'name' 		=> $val['prod_name'] . ' | Size ' . $val['size_name'] . ' | ' . $val['color_name'] ,
				);

				// Hitung total harga cart
				$gross_amount 	+= (int)$val['card_price'] * (int)$val['card_qty'];

				// Isi list cart
				array_push($cart_data, $new_data);
			}

			// Trasaction details
			$transaction_details = array(
			  	'order_id' => rand(),
			  	'gross_amount' => $gross_amount,
			);

			// Optional
			$customer_details = array(
			  	'first_name' => parent::sess('user_name'),
			  	'last_name' => '',
			  	'email' => parent::sess('user_email'),
			  	'phone' => parent::sess('user_phone'),
			);

			// CREDIT CART.
	        $credit_card['secure'] = true;

	        // Expired transaction setting
	        $time = time();
	        $custom_expiry = array(
	            'start_time' => date("Y-m-d H:i:s O", $time),
	            'unit' => 'day', 
	            'duration'  => 2
	        );
	        
	        // Transaction data
	        $transaction_data = array(
	            'transaction_details' => $transaction_details,
	            'item_details' => $cart_data,
	            'customer_details' => $customer_details,
	            'credit_card' => $credit_card,
	            'expiry' => $custom_expiry
	        );

	        // Snap token generate
			$snapToken = $midtrans->getSnapToken($transaction_data);
			
			echo json_encode($snapToken);
		}

		/**
		* Load View Checkout Paid
		*/
		public function paid_by_id()
		{
			Sesion::cekBelum();

			// Javascript Checkout Paid
			$javascript = "$(() =>
			{
				let url = new URLSearchParams(window.location.search)
				let code_trans = url.get('id')

				// Change href and html
				$('#code-checkout-html').html(code_trans)
				$('#code-checkout-href').attr('href', '".base_url."my/checkout/list/detail/by/id/'+code_trans)

				// Pay with midtrans
				$('#btn-midtrans').on('click', e =>
				{
					e.preventDefault()

					// Get token midtrans
					$.ajax({
						method: 'post',
						url: '".base_url."my/checkout/paid/by/midtrans',
						data: {
							code_trans: code_trans,
						}
					})
					.then(data => JSON.parse(data))
					.then(data =>
					{
			        	snap.pay(data, 
			        	{
				          	onSuccess(result)
				          	{
				            	changeResult('success', result)
				          	},
				          	onPending(result)
				          	{
				            	changeResult('pending', result)
				          	},
				          	onError(result)
				          	{
				            	changeResult('error', result)
				         	},
			        	})
					})
				})
			})";

			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/my-checkout-paid',
				'title' => 'Payment Method',
				'javascript' => $javascript,
			]);
		}
	}