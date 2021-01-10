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
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Parent</th>
										<th data-class="expand"><i class="fa fa-fw fa-child text-muted hidden-md hidden-sm hidden-xs"></i> Name</th>
										<th data-hide="phone"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Description</th>
										<th data-class="expand"><i class="fa fa-fw fa-list-ol text-muted hidden-md hidden-sm hidden-xs"></i> Index</th>
										<th data-hide="phone"><i class="fa fa-fw fa-desktop text-muted hidden-md hidden-sm hidden-xs"></i> Icon</th>
										<th data-hide="phone"><i class="fa fa-fw fa-link text-muted hidden-md hidden-sm hidden-xs"></i> Url</th>
										<th data-hide="phone"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
										<th data-hide="phone"><i class="fa fa-fw fa-thumb-tack text-muted hidden-md hidden-sm hidden-xs"></i>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($records as $q):?>
									<tr data-id="<?= $q['menu_id'] ?>">
										<td><?=$q['parent']?></td>
										<td><?=$q['menu_name']?></td>
										<td><?=$q['menu_description']?></td>
										<td><?=$q['menu_index']?></td>
										<td><i class="<?=$q['menu_icon']?>"></i> <?=$q['menu_icon']?></td>
										<td><?=$q['menu_url']?></td>
										<td><?=$q['menu_status']?></td>
										<td>
											<div>
												<button class="btn btn-primary btn-sm" onclick="Update(<?= $q['menu_id'] ?>, <?= $q['menu_menu_id'] ?>, '<?= $q['menu_name'] ?>', '<?= $q['menu_index'] ?>', '<?= $q['menu_icon'] ?>', '<?= $q['menu_status'] ?>', '<?= $q['menu_url'] ?>', '<?= $q['menu_description'] ?>')">
													<i class="fa fa-edit"></i> Update
												</button>
												<button class="btn btn-danger btn-sm" onclick="Delete(<?= $q['menu_id'] ?>)">
													<i class="fa fa-trash"></i> Delete
												</button>
											</div>
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
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Parent</label>
								<select class="form-control" name="menu_menu_id" id="menu_menu_id">
									<option value="">--Select Menu--</option>
									<?php foreach($parent as $p) : ?>
										<option value="<?= $p['menu_id'] ?>"><?= $p['menu_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Menu</label>
								<input type="text" id="name" class="form-control" name="name" placeholder="Menu" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Index</label>
								<input type="number" id="index" class="form-control" name="index" placeholder="Index" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Icon</label>
								<input type="text" id="icon" class="form-control" name="icon" placeholder="Icon" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="name"> Status</label>
								<select class="form-control" required id="status">
									<option value="">--Select Status--</option>
									<option value="1">Active</option>
									<option value="0">Not Active</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Url</label>
								<input type="text" id="url" class="form-control" name="url" placeholder="Hyperlink" required />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="name"> Description</label>
								<textarea class="form-control" id="description" placeholder="Description" rows="3" required ></textarea>
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

    $(() =>
    {
	    // Submit
	    $('#form').submit(ev =>
	    {
	    	ev.preventDefault()

	    	$('#myModal').modal('hide')

	    	let id = $('#id').val()
	    	let name = $('#name').val()
	    	let menu_menu_id = $('#menu_menu_id').val()
	    	let index = $('#index').val()
	    	let icon = $('#icon').val()
	    	let url = $('#url').val()
	    	let description = $('#description').val()
	    	let status = $('#status').val()

	    	// Add data function
	    	if(type == 'ADD')
	    	{
		    	// Done message add data
	    		$.doneMessage('Add data success.','<?= $title ?>')

		    	// Execute add data
	    		$.ajax({
	    			method: 'post',
	    			url: '<?= base_url ?>admin/setting/menu-create',
	    			data: {
	    				menu_name: name,
	    				menu_menu_id: menu_menu_id,
	    				menu_index: index,
	    				menu_icon: icon,
	    				menu_url: url,
	    				menu_description: description,
	    				menu_status: status,
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
	    			url: '<?= base_url ?>admin/setting/menu-update',
	    			data: {
	    				menu_id: id,
	    				menu_name: name,
	    				menu_menu_id: menu_menu_id,
	    				menu_index: index,
	    				menu_icon: icon,
	    				menu_url: url,
	    				menu_description: description,
	    				menu_status: status,
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
    			url: '<?= base_url ?>admin/setting/menu-delete',
    			data: {
    				menu_id: id
    			}
    		})
    		.then(data =>
    		{
		    	setInterval(() => { location.reload() }, 300) 
    		})
    	})

    })

	// Add button click
    $('#tambah').on('click', ev =>
    {
    	ev.preventDefault()

    	type = 'ADD'
    	$('#id').val('')
    	$('#name').val('')
    	$('#menu_menu_id').val('')
    	$('#index').val('')
    	$('#icon').val('')
    	$('#url').val('')
    	$('#description').val('')
    	$('#status').val('')
    	$('#myModalLabel').html('Add Data <?= $title ?>')
    	$('#myModal').modal('show')
    })

	// Update button click
    const Update = (id, menu_menu_id, name, index, icon, status, url, description) =>
    {
    	type = 'UPDATE'
    	$('#id').val(id)
    	$('#name').val(name)
    	$('#menu_menu_id').val(menu_menu_id)
    	$('#index').val(index)
    	$('#icon').val(icon)
    	$('#url').val(url)
    	$('#description').val(description)
    	$('#status').val(status)
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