<?php
	
	namespace App\Liblaries;

	Class Pagination
	{
		/**
        * @param
        *
        * Pagination parameter
        *
        */
        private static $href;
		private static $page_now     = 0;
		private static $open_attr;
		private static $close_attr;
		private static $link_attr;

        private static $previous_btn = true;
        private static $next_btn     = true;
        private static $previous_html= 'Previous';
        private static $next_html    = 'Next';

        private static $anchor_class;
        private static $ul_class;
		private static $li_class;

		/**
        * @var
        *
        * Set href
        *
        */
        public function href($href)
        {
        	self::$href 		= $href;
        }

        /**
        * @var
        *
        * Set page_now
        *
        */
        public function page_now($page_now)
        {
            self::$page_now      = $page_now;
        }

		
		/**
        * @var
        *
        * Set anchor_class
        *
        */
        public function anchor_class($anchor_class)
        {
        	self::$anchor_class = $anchor_class;
        }

        /**
        * @var
        *
        * Set ul_class
        *
        */
        public function ul_class($ul_class)
        {
            self::$ul_class     = $ul_class;
        }

        /**
        * @var
        *
        * Set li_class
        *
        */
        public function li_class($li_class)
        {
            self::$li_class     = $li_class;
        }

        /**
        * @var
        *
        * Set previous_btn
        *
        */
        public function previous_btn($previous_btn)
        {
            self::$previous_btn  = $previous_btn;
        }

        /**
        * @var
        *
        * Set previous_html
        *
        */
        public function previous_html($previous_html)
        {
            self::$previous_html = $previous_html;
        }

        /**
        * @var
        *
        * Set next_btn
        *
        */
        public function next_btn($next_btn)
        {
            self::$next_btn     = $next_btn;
        }

        /**
        * @var
        *
        * Set next_html
        *
        */
        public function next_html($next_html)
        {
            self::$next_html    = $next_html;
        }

        /**
        * @var
        *
        * Set open attribute
        *
        */
        public function open_attr($open_attr)
        {
        	self::$open_attr 	= $open_attr;
        }

        /**
        * @var
        *
        * Set close attribute
        *
        */
        public function close_attr($close_attr)
        {
        	self::$close_attr 	= $close_attr;
        }

        /**
        * @var
        *
        * Set close attribute
        *
        */
        public function link_attr($link_attr)
        {
        	self::$link_attr 	= $link_attr;
        }

        /**
        * @return
        *
        * Get href
        *
        */
        public function get_href()
        {
        	return self::$href;
        }

        /**
        *
        * Get page_now
        *
        */
        public function get_page_now()
        {
            return self::$page_now;
        }

        /**
        * @return
        *
        * Get anchor_class
        *
        */
        public function get_anchor_class()
        {
        	return self::$anchor_class;
        }

        /**
        * @return
        *
        * Get ul_class
        *
        */
        public function get_ul_class()
        {
            return self::$ul_class;
        }

        /**
        * @return
        *
        * Get li_class
        *
        */
        public function get_li_class()
        {
            return self::$li_class;
        }

        /**
        * @return
        *
        * Set previous_btn
        *
        */
        public function get_previous_btn()
        {
            return self::$previous_btn;
        }

        /**
        * @return
        *
        * Set previous_html
        *
        */
        public function get_previous_html()
        {
            return self::$previous_html;
        }

        /**
        * @return
        *
        * Set next_btn
        *
        */
        public function get_next_btn()
        {
            return self::$next_btn;
        }

        /**
        * @return
        *
        * Set next_html
        *
        */
        public function get_next_html()
        {
            return self::$next_html;
        }

        /**
        * @return
        *
        * Get open_attr
        *
        */
        public function get_open_attr()
        {
        	return self::$open_attr;
        }

        /**
        * @return
        *
        * Get close_attr
        *
        */
        public function get_close_attr()
        {
        	return self::$close_attr;
        }

        /**
        * @return
        *
        * Get link_attr
        *
        */
        public function get_link_attr()
        {
        	return self::$link_attr;
        }
		

		/**
        * @var
        *
        * Create link pagination
        *
        */
		public function create_link($total = 10, $page = 1, $config = array())
		{
			/**
	        * @return
	        *
	        * Link pagination
	        *
	        */
			$pages 			= ceil($total / $page);

			/**
	        * @param
	        *
	        * Custom parameter for pagination link
	        *
	        */
	        $href 			= (isset($config['href'])) 			? $config['href'] 		    : self::get_href();
            $page_now       = (isset($config['page_now']))      ? $config['page_now']       : self::get_page_now();
            $anchor_class   = (isset($config['anchor_class']))  ? $config['anchor_class']   : self::get_anchor_class();
            $ul_class       = (isset($config['ul_class']))      ? $config['ul_class']       : self::get_ul_class();
            $li_class       = (isset($config['li_class']))      ? $config['li_class']       : self::get_li_class();
            $previous_btn   = (isset($config['previous_btn']))  ? $config['previous_btn']   : self::get_previous_btn();
            $previous_html  = (isset($config['previous_html'])) ? $config['previous_html']  : self::get_previous_html();
            $next_btn       = (isset($config['next_btn']))      ? $config['next_btn']       : self::get_next_btn();
	        $next_html 	    = (isset($config['next_html'])) 	? $config['next_html'] 	    : self::get_next_html();
	        $open_attr 		= (isset($config['open_attr'])) 	? $config['open_attr'] 	    : self::get_open_attr();
	        $close_attr 	= (isset($config['close_attr'])) 	? $config['close_attr']     : self::get_close_attr();
	        $link_attr 		= (isset($config['link_attr'])) 	? $config['link_attr'] 	    : self::get_link_attr();
            $link           = "<ul class='{$ul_class}'>";

            if($previous_btn === true AND $page_now > 1)
            {
                if($page > 1)
                {
                    $previous_href  = $page_now - 1;
        			$link 			.= "
                                            <li class='{$li_class}'>
                                                <a 
                                                    class='{$anchor_class}'
                                                    href='{$href}/{$previous_href}'>
                                                    {$previous_html}
                                                </a>
                                            </li>";
                }
            }

			for($i = 1;$i <= $pages;$i ++)
			{
                $active         = '';

                if($page_now == $i) 
                { 
                    $active     = 'active'; 
                }


				/**
		        * @var
		        *
		        * Create link pagination
		        *
		        */
				$link 	        .= "
                                    {$open_attr}
                                        <li class='{$li_class} {$active}'>
    								        <a 
            									class='{$anchor_class}' 
            									href='{$href}/{$i}'
            									{$link_attr}
    								        >
    										  {$i}
    								        </a>
                                        </li>
    							    {$close_attr}";

			}

            if($next_btn === true AND $page_now < $pages)
            {
                if($page < $pages)
                {
                    $next_href      = $page_now + 1;
                    $link           .= "
                                            <li class='{$li_class}'>
                                                <a 
                                                    class='{$anchor_class}'
                                                    href='{$href}/{$next_href}'>
                                                    {$next_html}
                                                </a>
                                            </li>";
                }
            }

            $link           .= "</ul>";

			return $link;
		}
	}