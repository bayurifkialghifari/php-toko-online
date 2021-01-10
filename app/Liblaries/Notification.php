<?php

	namespace App\Liblaries;

	use Pusher\Pusher;

	class Notification
	{
		/**
        * @param
        *
        * Notification pusher
        *
        */
		private static $channel 	= '';
		private static $room 		= '';
		private static $data 		= [];

		/**
        * @var
        *
        * Create channel
        *
        */
		public function channel($channel)
		{
			self::$channel 			= $channel;
		}

		/**
        * @var
        *
        * Create room
        *
        */
		public function room($room)
		{
			self::$room 			= $room;
		}

		/**
        * @var
        *
        * Data list
        *
        */
		public function data($data)
		{
			self::$data 			= $data;
		}

		/**
        * @return
        *
        * Get channel
        *
        */
        public function get_channel()
        {
        	return self::$channel;
        }

        /**
        * @return
        *
        * Get room
        *
        */
        public function get_room()
        {
        	return self::$room;
        }

        /**
        * @return
        *
        * Get data
        *
        */
        public function get_data()
        {
        	return self::$data;
        }

        /**
        * @return
        *
        * Send Notification
        *
        */
        public function trigger($config = array())
        {
        	/**
			* APP_KEY Pusher liblary
			* 
			* 
			* key = "< API KEY YANG ADA DI PUSHER.COM >"
			* secret = "< SECRET KEY YANG ADA DI PUSHER.COM >"
			* cluster = "ap1"
			*/
			$options 				= array(
				'cluster' 	=> pusher_cluster,
				'useTLS' 	=> pusher_tls
			);

			$pusher 				= new Pusher(
				pusher_api_key,
				pusher_secret_key,
				pusher_app_key,
				$options
			);

			/**
			* Execute notification
			*/
			$exe 					= $pusher->trigger(self::$get_channel, self::$get_room, self::$get_data);

			return $exe;
        }
	}