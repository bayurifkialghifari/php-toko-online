<!-- MAIN CONTENT -->
<div id="content">

	<!-- row -->
	<div class="row">
		
		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-table"></i> 
				
				<?= $title ?>
			</h1>
		</div>
		<!-- end col -->
		
	</div>
	<!-- end row -->
	
	<!--
		The ID "widget-grid" will start to initialize all widgets below 
		You do not need to use widgets if you dont want to. Simply remove 
		the <section></section> and you can use wells or panels instead 
		-->
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-0"
					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					</header>
	
					<!-- widget div-->
					<div>
						
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<input class="form-control" type="text">	
						</div>
						<!-- end widget edit box -->
						
						<!-- widget content -->
						<div class="widget-body">

							<div class="pull-right">
								<!-- <button class="btn btn-success btn-sm" id="tambah">
									<i class="fa fa-plus"></i> Add
								</button> -->
							</div>
				
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-class="expand"><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Code</th>
										<th data-hide="phone"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Name</th>
										<th data-hide="phone"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Type</th>
										<th data-hide="phone"><i class="fa fa-fw fa-file text-muted hidden-md hidden-sm hidden-xs"></i> File</th>
										<th data-hide="phone"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Account Number</th>
										<th data-hide="phone"><i class="fa fa-fw fa-money text-muted hidden-md hidden-sm hidden-xs"></i> Total</th>
										<th data-hide="phone"><i class="fa fa-fw fa-credit-card text-muted hidden-md hidden-sm hidden-xs"></i> Payment Type</th>
										<th data-hide="phone"><i class="fa fa-fw fa-bank text-muted hidden-md hidden-sm hidden-xs"></i> Bank Type</th>
										<th data-hide="phone"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Fraud Status</th>
										<th data-hide="phone"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
										<th data-hide="phone"><i class="fa fa-fw fa-thumb-tack text-muted hidden-md hidden-sm hidden-xs"></i>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($records as $q):?>
									<tr data-id="<?= $q['check_id'] ?>">
										<td><?=$q['check_code']?></td>
										<td><?=$q['user_name']?></td>
										<td><?=$q['checp_type']?></td>
										<td><?=$q['checp_file']?></td>
										<?php if($q['checp_type'] == 'manual') : ?>
											<td><?=$q['checp_account_number']?></td>
										<?php else : ?>
											<td><?=$q['checp_va_number']?></td>
										<?php endif; ?>
										<td><?=nominal($q['checp_gross_amount'])?></td>
										<td><?=$q['checp_payment_type']?></td>
										<td><?=$q['checp_bank']?></td>
										<td><?=$q['checp_fraud_status']?></td>
										<td><?=$q['check_status_value']?></td>
										<td>
											<button class="btn btn-primary btn-sm" onclick="Acc('<?= $q['check_code'] ?>')">
												<i class="fa fa-check"></i> Accept
											</button>
											<button class="btn btn-danger btn-sm" onclick="Refuse('<?= $q['check_code'] ?>')">
												<i class="fa fa-times"></i> Refuse
											</button>
										</td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>	
						</div>
						<!-- end widget content -->
						
					</div>
					<!-- end widget div -->
					
				</div>
				<!-- end widget -->
	
			</article>
			<!-- WIDGET END -->
			
		</div>
	
		<!-- end row -->
	
		<!-- row -->
	
		<div class="row">
	
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<!-- your contents here -->
			</div>
				
		</div>
	
		<!-- end row -->
	
	</section>
	<!-- end widget grid -->

</div>
<!-- END MAIN CONTENT -->
<script type="text/javascript">
    let type

    $(() =>
    {
    	// Execute Function
    	$('#OkCheck').on('click', ev => 
    	{ 
    		ev.preventDefault()

	    	$('#ModalCheck').modal('hide')
			
			// Done message execute data
    		$.doneMessage('Chenge status success.','<?= $title ?>')

    		// Id value
    		let id = $('#idCheck').val()

	    	// Execute data
	    	$.ajax({
    			method: 'put',
    			url: '<?= base_url ?>admin/sales-payment-list-update',
    			data: {
    				id: id,
    				type: type,
    			}
    		})
    		.then(data =>
    		{
		    	setInterval(() => { location.reload() }, 300)
    		})
    	})

    })

    // Acc button click
    const Acc = (id) =>
    {
    	type = 'SETTLEMENT'
    	$('#LabelCheck').html('Form Accept Payment')
    	$('#ContentCheck').html('Are you sure this payment is valid ?')
    	$('#ModalCheck').modal('show')
    	$('#idCheck').val(id)
    }

    // Refuse button click
    const Refuse = (id) =>
    {
    	type = 'FAILURE'
    	$('#LabelCheck').html('Form Refuse Payment')
    	$('#ContentCheck').html('Are you sure this payment not valid ?')
    	$('#ModalCheck').modal('show')
    	$('#idCheck').val(id)
    }
</script>