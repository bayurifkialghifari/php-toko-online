<?php
    
    namespace App\Controllers\User;

    use App\Core\Controller;
    use App\Models\Cart_detail;

    Class Shipping extends Controller
    {

        /**
        * Get province
        */
        public function province()
        {
            $curl = curl_init();

            curl_setopt_array($curl, array
            (
                CURLOPT_URL => raja_ongkir_url . 'province',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'key: ' . raja_ongkir_api
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);

            $response = json_decode($response, true);

            echo json_encode($response);   
        }


        /**
        * Get city
        */
        public function city()
        {
            $url = '';

            if(isset($_POST['province']))
            {
                $url = '?province=' . parent::post('province');
            }

            $curl = curl_init();

            curl_setopt_array($curl, array
            (
                CURLOPT_URL => raja_ongkir_url . 'city' . $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'key: ' . raja_ongkir_api
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);

            $response = json_decode($response, true);
            
            echo json_encode($response);
        }


        /**
        * Calculate shipping cost
        */
        public function calculate()
        {
            // 107 = Cimahi

            $from = 107;
            $to = parent::post('to');
            $courier = parent::post('courier');
            
            // CART ID
            $cart_id = parent::post('cart_id');

            // GET TOTAL WEIGHT CART
            $cart = new Cart_detail;
            $data = $cart->select('*')
            ->leftJoin('cart', 'cart.cart_id', 'cart_detail.card_cart_id')
            ->leftJoin('product', 'product.prod_id', 'cart_detail.card_prod_id')
            ->where('cart.cart_user_id', parent::sess('user_id'))
            ->and('cart.cart_status', 1)
            ->get();

            // WEIGHT
            $weight = 0;

            foreach($data as $w)
            {
                // CALCULATE TOTAL WEIGHT
                $weight = (int)$weight + ((int)$w['prod_weight'] * (int)$w['card_qty']);
            }

            // TOTAL WEIGHT TO KILOGRAM
            $weight = (int)$weight;

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => raja_ongkir_url . 'cost',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'origin=' . $from . '&destination=' . $to . '&weight=' . $weight . '&courier=' . $courier . '',
                CURLOPT_HTTPHEADER => array(
                    'content-type: application/x-www-form-urlencoded',
                    'key: ' . raja_ongkir_api
                ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);

            $response = json_decode($response, true);
            
            echo json_encode($response);
        }
    }