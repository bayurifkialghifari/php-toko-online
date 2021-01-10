<?php

	namespace App\Liblaries;

	use App\Core\Model;

	Class SqliFilter extends Model
	{
		/**
        * @var
        *
        * Sqli clean
        *
        */
		public function sqli_clean($data)
		{
			$conn 		= parent::connect();

			return mysqli_real_escape_string($conn, $data);
		}
	}

