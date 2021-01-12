<?php 
	
	// WEB SETTING FUNCTION
	use App\Core\Request;
	use App\Core\Model;
	use App\Models\Web_setting;

	$website = Web_setting::all();
	$website = $website->fetch_assoc();

	// CEK URL
	$url = (isset($url)) ? $url : '';
	$url = (isset($_GET['url'])) ? $_GET['url'] : $url;

	// CEK URL PRODUCT
	if(isset($page_now) OR $url === 'user/product-list')
	{
		// $url = 'user/product-list';
		$title = 'Product';
	}

	// CEK SLIDER ON / OF
	$model = new Model;
	$slider = $model->select('*')
	->from('slider_setting a')
	->join('menu b', 'a.slide_menu_id', 'b.menu_id')
	->where('b.menu_url', $url)
	->and('a.slide_status', 1)
	->get();

	// CEK BANNER ON / OF
	$banner = $model->select('*')
	->from('banner_setting a')
	->join('menu b', 'a.bann_menu_id', 'b.menu_id')
	->where('b.menu_url', $url)
	->and('a.bann_status', 1)
	->get();

?>

<!DOCTYPE html>
<html lang="<?= $website['web_language'] ?>">
<head>
	<title><?= $website['web_name'] ?> | <?= ucwords($title) ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?= $website['web_description'] ?>">
	<meta name="author" content="<?= $website['web_name'] ?>">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url ?>website/configuration/<?= $website['web_icon'] ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/template-1/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header Navigation -->
	<?php
		$data = array_merge($data, [
			'website' => $website
		]);

		view('user/template-1/partials/navigation', $data) 
	?>
	

	<!-- Cart -->
	<?php view('user/template-1/partials/cart', $data) ?>



	<!-- Slider -->
	<?php if($slider->num_rows > 0) : ?>
		<?php  
			$data = array_merge($data, [
				'menu_id' => $slider->fetch_assoc()['menu_id']
			]);

			view('user/template-1/partials/slider', $data)
		?>
	<?php endif ?>
	


	<!-- Banner -->
	<?php if($banner->num_rows > 0) : ?>
	<?php
		$data = array_merge($data, [
			'menu_id' => $banner->fetch_assoc()['menu_id']
		]);
			 
		view('user/template-1/partials/banner', $data) 
	?>
	<?php endif ?>

	<!-- Page View Section -->
	<?php
		$data = array_merge($data, [
			'title' => (isset($title)) ? $title : ''
		]);

		view($page, $data) 
		?>

	<!-- Footer -->
	<?php view('user/template-1/partials/footer', $data) ?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="<?= base_url ?>assets/template-1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url ?>assets/template-1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url ?>assets/template-1/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/slick/slick.min.js"></script>
	<script src="<?= base_url ?>assets/template-1/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<!-- <script src="<?= base_url ?>assets/template-1/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script> -->
	<!-- <script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script> -->
<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/isotope/isotope.pkgd.min.js"></script>

	<!-- DATATABLE FUNCTION -->
	<?php if(isset($plugin) AND $plugin == 'datatables') : ?>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(() =>
			{
				// initialize responsive datatable
				const $table 	= $('#dt_basic').DataTable()
				$table.columns( 0 )
			    .order( 'asc' )
			    .draw()
			})

		</script>
	<?php endif ?>

<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/sweetalert/sweetalert.min.js"></script>
	<script>

		/*---------------------------------------------*/
		
		/**
		* Read url image
		*
		*/
		function readURL(input, id)
	    {
	        if (input.files && input.files[0]) 
	        {
	        
	            let reader = new FileReader()

	            reader.onload = function (e) 
	            {
	                $(`#${id}`).attr('src', e.target.result)
	            }

	            reader.readAsDataURL(input.files[0])
	        }
	    }

		/*---------------------------------------------*/
		
		/**
		* Logout function
		*
		*/
		function logout(e)
		{
			e.preventDefault()

			swal({
                title: 'Logout',
          		text: 'Are you sure you want to log out ? all changes that have occurred will not be saved !',
          		icon: 'warning',
	        	buttons: {
				  	cancel: true,
			    	confirm: true,
			  	},
            }).then((yes) => 
            {
                if(yes) 
                {
                    location.href = '<?= base_url ?>auth/logout' 
                }
            })
		}

		/*---------------------------------------------*/

		/**
		* Show all cart on header
		*
		*/
		function showCartHeader()
		{
			$.ajax({
				method: 'get',
				url: '<?= base_url ?>my/cart/get-my-cart',
				data: null,
			})
			.then(data => JSON.parse(data))
			.then(data =>
			{
				let html = ''
				let total_price = 0

				for(let i = 0; i < data.length; i++)
            	{
            		html +=`
            		<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img" onclick="delete_cart(${data[i].card_id})">
							<img src="<?= base_url ?>catalog/product/${data[i].prod_image}" alt="${data[i].prod_name}">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="<?= base_url ?>user/product-detail/${data[i].prod_id}|${data[i].prod_url}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								${data[i].prod_name} | Size ${data[i].size_name} | Color ${data[i].color_name}
							</a>

							<span class="header-cart-item-info">
								${data[i].card_qty} x 
								${new Intl.NumberFormat('id-ID').format(data[i].prod_price)}
							</span>
						</div>
					</li>`

					total_price += Number(data[i].card_total_price)
				}

				// Cart is empty check
				if(data.length == 0)
				{
					html = 'Cart is Empty'
				}

				// Data render
				$('#show-cart').html(html)
				
				// Total price render
				$('#total-price').html(
					new Intl.NumberFormat('id-ID').format(total_price)
				)

				// Data notify
				$('.js-show-cart').each(function()
				{
					$(this).attr('data-notify', data.length)
				})
			})
		}
		
		/*---------------------------------------------*/
		
		/**
		* Add to wishlist function
		*
		*/
		function addWish(e, el)
		{
			e.preventDefault()

			let id = el.getAttribute('prod-id')
			let name = el.getAttribute('prod-name')
			let status = el.getAttribute('prod-status')

			// CHECK LOGIN
			<?php if(isset($_SESSION['status'])) : ?>
				if(status === 'false')
				{
					swal(name, 'is added to wishlist !', 'success');

					el.classList.add('js-addedwish-b2')			
					el.classList.remove('js-addwish-b2')			
					el.setAttribute('prod-status', 'true')			
				}
				else
				{
					swal(name, 'is already on the wishlist !', 'warning');
				}
			<?php else: ?>
				swal('Product', 'please sign in first', 'warning')
			<?php endif ?>
		}

		/*---------------------------------------------*/
		
		/**
		* Add to cart function
		*
		*/
		function addToCart(e, el)
		{
			e.preventDefault()

			let id = el.getAttribute('prod-id')
			let name = el.getAttribute('prod-name')
			let sizeprod = $('#size-product').val()
			let colorpord = $('#color-product').val()
			let numofprod = $('#num-product').val()

			// CHECK LOGIN
			<?php if(isset($_SESSION['status'])) : ?>
				$.ajax({
					method: 'post',
					url: '<?= base_url ?>my/cart/add-to-cart',
					data: {
						cart_prod_id: id,
						cart_size_id: sizeprod,
						cart_color_id: colorpord,
						cart_qty: numofprod,
					},
				})
				.then(data => JSON.parse(data))
				.then(data =>
				{
					if(data.status > 0)
					{
						showCartHeader()

						swal(name, data.message, 'success')
					}
					else
					{
						swal(name, data.message, 'error')
					}
				})
			<?php else: ?>
				swal('Product', 'please sign in first', 'warning')
			<?php endif ?>
		}

		/*---------------------------------------------*/
		
		/**
		* Delete cart function
		*
		*/
		function delete_cart(id, reload = false)
		{
			swal({
                title: 'Delete Confirmation',
          		text: 'Are you sure to delete this ?',
          		icon: 'warning',
	        	buttons: {
				  	cancel: true,
			    	confirm: true,
			  	},
            }).then((yes) => 
            {
                if(yes) 
                {
                	$.ajax({
                		method: 'post',
                		url: '<?= base_url ?>my/cart/delete-my-cart',
                		data: {
                			card_id: id
                		}
                	})
                	.then(data =>
                	{
                		showCartHeader()

                		if(reload)
                		{
                			location.reload()
                		}
                	})
                }
            })
		}

		// ON LOAD FUNCTON START
		$(() =>
		{
			showCartHeader()
		})

		<?php echo (isset($javascript)) ? $javascript : '' ?>
	</script>


<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url ?>assets/template-1/js/main.js"></script>

</body>
</html>