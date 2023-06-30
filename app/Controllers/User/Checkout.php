<?php
	
	namespace App\Controllers\User;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Cart;
	use App\Models\Cart_detail;
	use App\Models\Checkout as Checkouts;
	use App\Models\Checkout_shipping;
	use App\Models\Checkout_payment;
	use App\Models\Product;
	use App\Liblaries\Upload;
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

			// Decrase product stok
			$cart_detail = Cart_detail::on([
				'card_cart_id' => $cart['cart_id'],
			]);

			foreach($cart_detail as $cd)
			{
				$prod_id = $cd['card_prod_id'];

				// Get stok product
				$prod_data = Product::on([
					'prod_id' => $prod_id,
				]);
				$prod_data = $prod_data->fetch_assoc();

				Product::update(['prod_id' => $prod_id], [
					'prod_stok' => (int)$prod_data['prod_stok'] - (int)$cd['card_qty'],
				]);
			}



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

			// Create checkout payment
			$create_payment = Checkout_payment::create([
				'checp_check_code' => $unique_id,
				'checp_gross_amount' => $total_price_plus_shipp,
				'checp_status_value' => 'pendding',
				'checp_fraud_status' => 'pendding',
				'checp_status_code' => 0,
			]);


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
			->leftJoin('checkout_payment', 'checkout.check_code', 'checkout_payment.checp_check_code')
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

			// Javascript
			$javascript = "$('#proof_of_payment').on('change', function() 
			{
    			readURL(this, 'payment-proof-image')
			})";

			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/my-checkout-detail',
				'title' => 'Detail Code ' . $id,
				'records' => $data,
				'checkout' => $checkout,
				'javascript' => $javascript,
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

			// Total cart price
			$gross_amount 		= 0;

			foreach($cart as $val)
			{
				$new_data 		= array(
					'id' 		=> $val['card_id'],
					'price' 	=> $val['card_price'],
					'quantity' 	=> $val['card_qty'],
					'name' 		=> $val['prod_name'] . ' | Size ' . $val['size_name'] . ' | ' . $val['color_name'] ,
				);

				// Count total cart price
				$gross_amount 	+= (int)$val['card_price'] * (int)$val['card_qty'];

				// Push list cart
				array_push($cart_data, $new_data);
			}

			// Data shipping
			$shipp_data = array(
				'id' => rand(),
				'price' => $checkout['checs_cost'],
				'quantity' => 1,
				'name' => 'Shipping Agent : ' . $checkout['checs_aggent'],
			);
			$gross_amount += (int)$checkout['checs_cost'];

			// Push list cart
			array_push($cart_data, $shipp_data);

			// Trasaction details
			$order_id = rand();
			$transaction_details = array(
			  	'order_id' => $order_id,
			  	'gross_amount' => $gross_amount,
			);

			Checkouts::update(['check_code' => $code_trans], [
				'check_order_id' => $order_id,
			]);

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
				$('#check_code').val(code_trans)

				// Pay with midtrans
				$('#btn-midtrans').on('click', e =>
				{
					e.preventDefault()

					$('#upload-view').css('display', 'none')
					$('#note-view').css('display', 'block')

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

				// Pay manual
				$('#btn-manual').on('click', e =>
				{
					$('#upload-view').css('display', 'block')
					$('#note-view').css('display', 'none')
				})

				// On change
				$('#proof_of_payment').on('change', function() 
				{
        			readURL(this, 'payment-proof-image')
    			})
			})";

			view('user/template-1/main-page', [
				'page' => 'user/template-1/page/my-checkout-paid',
				'title' => 'Payment Method',
				'javascript' => $javascript,
			]);
		}

		/**
		* Upload manual transaction
		*/
		public function post_manual()
		{
			// Manual data
			$check_code = parent::post('check_code');
			$bank = parent::post('bank');
			$account_number = parent::post('account_number');
			$image = '';
			$data = [];

			// Upload proof of payment
			if(isset($_FILES['proof_of_payment_1']))
			{
				$image = Upload::execute('proof_of_payment_1', ['folder' => 'transaction/proof/']);

				$data = array_merge($data, ['checp_file' => $image]);
			}

			// Data manual final
			$data['checp_type'] = 'manual';
			$data['checp_payment_type'] = 'bank';
			$data['checp_account_number'] = $account_number;
			$data['checp_bank'] = $bank;
			$data['checp_fraud_status'] = 'accept';
			$data['checp_status_value'] = 'checked';

			// Update payment
			$update_payment = Checkout_payment::update(['checp_check_code' => $check_code], $data);

			redirect(base_url . 'my/checkout/list/detail/by/id/' . $check_code);
		}

		public function checkpayment() {
			$payload = file_get_contents('php://input');

			$notification = json_decode($payload);
			$signature_key = $notification->signature_key;
			$order_id = $notification->order_id;
			$transaction_time = $notification->transaction_time;
			$transaction_status = $notification->transaction_status;
			$type = $notification->payment_type;

			$checkout = new Checkouts;
			$checkout = $checkout->select('*')
			->where('check_order_id', $order_id)
			->get();

			if ($checkout['check_status_value'] == 'SETTLEMENT' || $checkout['check_status_value'] == 'SUCCESS') {
				echo "Transaction has been processed";
			} else {
				if ($transaction_status == 'capture') {
					if ($type == 'credit_card') {
						// Credit card
					} 
				} else if ($transaction_status == 'settlement') {

					// Update checkout status
					$update = Checkouts::update(['check_order_id' => $order_id], ['check_status_value' => 'SETTLEMENT']);

					echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;

				} else if ($transaction_status == 'pending') {
				} else if ($transaction_status == 'deny') {
				} else if ($transaction_status == 'expire') {
				} else if ($transaction_status == 'cancel') {
				}
			}
		}
	}