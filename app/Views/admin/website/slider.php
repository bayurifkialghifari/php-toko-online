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
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Menu</th>
										<th data-class="expand"><i class="fa fa-fw fa-child text-muted hidden-md hidden-sm hidden-xs"></i> Caption</th>
										<th data-hide="phone"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Description</th>
										<th data-class="expand"><i class="fa fa-fw fa-list-ol text-muted hidden-md hidden-sm hidden-xs"></i> Index</th>
										<th data-hide="phone"><i class="fa fa-fw fa-link text-muted hidden-md hidden-sm hidden-xs"></i> Url</th>
										<th data-hide="phone"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
										<th data-hide="phone"><i class="fa fa-fw fa-thumb-tack text-muted hidden-md hidden-sm hidden-xs"></i>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($records as $q):?>
									<tr data-id="<?= $q['slide_id'] ?>">
										<td><?=$q['menu_name']?></td>
										<td><?=$q['slide_caption']?></td>
										<td><?=$q['slide_description']?></td>
										<td><?=$q['slide_index']?></td>
										<td><?=$q['slide_url']?></td>
										<td><?=$q['slide_status']?></td>
										<td>
											<div>
												<button class="btn btn-warning btn-sm" onclick="Detail(<?= $q['slide_id'] ?>, <?= $q['slide_menu_id'] ?>, '<?= $q['slide_caption'] ?>', '<?= $q['slide_image'] ?>', '<?= $q['slide_description'] ?>', '<?= $q['slide_url'] ?>', '<?= $q['slide_text_1'] ?>', '<?= $q['slide_text_2'] ?>', '<?= $q['slide_text_3'] ?>', '<?= $q['slide_index'] ?>', '<?= $q['slide_status'] ?>')">
													<i class="fa fa-eye"></i> Detail
												</button>
												<button class="btn btn-primary btn-sm" onclick="Update(<?= $q['slide_id'] ?>, <?= $q['slide_menu_id'] ?>, '<?= $q['slide_caption'] ?>', '<?= $q['slide_image'] ?>', '<?= $q['slide_description'] ?>', '<?= $q['slide_url'] ?>', '<?= $q['slide_text_1'] ?>', '<?= $q['slide_text_2'] ?>', '<?= $q['slide_text_3'] ?>', '<?= $q['slide_index'] ?>', '<?= $q['slide_status'] ?>')">
													<i class="fa fa-edit"></i> Update
												</button>
												<button class="btn btn-danger btn-sm" onclick="Delete(<?= $q['slide_id'] ?>)">
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
						<div class="col-md-12">
							<div class="form-group">
								<label for="tanggal">Menu</label>
								<select class="form-control" name="menu" id="menu">
									<option value="">--Select Menu--</option>
									<?php foreach($menu as $p) : ?>
										<option value="<?= $p['menu_id'] ?>"><?= $p['menu_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Image</label>
								<input type="file" id="image" class="form-control" name="image" placeholder="Image" accept="image/*" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Preview Image</label>
								<br>
								<img src="" id="image-preview" width="50%"> 
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
								<label for="tanggal">Caption</label>
								<input type="text" id="caption" class="form-control" name="caption" placeholder="Caption" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="tanggal">Text 1</label>
								<input type="text" id="text-1" class="form-control" name="text-1" placeholder="Text 1" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="tanggal">Text 2</label>
								<input type="text" id="text-2" class="form-control" name="text-2" placeholder="Text 2" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="tanggal">Text 3 ( Button )</label>
								<input type="text" id="text-3" class="form-control" name="text-3" placeholder="Text 3" required />
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

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Url</label>
								<input type="text" id="url" class="form-control" name="url" placeholder="Hyperlink" required />
							</div>
						</div>
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
	// File Review Function
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

    // On Change Review File
    $("#image").change(function () {
        readURL(this, 'image-preview')
    })

    let type

    $(() =>
    {
	    // Submit
	    $('#form').submit(ev =>
	    {
	    	ev.preventDefault()

	    	$('#myModal').modal('hide')

	    	let fd = new FormData()

	    	let id = $('#id').val()
	    	let menu = $('#menu').val()
	    	let index = $('#index').val()
	    	let caption = $('#caption').val()
	    	let text_1 = $('#text-1').val()
	    	let text_2 = $('#text-2').val()
	    	let text_3 = $('#text-3').val()
	    	let url = $('#url').val()
	    	let description = $('#description').val()
	    	let status = $('#status').val()
	    	let image = $('#image')[0].files[0]

	    	// Form data append
	        fd.append('slide_menu_id', menu)
	        fd.append('slide_index', index)
	        fd.append('slide_caption', caption)
	        fd.append('slide_text_1', text_1)
	        fd.append('slide_text_2', text_2)
	        fd.append('slide_text_3', text_3)
	        fd.append('slide_url', url)
	        fd.append('slide_description', description)
	        fd.append('slide_status', status)

	        // Check if image not change
	        if(image !== undefined)
	        {
	        	fd.append('image', image)
	        }

	    	// Add data function
	    	if(type == 'ADD')
	    	{
		    	// Done message add data
	    		$.doneMessage('Add data success.','<?= $title ?>')

		    	// Execute add data
	    		$.ajax({
	    			method: 'post',
	    			url: '<?= base_url ?>admin/website-slider-create',
		            data: fd,
		            processData: false,
		            contentType: false,
		            cache: false,
		            async: false,
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

		        fd.append('slide_id', id)

		    	// Execute update data
	    		$.ajax({
	    			method: 'post',
	    			url: '<?= base_url ?>admin/website-slider-update',
	    			data: fd,
		            processData: false,
		            contentType: false,
		            cache: false,
		            async: false,
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
    			url: '<?= base_url ?>admin/website-slider-delete',
    			data: {
    				slide_id: id
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
    	$('#menu').val('')
    	$('#index').val('')
    	$('#caption').val('')
    	$('#text-1').val('')
    	$('#text-2').val('')
    	$('#text-3').val('')
    	$('#url').val('')
    	$('#description').val('')
    	$('#status').val('')
    	$('#image').val('')
    	$('#image').prop('required', 'required')
    	$('#image-preview').prop('src', '')
    	$('#myModalLabel').html('Add Data <?= $title ?>')
    	$('#myModal').modal('show')
    	$('.modal-footer').css('display', 'block')
    })

    // Detail Slider
    const Detail = (id, menu, caption, image, description, url, text_1, text_2, text_3, index, status) =>
    {
    	type = 'UPDATE'
    	$('#id').val(id)
    	$('#menu').val(menu)
    	$('#index').val(index)
    	$('#caption').val(caption)
    	$('#text-1').val(text_1)
    	$('#text-2').val(text_2)
    	$('#text-3').val(text_3)
    	$('#url').val(url)
    	$('#description').val(description)
    	$('#status').val(status)
    	$('#image').val('')
    	$('#image').prop('required', false)
    	$('#image-preview').prop('src', `<?= base_url ?>website/slide/${image}`)
	    $('#myModalLabel').html('Detail Data <?= $title ?>')
    	$('#myModal').modal('show')
    	$('.modal-footer').css('display', 'none')
    }

	// Update button click
    const Update = (id, menu, caption, image, description, url, text_1, text_2, text_3, index, status) =>
    {
    	type = 'UPDATE'
    	$('#id').val(id)
    	$('#menu').val(menu)
    	$('#index').val(index)
    	$('#caption').val(caption)
    	$('#text-1').val(text_1)
    	$('#text-2').val(text_2)
    	$('#text-3').val(text_3)
    	$('#url').val(url)
    	$('#description').val(description)
    	$('#status').val(status)
    	$('#image').val('')
    	$('#image').prop('required', false)
    	$('#image-preview').prop('src', `<?= base_url ?>website/slide/${image}`)
	    $('#myModalLabel').html('Update Data <?= $title ?>')
    	$('#myModal').modal('show')
    	$('.modal-footer').css('display', 'block')
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