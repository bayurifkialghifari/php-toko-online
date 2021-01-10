<?php 
	// SLIDER FUNCTION
	use App\Models\Slider_setting;

	$slider = Slider_setting::on([
		'slide_status' => 1,
		'slide_menu_id' => $menu_id,
	]);
?>

<section class="section-slide">
	<div class="wrap-slick1 rs2-slick1">
		<div class="slick1">
			
			<!-- FOREACH SLIDER -->
			<?php foreach($slider as $slide) : ?>
			<div class="item-slick1 bg-overlay1" style="background-image: url(<?= base_url ?>website/slide/<?= $slide['slide_image'] ?>);" data-thumb="<?= base_url ?>website/slide/<?= $slide['slide_image'] ?>" data-caption="<?= $slide['slide_caption'] ?>">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								<?= $slide['slide_text_1'] ?>
							</span>
						</div>
							
						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								<?= $slide['slide_text_2'] ?>
							</h2>
						</div>
							
						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="<?= base_url ?><?= $slide['slide_url'] ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								<?= $slide['slide_text_3'] ?>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach ?>
			<!-- FOREACH SLIDER -->

		</div>

		<div class="wrap-slick1-dots p-lr-10"></div>
	</div>
</section>