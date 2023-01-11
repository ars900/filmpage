<?php

	class Core{
		protected $currentController = 'IndexController';
		protected $currentMethod = 'index';
		protected $params = [];
		public function __construct(){
			$url = $this -> getUrl();
			if(count($url)>0 && file_exists('app/controllers/'.ucwords($url[0].'Controller').'.php')){
				$this -> currentController = ucwords($url[0].'Controller');
			}
			require_once 'app/controllers/'.$this -> currentController.'.php';
			$this -> currentController = new $this -> currentController;
			
			if(isset($url[1])){
				
				if(method_exists($this -> currentController, $url[1])){
					$this -> currentMethod = $url[1];
				}
					else{
						var_dump(1);
						$error = new ErrorController();
						$error -> page_404();
						exit;
					}
			}
			
			if(isset($url[2])){
				
				$this -> params =$url[2];
			}
			call_user_func_array([$this -> currentController, $this -> currentMethod],[$this -> params]);
		}
		
		public function getUrl(){
			$url = rtrim($_SERVER['REQUEST_URI'],'/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/',$url);
			unset($url[0]);
			$url = array_values($url);
			
			return $url;
		}
	}

?>