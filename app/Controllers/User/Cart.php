<?php
	
	namespace App\Controllers\User;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\User;
	use App\Models\Cart as Carts;
	use App\Models\Product;
	use App\Models\Cart_detail;

	Class Cart extends Controller
	{
		/**
		* Get my Cart
		*/
		public function get_my_cart()
		{
			Sesion::cekBelum();

			// Cart data
			$cart = new Cart_detail;
			$data = $cart->select('*')
			->leftJoin('cart', 'cart.cart_id', 'cart_detail.card_cart_id')
			->leftJoin('product', 'product.prod_id', 'cart_detail.card_prod_id')
			->leftJoin('size', 'size.size_id', 'cart_detail.cart_size_id')
			->leftJoin('color', 'color.color_id', 'cart_detail.cart_color_id')
			->where('cart.cart_user_id', parent::sess('user_id'))
			->and('cart.cart_status', 1)
			->get();

			// Cart data to array
			$data = Cart_detail::result_array($data);

			echo json_encode($data);
		}

		/**
		* Add to Cart
		*/
		public function add_to_cart()
		{
			Sesion::cekBelum();

			// Cart data
			$data = parent::post_all();


			// Check cart user
			$check = Carts::on([
				'cart_user_id' => parent::sess('user_id'),
				'cart_status' => 1,
			]);

			
			// Get stok and price of product
			$product = Product::on([
				'prod_id' => $data['cart_prod_id'],
			]);
			$product = $product->fetch_assoc();


			// Check stok product
			if((int)$data['cart_qty'] > (int)$product['prod_stok'])
			{
				echo json_encode([
					'status' => 0,
					'message' => 'Product not available',
				]);
			}
			// If stok available
			else
			{

				// If cart user not exist
				if($check->num_rows < 1)
				{
					// Create new cart
					$create_new_cart = Carts::create([
						'cart_user_id' => parent::sess('user_id'),
						'cart_total_price' => 0,
						'cart_status' => 1
					]);


					// Cart id
					$cart_id = Carts::on([
						'cart_user_id' => parent::sess('user_id'),
						'cart_status' => 1,
					]);
					$cart_id = $cart_id->fetch_assoc();


					// Create cart detail
					$create_cart_detail = Cart_detail::create([
						'card_cart_id' => $cart_id['cart_id'],
						'card_prod_id' => $data['cart_prod_id'],
						'cart_size_id' => $data['cart_size_id'],
						'cart_color_id' => $data['cart_color_id'],
						'card_price' => $product['prod_price'],
						'card_qty' => $data['cart_qty'],
						'card_total_price' => (int)$product['prod_price'] * (int)$data['cart_qty'],
						'card_status' => 1,
					]);


					// Return json
					echo json_encode([
						'status' => 1,
						'message' => 'is added to cart !',
					]); 
				}
				else
				{
					// Cart id
					$cart_id = $check->fetch_assoc();
					$cart_id = $cart_id['cart_id'];


					// Check cart detail
					$cart_detail = Cart_detail::on([
						'card_cart_id' => $cart_id,
					]);

					$cart_detail = Cart_detail::result_array($cart_detail);

					// Cart detail status
					$cart_exist = false;

					// Foreach cart detail
					foreach($cart_detail as $cd)
					{
						// Check if product exist in cart detail
						if($cd['card_prod_id'] === $data['cart_prod_id'])
						{
							// Check if size and color are same
							if($cd['cart_size_id'] === $data['cart_size_id'] AND $cd['cart_color_id'] === $data['cart_color_id'])
							{
								// Cart exist
								$cart_exist = true;

								// Plus cart qty
								$cart_qty = (int)$cd['card_qty'] + (int)$data['cart_qty'];


								// Update cart detail
								$update_cart_detail = Cart_detail::update(['card_id'=> $cd['card_id']], [
									'card_qty' => $cart_qty,
									'card_total_price' => (int)$cart_qty * (int)$product['prod_price'],
								]);

								break;
							}
						}
					}


					// Create new cart detail
					if($cart_exist === false)
					{
						$create_cart_detail = Cart_detail::create([
							'card_cart_id' => $cart_id,
							'card_prod_id' => $data['cart_prod_id'],
							'cart_size_id' => $data['cart_size_id'],
							'cart_color_id' => $data['cart_color_id'],
							'card_price' => $product['prod_price'],
							'card_qty' => $data['cart_qty'],
							'card_total_price' => (int)$product['prod_price'] * (int)$data['cart_qty'],
							'card_status' => 1,
						]);						
					}


					// Return json
					echo json_encode([
						'status' => 1,
						'message' => 'is added to cart !',
					]); 
				}

			}
		}

		/**
		* Update cart
		*/
		public function update_cart()
		{
			// Cart data
			$data = parent::post_all();

			// Cart detail id
			$card_id = $data['prod-id'];

			// Qty cart
			$qty = $data['num-product'];

			// Update cart
			for($i = 0; $i < count($card_id); $i++)
			{
				// Cart detail data
				$cart_detail = Cart_detail::on([
					'card_id' => $card_id[$i],
				]);
				$cart_detail = $cart_detail->fetch_assoc();

				// Get card price per one item
				$price = $cart_detail['card_price'];

				// Execute update
				$exe = Cart_detail::update(['card_id' => $card_id[$i]], [
					'card_total_price' => (int)$qty[$i] * (int)$price,
					'card_qty' => $qty[$i], 
				]);
			}

			redirect_back();
		}

		/**
		* Delete Cart
		*/
		public function delete_cart()
		{
			Sesion::cekBelum();

			// Cart detail id
			$id = parent::post('card_id');

			// Cart detail delete
			$exe = Cart_detail::delete(['card_id' => $id]);

			echo json_encode([
				'status' => 1,
				'message' => 'is deleted from cart',
			]);
		}
	}