<?php 
	
	use App\Core\Request;
	use App\Models\Web_setting;

	$website = Web_setting::all();
	$website = $website->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="<?= $website['web_language'] ?>" class="smart-style-2">
	<head>
		<meta charset="utf-8">
		<title><?= $website['web_name'] ?> | <?= $title ?></title>
		<meta name="description" content="<?= $website['web_description'] ?>">
		<meta name="author" content="<?= $website['web_name'] ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/font-awesome.min.css">
		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/smartadmin-skins.min.css">
		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="<?= base_url ?>assets/admin-1/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?= base_url ?>assets/admin-1/img/favicon/favicon.ico" type="image/x-icon">
		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<style type="text/css">
			/* Scroll bar */
			::-webkit-scrollbar {
			  width: 10px;
			}
			::-webkit-scrollbar-track {
			  background: #f1f1f1;
			}
			::-webkit-scrollbar-thumb {
			  transition: 0.2s ease;
			  -webkit-transition: 0.2s ease;
			  -o-transition: 0.2s ease;
			  background: #343a40;
			}
			::-webkit-scrollbar-thumb:hover {
			  transition: 0.2s ease;
			  -webkit-transition: 0.2s ease;
			  -o-transition: 0.2s ease;
			  background: #555;
			}
		</style>
		<!--================================================== -->
		<!--====================JAVASCRIPT====================-->
		<!--================================================== -->
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="<?= base_url ?>assets/admin-1/js/libs/jquery-2.1.1.min.js"></script>
		<script src="<?= base_url ?>assets/admin-1/js/libs/jquery-ui-1.10.3.min.js"></script>
		<!-- IMPORTANT: APP CONFIG -->
		<script defer src="<?= base_url ?>assets/admin-1/js/app.config.js"></script>
		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script defer src="<?= base_url ?>assets/admin-1/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 
		<!-- BOOTSTRAP JS -->
		<script src="<?= base_url ?>assets/admin-1/js/bootstrap/bootstrap.min.js"></script>
		<!-- CUSTOM NOTIFICATION -->
		<script defer src="<?= base_url ?>assets/admin-1/js/notification/SmartNotification.min.js"></script>
		<!-- JARVIS WIDGETS -->
		<script defer src="<?= base_url ?>assets/admin-1/js/smartwidgets/jarvis.widget.min.js"></script>
		<!-- browser msie issue fix -->
		<script defer src="<?= base_url ?>assets/admin-1/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>
		<!-- FastClick: For mobile devices -->
		<script defer src="<?= base_url ?>assets/admin-1/js/plugin/fastclick/fastclick.min.js"></script>
		<!-- MAIN APP JS FILE -->
		<script defer src="<?= base_url ?>assets/admin-1/js/app.min.js"></script>		
		<!-- PLUGIN PAGE -->
		<?php if(isset($plugin) AND count(plugin[$plugin]['scripts']) > 0) : ?>
			<?php foreach(plugin[$plugin]['scripts'] as $scripts) : ?>
				<script src="<?= base_url ?><?= $scripts?>"></script>
			<?php endforeach ?>
		<?php endif ?>
		<!-- DATATABLE FUNCTION -->
		<?php if(isset($plugin) AND $plugin == 'datatables') : ?>
			<script src="<?= base_url ?>assets/admin-1/dt.helper.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(() =>
				{
					// initialize responsive datatable
					$.initBasicTable('#dt_basic')
					const $table 	= $('#dt_basic').DataTable()
					$table.columns( 0 )
				    .order( 'asc' )
				    .draw()
				})

			</script>
		<?php endif ?>
		<script defer src="<?= base_url ?>assets/admin-1/application.js" type="text/javascript"></script>
		<!-- PAGE RELATED PLUGIN(S) -->
		<script type="text/javascript">$(document).ready(() => {$.sound_path = '<?= base_url ?>assets/admin-1/sound/';pageSetUp()})</script>
	</head>
	<!-- #BODY -->
	<body class="desktop-detected pace-done smart-style-2">
		<!-- #HEADER -->
		<header id="header">
			<div id="logo-group">
				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="<?= base_url ?>assets/admin-1/img/logo-white.png" alt="SmartAdmin"> </span>
				<!-- END LOGO PLACEHOLDER -->
			</div>
			<!-- #TOGGLE LAYOUT BUTTONS -->
			<!-- pulled right: nav area -->
			<div class="pull-right">
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:;" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="<?= base_url ?>assets/admin-1/img/avatars/sunny.png" class="online" alt="#">

							<?= Request::sess('user_name'); ?>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> <strong>Fullscreen</strong></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?= base_url ?>admin/login/logout" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong>Logout</strong></a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?= base_url ?>admin/login/logout" title="Sign Out" data-action="userLogout" data-logout-msg="Apakah anda yakin ingin logout ?"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->
				<!-- fullscreen button -->				
				<div class="btn-header transparent pull-right">
					<span> <a href="javascript:;" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
			</div>
			<!-- end pulled right: nav area -->
		</header>
		<!-- END HEADER -->
		<!-- #NAVIGATION -->
		<aside id="left-panel">
			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:;" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?= base_url ?>assets/admin-1/img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							<?= Request::sess('user_name'); ?>
						</span>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->
			<?php view('admin/navigation', $data) ?>
		</aside>
		<!-- END NAVIGATION -->
		<!-- MAIN PANEL -->
		<div id="main" role="main">
			<!-- RIBBON -->
			<div id="ribbon">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<?php if(isset($breadcrumb_1) AND $breadcrumb_1 !== null): ?>
						<li><a href="<?= $breadcrumb_1_url ?>"><?= $breadcrumb_1 ?></a></li>
					<?php endif; ?>
					<?php if(isset($breadcrumb_2) AND $breadcrumb_2 !== null): ?>
						<li><a href="<?= $breadcrumb_2_url ?>"><?= $breadcrumb_2 ?></a></li>
					<?php endif; ?>
					<?php if(isset($breadcrumb_3) AND $breadcrumb_3 !== null): ?>
						<li><a href="<?= $breadcrumb_3_url ?>"><?= $breadcrumb_3 ?></a></li>
					<?php endif; ?>
					<?php if(isset($breadcrumb_4) AND $breadcrumb_4 !== null): ?>
						<li><a href="<?= $breadcrumb_4_url ?>"><?= $breadcrumb_4 ?></a></li>
					<?php endif; ?>
				</ol>
				<!-- end breadcrumb -->
			</div>
			<!-- END RIBBON -->
			<?php echo (isset($page)) ? view('admin/'.$page, $data) : 'Not load any page' ?>
		</div>
		<!-- END MAIN PANEL -->
		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<span class="txt-color-white">Copyright © <?= $website['web_copyright'] ?></span>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->
		<!-- CHECK MODAL -->
		<div class="modal fade" id="ModalCheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog modal-sm">
			  	<div class="modal-content">
				  	<div class="modal-header">
					  	<h3 class="modal-title custom-font" id="LabelCheck"></h3>
				  	</div>
				  	<div class="modal-body" id="ContentCheck">
				  	</div>
				  	<div class="modal-footer">
					  	<button id="OkCheck" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Yes</button>
					 	<button class="btn btn-danger btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> No</button>
					 </div>
				  	<input type="hidden" id="idCheck">
			  	</div>
		  	</div>
		</div>
	</body>
</html>