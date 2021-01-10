<?php  
	
	use App\Core\Model;

	$model = new Model;
	$menu = $model->select('*')
	->from('role_menu a')
	->join('menu b', 'a.role_menu_id', 'b.menu_id')
	->join('level c', 'a.role_lev_id', 'c.lev_id')
	->where('b.menu_menu_id', 0)
	->and('b.menu_status = 1')
	->and("c.lev_name = 'Customer'")
	->orderBy('b.menu_index', 'ASC')
	->get();

?>

<header class="header-v4">
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<!-- Topbar -->
		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
					<?= $website['web_description'] ?>
				</div>

				<div class="right-top-bar flex-w h-full">
					<a href="<?= base_url ?>faq" class="flex-c-m trans-04 p-lr-25">
						Help & FAQs
					</a>

					<?php if(isset($_SESSION['status'])) : ?>
						<a href="<?= base_url ?>my/account" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>
					<?php else : ?>
						<a href="<?= base_url ?>auth" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-sign-in"></i> &nbsp; Sign In
						</a>
						<a href="<?= base_url ?>auth/register" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-user-plus"></i> &nbsp;Register
						</a>
					<?php endif ?>
				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop how-shadow1">
			<nav class="limiter-menu-desktop container">
				
				<!-- Logo desktop -->		
				<a href="<?= base_url ?>" class="logo">
					<img src="<?= base_url ?>website/configuration/<?= $website['web_logo'] ?>" alt="<?= $website['web_name'] ?>">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<?php foreach($menu as $menu_desktop) : ?>
							<li>
								<a href="<?= base_url ?><?= $menu_desktop['menu_url'] ?>"><?= $menu_desktop['menu_name'] ?></a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>	

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>

					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="0">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>

					<a href="<?= base_url ?>my/wishlist" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
						<i class="zmdi zmdi-favorite-outline"></i>
					</a>
				</div>
			</nav>
		</div>	
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->		
		<div class="logo-mobile">
			<a href="<?= base_url ?>"><img src="<?= base_url ?>website/configuration/<?= $website['web_logo'] ?>" alt="<?= $website['web_name'] ?>"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
				<i class="zmdi zmdi-search"></i>
			</div>

			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>

			<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="topbar-mobile">
			<li>
				<div class="left-top-bar">
					<?= $website['web_description'] ?>
				</div>
			</li>

			<li>
				<div class="right-top-bar flex-w h-full">
					<a href="<?= base_url ?>faq" class="flex-c-m trans-04 p-lr-25">
						Help & FAQs
					</a>

					<?php if(isset($_SESSION['status'])) : ?>
						<a href="<?= base_url ?>my/account" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>
					<?php else : ?>
						<a href="<?= base_url ?>auth" class="flex-c-m trans-04 p-lr-25">
							Sign In
						</a>
						<a href="<?= base_url ?>auth/register" class="flex-c-m trans-04 p-lr-25">
							Register
						</a>
					<?php endif ?>
				</div>
			</li>
		</ul>

		<ul class="main-menu-m">
			<?php foreach($menu as $menu_mobile) : ?>
				<li>
					<a href="<?= base_url ?><?= $menu_mobile['menu_url'] ?>"><?= $menu_mobile['menu_name'] ?></a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>

	<!-- Modal Search -->
	<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
		<div class="container-search-header">
			<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
				<img src="<?= base_url ?>assets/template-1/images/icons/icon-close2.png" alt="CLOSE">
			</button>

			<form id="search" class="wrap-search-header flex-w p-l-15">
				<button class="flex-c-m trans-04">
					<i class="zmdi zmdi-search"></i>
				</button>
				<input class="plh3" type="text" name="search" placeholder="Search...">
			</form>
		</div>
	</div>
</header>