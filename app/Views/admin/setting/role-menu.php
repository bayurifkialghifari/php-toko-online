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
								<button class="btn btn-success btn-sm" id="tambah">
									<i class="fa fa-plus"></i> Add
								</button>
							</div>
				
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Level</th>
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Parent</th>
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Menu</th>
										<th data-hide="phone"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
										<th data-hide="phone"><i class="fa fa-fw fa-thumb-tack text-muted hidden-md hidden-sm hidden-xs"></i>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($records as $q):?>
									<tr data-id="<?= $q['role_id'] ?>">
										<td><?=$q['lev_name']?></td>
										<td><?=$q['parent']?></td>
										<td><?=$q['menu_name']?></td>
										<td><?=$q['role_status']?></td>
										<td>
											<button class="btn btn-primary btn-sm" onclick="Update(<?= $q['role_id'] ?>, <?= $q['role_lev_id'] ?>, <?= $q['parent_id'] ?>, <?= $q['menu_id'] ?>, '<?= $q['role_status'] ?>')">
												<i class="fa fa-edit"></i> Update
											</button>
											<button class="btn btn-danger btn-sm" onclick="Delete(<?= $q['role_id'] ?>)">
												<i class="fa fa-trash"></i> Delete
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama"> Level</label>
								<select class="form-control" required id="level">
									<option value="">--Select Level--</option>
									<?php foreach($level as $lev) : ?>
										<option value="<?= $lev['lev_id'] ?>"><?= $lev['lev_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama"> Menu</label>
								<select class="form-control" required id="menu">
									<option value="">--Select Menu--</option>
									<?php foreach($parent as $pa) : ?>
										<option value="<?= $pa['menu_id'] ?>"><?= $pa['menu_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama"> Sub Menu</label>
								<select class="form-control" id="sub_menu">
									<option value="">--Select Sub Menu--</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="name"> Status</label>
								<select class="form-control" required id="status">
									<option value="">--Select Status--</option>
									<option value="1">Active</option>
									<option value="0">Not Active</option>
								</select>
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
						Submit
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						Cancel
					</button>
				</div>
			</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    let type

    // Onchange Function
    const menu_onchange = (parent = null, sub_menu= null) =>
    {
		let menu = (parent == null) ? $('#menu').val() : parent

		// Get data sub menu
		$.ajax({
			method: 'get',
			url: `<?= base_url ?>admin/setting/role-menu-submnu/${menu}`,
			data: null
		})
		.then(data => JSON.parse(data))
		.then(data => 
		{
			$('#sub_menu').html('<option value="">--Select Sub Menu--</option>')

			$.each(data, (value, key) =>
			{
				$('#sub_menu').append(`<option value='${key.menu_id}' ${(key.menu_id == sub_menu) ? 'selected' : ''}>${key.menu_name}</option>`)
			})
		})
    }

    $(() =>
    {
	    // Submit
	    $('#form').submit(ev =>
	    {
	    	ev.preventDefault()

	    	$('#myModal').modal('hide')

	    	let id = $('#id').val()
	    	let level = $('#level').val()
	    	let menu = $('#menu').val()
	    	let sub_menu = $('#sub_menu').val()
	    	let status = $('#status').val()

	    	// Add data function
	    	if(type == 'ADD')
	    	{
		    	// Done message add data
	    		$.doneMessage('Add data success.','<?= $title ?>')

		    	// Execute add data
	    		$.ajax({
	    			method: 'post',
	    			url: '<?= base_url ?>admin/setting/role-menu-create',
	    			data: {
	    				lev_id: level,
	    				menu_id: menu,
	    				menu_menu_id: sub_menu,
	    				role_status: status,
	    			}
	    		})
	    		.then(data => JSON.parse(data))
	    		.then(data =>
	    		{
			    	setInterval(() => { location.reload() }, 300)
	    		})
	    	}
	    	// Update data function
	    	else
	    	{
		    	// Done message update data
	    		$.doneMessage('Update data success.','<?= $title ?>')

		    	// Execute update data
	    		$.ajax({
	    			method: 'put',
	    			url: '<?= base_url ?>admin/setting/role-menu-update',
	    			data: {
	    				role_id: id,
	    				lev_id: level,
	    				menu_id: menu,
	    				menu_menu_id: sub_menu,
	    				role_status: status,
	    			}
	    		})
	    		.then(data => JSON.parse(data))
	    		.then(data =>
	    		{
			    	setInterval(() => { location.reload() }, 300)
	    		})	
	    	}
	    })

    	// Delete Execute Function
    	$('#OkCheck').on('click', ev => 
    	{ 
    		ev.preventDefault()

	    	$('#ModalCheck').modal('hide')
			
			// Done message delete data
    		$.doneMessage('Delete data success.','<?= $title ?>')

    		// Id value
    		let id = $('#idCheck').val()

	    	// Execute delete data
	    	$.ajax({
    			method: 'delete',
    			url: '<?= base_url ?>admin/setting/role-menu-delete',
    			data: {
    				role_id: id
    			}
    		})
    		.then(data =>
    		{
		    	setInterval(() => { location.reload() }, 300)
    		})
    	})

    	// Menu Onchange Function
    	$('#menu').on('change', ev =>
    	{
    		ev.preventDefault()

	    	menu_onchange()
    	})

    })

	// Add button click
    $('#tambah').on('click', ev =>
    {
    	ev.preventDefault()

    	type = 'ADD'
    	$('#id').val('')
    	$('#level').val('')
    	$('#menu').val('')
    	$('#sub_menu').val('')
    	$('#status').val('')
    	$('#myModalLabel').html('Add Data <?= $title ?>')
    	$('#myModal').modal('show')
    })

	// Update button click
    const Update = (id, level, parent, menu, status) =>
    {
		type = 'UPDATE'
    	menu_onchange(parent, menu)
    	$('#id').val(id)
    	$('#level').val(level)
    	$('#menu').val(parent)
    	$('#status').val(status)
    	$('#sub_menu').val(menu)
	    $('#myModalLabel').html('Update Data <?= $title ?>')
    	$('#myModal').modal('show')
    }

    // Delete button click
    const Delete = (id) =>
    {
    	$('#LabelCheck').html('Form Delete <?= $title ?>')
    	$('#ContentCheck').html('Are you sure to delete this item ?')
    	$('#ModalCheck').modal('show')
    	$('#idCheck').val(id)
    }
</script>