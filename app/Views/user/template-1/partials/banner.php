<?php  
	// SLIDER FUNCTION
	use App\Models\Banner_setting;

	$banner = Banner_setting::on([
		'bann_status' => 1,
		'bann_menu_id' => $menu_id,
	])->fetch_assoc();
?>

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?= base_url ?>website/banner/<?= $banner['bann_image'] ?>');">
	<h2 class="ltext-105 cl0 txt-center">
		<?= $banner['bann_name'] ?>
	</h2>
</section>