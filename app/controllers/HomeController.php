<?php

	class HomeController extends Controller{
		
		public function index(){
			$data = $this ->
							model('films') ->
							select() ->
							order('film_id') ->
							execute() ->
							fetchAll();
							
			$this->view('home', $data);
		}
	}

?>