<?php

	class ErrorController extends Controller{
		
		public function page_404(){
			$this -> view('error');
		}
		
		public function render_error($key,$message){
			set_session($key,$message);
		}
		
		public function clean_errors(){
			foreach($_SESSION as $key => $value){
				if($key != 'user' && $key != 'admin'){
					unset($_SESSION[$key]);
				}
			}
		}
	}
	
?>