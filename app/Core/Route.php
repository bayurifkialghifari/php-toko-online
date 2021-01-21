<?php
    
    namespace App\Core;

    class Route
    {
        private static $routes                  = array();
        private static $namespace               = 'App\Controllers';
        private static $pathNotFound            = null;
        private static $methodNotAllowed        = null;

        public static function add($expression, $function, $method_function = 'index', $method = 'get')
        {
            array_push(self::$routes, array(
                'expression'                    => $expression,
                'function'                      => $function,
                'method_function'               => $method_function,
                'method'                        => $method
            ));
        }

        public static function pathNotFound($function)
        {
            self::$pathNotFound                 = $function;
        }

        public static function methodNotAllowed($function)
        {
            self::$methodNotAllowed             = $function;
        }

        public static function parseURL()
        {
            if(isset($_GET['url']))
            {
                // Ngilangin / yang ada di akhir
                $url                            = rtrim($_GET['url'], '/');

                // Nglilangin huruf ajaib
                $url                            = filter_var($url, FILTER_SANITIZE_URL);

                // Ngubah Url ke bentuk array
                $url                            = explode('/', $url);

                return $url;
            }
        }

        public static function run($basepath    = '/')
        {

            // Parse current url
            $parsed_url                         = self::parseURL();//Parse Uri

            if($parsed_url !== null)
            {
                $path                           = implode('/',$parsed_url);

                $path                           = '/' . $path;
            }
            else
            {
                $path                           = '/';
            }

            // Get current request method
            $method                             = $_SERVER['REQUEST_METHOD'];

            // Params for controller
            $params                             = array();

            // Status route
            $route_match_found                  = false;

            // Route name for extra character
            $router_arr                         = array();
            $url_arr                            = array();

            // Cek route 
            foreach(self::$routes as $route)
            {
                // New route
                $route_new                      = explode('/', ltrim($route['expression'], '/'));
                // Check Route  
                $route_check                    = explode('/', ltrim($route['expression'], '/'));

                // Cek is array
                if($route_check[0] !== '' OR is_array($parsed_url))
                {
                    // Cek array lenght
                    if(count($route_check) === count($parsed_url))
                    {
                        // Check route name
                        for($i2 = 0;$i2 < count($route_check);$i2++)
                        {
                            if($route_check[$i2] === $parsed_url[$i2])
                            {
                                array_push($router_arr, $parsed_url[$i2]);
                                array_push($url_arr, $parsed_url[$i2]);
                            }
                        }

                        // Check Route name for extra character array
                        if(!empty($router_arr) AND !empty($url_arr))
                        {
                            // Cek special character
                            for($i = 0;$i < count($route_check);$i++)
                            {
                                // Sepcial character found
                                if(stristr($route_check[$i], ':'))
                                {
                                    // Move to params
                                    array_push($params, $parsed_url[$i]);
                                    
                                    // Unset array `:`
                                    unset($route_new[$i]);
                                    unset($parsed_url[$i]);
                                }
                            }

                            // Create new path
                            $route_new                      = implode('/', $route_new);
                            $path                           = implode('/', $parsed_url);
                        }
                    }
                }
                else
                {
                    // Create new path
                    $route_new                      = implode('/', $route_new);   
                    $path                           = ltrim($path, '/');
                }


                if($route_new                   === $path)
                {
                    // Cek method match
                    if(strtolower($method)      === strtolower($route['method']))
                    {
                        $route_match_found      = true;

                        // Matching route was found
                        $controller             = $route['function'];

                        // Chek string \
                        if(stristr($route['function'], '\\') === false)
                        {
                            $controller         = "\\{$route['function']}";
                        }

                        // Controller + namespace
                        $controller             = self::$namespace . $controller;

                        // Check class
                        if(class_exists($controller))
                        {
                            if(method_exists($controller, $route['method_function']))
                            {
                                $method         = $route['method_function'];
                            }

                            // Call class
                            call_user_func_array([  $controller, 
                                        $method   ],

                                        $params);
                        }

                        // Do not check other routes
                        break;
                    }
                }
            }

            // No matching route was found
            if(!$route_match_found)
            {
                header("HTTP/1.0 404 Not Found");

                // Method not match
                if(self::$methodNotAllowed)
                {
                    var_dump(self::$methodNotAllowed);
                    var_dump(array($path,$method));
                }

                if(self::$pathNotFound)
                {
                    var_dump(self::$pathNotFound);
                    var_dump(array($path));
                }
            }

        }

    }
