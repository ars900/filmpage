<?php
	class AdminController extends Controller{
			public $empty_keys = [];
			
			public function index(){
				$this -> view('adminhome');
			}
			public function login(){
				redirect('adminhome');
			}
	}
?>	