<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			<?= $title ?>
		</span>
	</div>
</div>


<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">
					<div class="p-t-32">
						<h4 class="ltext-109 cl2 p-b-28">
							<?= $title ?>
						</h4>

						<table id="dt_basic" class="table table-responsive table-striped table-bordered" style="width:100%">
							<thead class="table-dark">
								<tr>
									<th>No</th>
									<th>Transaction Code</th>
									<th>Transaction date</th>
									<th>Paid date</th>
									<th>Total</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<!-- Transaction list -->
								<?php $no = 1; foreach($records as $r) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td>
											<a href="<?= base_url ?>my/checkout/list/detail/by/id/<?= $r['check_code'] ?>">
												<?= $r['check_code'] ?>
											</a>
										</td>
										<td><?= date_text($r['trans_date']) ?></td>
										<td><?= ($r['check_status_code'] > 0) ? date_text($r['trans_date']) : '-' ?></td>
										<td><?= nominal($r['check_total']) ?></td>
										<td class="text-primary"><?= $r['check_status_value'] ?></td>
										<td>
											<?php if($r['checp_type'] === '') : ?>
												<div class="text-center">
													<a href="<?= base_url ?>my/checkout/list/detail/by/id/<?= $r['check_code'] ?>" class="btn btn-warning btn-sm">Detail</a>
													<a href="<?= base_url ?>my/checkout/list/paid/by?id=<?= $r['check_code'] ?>" class="btn btn-success btn-sm">Paid</a>
													<button class="btn btn-danger btn-sm">Cancel</button>
												</div>
											<?php else : ?>
												<div class="text-center">
													<a href="<?= base_url ?>my/checkout/list/detail/by/id/<?= $r['check_code'] ?>" class="btn btn-warning btn-sm">Detail</a>
													<button class="btn btn-danger btn-sm">Cancel</button>
												</div>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
								<!-- # Transaction list -->
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 p-b-80">
				<div class="side-menu">
					<!-- <div class="bor17 of-hidden pos-relative">
						<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

						<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
					</div> -->

					<div class="p-t-55">
						<h4 class="mtext-112 cl2 p-b-33">
							Categories
						</h4>

						<ul>
							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Fashion
								</a>
							</li>

							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Beauty
								</a>
							</li>

							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Street Style
								</a>
							</li>

							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Life Style
								</a>
							</li>

							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									DIY & Crafts
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	