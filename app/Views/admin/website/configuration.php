<!-- MAIN CONTENT -->
<div id="content">

	<!-- row -->
	<div class="row">
		
		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-comments-o"></i> 
				
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
							
						</div>
						<!-- end widget edit box -->
						
						<!-- widget content -->
						<div class="widget-body no-padding">
							
							<form id="form" class="smart-form">

								<fieldset>
									<section>
										<label class="label">Name</label>
										<label class="input"> <i class="icon-prepend fa fa-comments"></i>
											<input type="text" id="name" placeholder="Website Name" value="<?= $records['web_name'] ?>">
										</label>
									</section>

									<section>
										<label class="label">Language</label>
										<label class="input"> <i class="icon-prepend fa fa-comments"></i>
											<input type="text" id="language" placeholder="Website Language" value="<?= $records['web_language'] ?>">
										</label>
									</section>

									<section>
										<label class="label">Copyright</label>
										<label class="input"> <i class="icon-prepend fa fa-copyright"></i>
											<input type="text" id="copyright" placeholder="Website Copyright" value="<?= $records['web_copyright'] ?>">
										</label>
									</section>

									<section>
										<label class="label">Description</label>
										<label class="textarea"> <i class="icon-prepend fa fa-align-justify"></i>
											<textarea id="description" rows="3" placeholder="Website Description"><?= $records['web_description'] ?></textarea>
										</label>
									</section>

									<section>
										<label class="label">Website Type</label>
										<label class="select">
											<select id="type">
												<option value="" disabled>--Website Type--</option>
												<option value="Single" <?= ($records['web_type'] == 'Single') ? 'selected' : '' ?>>Single</option>
												<option value="Multi Vendor" <?= ($records['web_type'] == 'Multi Vendor') ? 'selected' : '' ?>>Multi Vendor</option>
											</select>
											<i></i>
										</label>
									</section>

									<div class="row">
										<section class="col col-6">
											<label class="label">Logo</label>
											<label class="input"> <i class="icon-prepend fa fa-file"></i>
												<input type="file" id="logo-website" accept="image/*">
											</label>
											<img id="logo-reviews" src="<?= base_url ?>website/configuration/<?= $records['web_logo'] ?>" width="50%">
										</section>
										<section class="col col-6">
											<label class="label">Icon</label>
											<label class="input"> <i class="icon-prepend fa fa-file"></i>
												<input type="file" id="icon-website" accept="image/*">
											</label>
											<img id="icon-reviews" src="<?= base_url ?>website/configuration/<?= $records['web_icon'] ?>" width="50%">
										</section>
									</div>

								</fieldset>

								<footer>
									<button type="submit" class="btn btn-primary">
										Save
									</button>
								</footer>
							</form>

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
	
	</section>
	<!-- end widget grid -->

</div>
<!-- END MAIN CONTENT -->

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
    $("#logo-website").change(function () {
        readURL(this, 'logo-reviews')
    })

    $('#icon-website').change(function () {
    	readURL(this, 'icon-reviews')
    })

    // Save Data
    $('#form').submit(ev =>
    {
    	// Done message update data
		$.doneMessage('Website configuration saved.','<?= $title ?>')

        ev.preventDefault()

        let fd = new FormData()

        // Get data
        let name = $('#name').val()
        let language = $('#language').val()
        let copyright = $('#copyright').val()
        let description = $('#description').val()
        let type = $('#type').val()
        let logo = $('#logo-website')[0].files[0]
        let icon = $('#icon-website')[0].files[0]

        // Form data append
        fd.append('web_name', name)
        fd.append('web_language', language)
        fd.append('web_copyright', copyright)
        fd.append('web_description', description)
        fd.append('web_type', type)

        // Check if logo or icon is not change
        if(logo !== undefined)
        {
        	fd.append('logo', logo)
        }

        if(icon !== undefined)
        {
        	fd.append('icon', icon)
        }

        // Save data
        $.ajax({
            url: '<?= base_url ?>admin/website-setting-post',
            method: 'post',
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
        })
        .then(data =>
        {
	    	setInterval(() => { location.reload() }, 300)		
        })
    })
    
</script>