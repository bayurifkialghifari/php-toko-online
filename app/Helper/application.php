<?php

	function view($view, $data = [])
	{
		// Array key to new variable
		extract($data, EXTR_PREFIX_SAME, "wddx");

		require_once '../app/Views/' . $view . '.php';
	}

	function view_html_only($view, $data = [])
	{
		ob_start();

		view($view, $data);

		return ob_get_clean();
	}

	function load_helper($helper, $data = [])
	{
		// Array key to new variable
		extract($data, EXTR_PREFIX_SAME, "wddx");

		$data 					= [];

		require_once '../app/Helper/' . $helper . '.php';
	}

	function load_config($config, $data = [])
	{
		// Array key to new variable
		extract($data, EXTR_PREFIX_SAME, "wddx");

		$data 					= [];

		require_once '../app/Config/' . $config . '.php';
	}

	function nominal($number)
	{
	    $nominal 	= number_format($number,0,',','.');
	    
	    return $nominal;
	}

	function date_text($format)
	{
		$day = [
			'Sunday',
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday'
		];

		$day_id = date('w', strtotime($format));
		$day = $day[$day_id];

		$date = date('j', strtotime($format));

		$months  = [
			1 => 'January',
			2 => 'February',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December',
		];

		$months_code = date('n', strtotime($format));
		$months = $months[$months_code];
		$year = date('Y', strtotime($format));

		// {$day}, 
		
		return "{$date} {$months}, {$year}";
	}