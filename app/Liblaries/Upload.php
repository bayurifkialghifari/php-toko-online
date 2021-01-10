<?php
	
	namespace App\Liblaries;

	Class Upload
	{
		/**
        * @param
        * 
        * File parameter
        *
        */
		private static $filename 		= '';
		private static $tmp_name 		= '';
		private static $folder 			= '/';
		private static $max_size 		= 50000; // Bytes 
		private static $allowed_type 	= '*';

		/**
        * @var
        * 
        * Set filename
        *
        */
        public function filename($filename)
        {
            self::$filename     = $filename;
        }

        /**
        * @var
        * 
        * Set tmp_name
        *
        */
        public function tmp_name($tmp_name)
        {
            self::$tmp_name     = $tmp_name;
        }

        /**
        * @var
        * 
        * Set folder
        *
        */
        public function folder($folder)
        {
            self::$folder      	= $folder;
        }

        /**
        * @var
        * 
        * Set max_size
        *
        */
        public function max_size($max_size)
        {
            self::$max_size     = $max_size;
        }

        /**
        * @var
        * 
        * Set allowed_type
        *
        */
        public function allowed_type($allowed_type)
        {
            self::$allowed_type = $allowed_type;
        }

        /**
        * @return
        * 
        * Get filename
        *
        */
        public function get_filename()
        {
            return self::$filename;
        }

        /**
        * @return
        * 
        * Get tmp_name
        *
        */
        public function get_tmp_name()
        {
            return self::$tmp_name;
        }

        /**
        * @return
        * 
        * Get folder
        *
        */
        public function get_folder()
        {
            return self::$folder;
        }

        /**
        * @return
        * 
        * Get max_size
        *
        */
        public function get_max_size()
        {
            return self::$max_size;
        }

        /**
        * @return
        * 
        * Get allowed_type
        *
        */
        public function get_allowed_type()
        {
            return self::$allowed_type;
        }

		/**
        * @var
        *
        * Upload file
        *
        */
		public function execute($name = null, $config = array())
		{
			/**
	        * @param
	        *
	        * File parameter check
	        *
	        */
			$filename 			= ($name !== null) 						? $name 					: self::get_filename();
			$tmp_name 			= (isset($config['tmp_name'])) 			? $config['tmp_name'] 		: self::get_tmp_name();
			$folder 			= (isset($config['folder']))  			? $config['folder']   		: self::get_folder();
			$max_size 			= (isset($config['max_size'])) 			? $config['max_size'] 		: self::get_max_size();
			$allowed_type 		= (isset($config['allowed_type']))  	? $config['allowed_type']   : self::get_allowed_type();
			

			/**
	        * @param
	        *
	        * Set parameter upload
	        *
	        */
			$target_dir 		= '../public/'  . $folder;
            $new_filename       = time() . basename($_FILES[$filename]['name']);
			$target_file 		= $target_dir  	. $new_filename;
			$imageFileType 		= strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		  	// $check = getimagesize($_FILES[$filename]['tmp_name']);
		  	// if($check !== false) {
		   	//  	echo 'File is an image - ' . $check['mime'] . '.';
		   	//  	$uploadOk = 1;
		  	// } else {
		   	//  	echo 'File is not an image.';
		   	//  	$uploadOk = 0;
		  	// }
			// Check if file already exists
			// if(file_exists($target_file)) 
			// {
			//   	echo 'Sorry, file already exists.';
			//   	$uploadOk = 0;
			// }

			/**
	        * @param
	        *
	        * Check file size
	        *
	        */
			if ($_FILES[$filename]['size'] > $max_size) 
			{
			  	echo 'Sorry, your file is too large.';
			  	
			  	die();
			}

			/**
	        * @param
	        *
	        * Check file format
	        *
	        */
	        if($allowed_type !== '*')
	        {
	        	/*
	        	* 
	        	* Check array type 
	        	* 
	        	*/
	        	if(is_array($allowed_type))
	        	{
	        		for($i = 0;$i < count($allowed_type);$i ++)
	        		{
	        			if($imageFileType !== $allowed_type[$i])
	        			{
						  	echo 'Sorry, '. $allowed_type[$i] .' file are allowed.';

						  	die();
	        			}
	        		}
	        	}
	        	/*
	        	* 
	        	* Check single type 
	        	* 
	        	*/
	        	else
	        	{
	        		if($imageFileType !== $allowed_type)
	        		{
					  	echo 'Sorry, '. $allowed_type .' file are allowed.';

					  	die();
	        		}
	        	}
	        }

	        /*
        	* 
        	* Execute upload file 
        	* 
        	*/
		  	if(move_uploaded_file($_FILES[$filename]['tmp_name'], $target_file)) 
		  	{
		    	return $new_filename;
		  	} 
		  	else 
		  	{
		    	echo 'Sorry, there was an error uploading your file.';

		    	die();
		  	}
		}
	}