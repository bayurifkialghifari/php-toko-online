<?php
	
	function redirect($url)
	{
		echo "<script>window.location = '{$url}'</script>";
	}

	function redirect_back()
	{
		echo "<script>window.location = '".$_SERVER['HTTP_REFERER'] . "'</script>";
	}

	function alert($alert)
	{
		echo "<script>alert('{$alert}')</script>";
	}

	function base_url()
	{
		return base_url;
	}

	function generateFont($length = 20) 
	{
	    $str 		= "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max 		= count($characters) - 1;
		
		for ($i = 0; $i < $length; $i++) 
		{
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}

		return $str;
	}