$(() => {
	
	/* BASIC */
	var responsiveHelper_dt_basic = undefined
	
	var breakpointDefinition = 
	{
		tablet : 1024,
		phone : 480
	}

	$.initBasicTable = (selector) => 
	{
		return $(selector).dataTable(
		{
			sDom: "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			autoWidth: true,
	        "oLanguage": 
	        {
			    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},
			preDrawCallback : () => 
			{
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) 
				{
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($(selector), breakpointDefinition)
				}
			},
			rowCallback: (nRow) => 
			{
				responsiveHelper_dt_basic.createExpandIcon(nRow)
			},
			drawCallback: (oSettings) => 
			{
				responsiveHelper_dt_basic.respond()
			},
		})
	}
})