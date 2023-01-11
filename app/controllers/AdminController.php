<?php

	class AdminController extends Controller{
		public $empty_keys = [];
		public function index(){
			$this -> view('admin/index');
		}
		
		# ADMIN LOGIN FUNCTION
		
		public function login(){
			
				$num = $this -> model('admin') -> 
									select() -> 
									where('login','=',$_POST['login']) -> 
									where('password','=',$_POST['password']) -> 
									execute() -> 
									rowCount();
					if($num == 0){
						echo 0;
						
					}
						else{
							
							$fetch = $this ->
									model('admin') ->
									select() ->
									where('login','=',$_POST['login']) ->
									where('password','=',$_POST['password']) ->
									execute() ->
									fetch();
							set_session('admin',$fetch);
								
							echo 1;
						}
					
				
		}
		
		# LOAD FUNCTION
		
		public function home(){
			$fetch_films = $this ->
							model('films') ->
							select() ->
							order('film_id') ->
							execute() ->
							fetchAll();
			$this->view('admin/home', $fetch_films);
			
		}
		
		# ADD FILM FUNCTION
		
		public function film(){
			foreach($_POST as $key => $value){
				if(empty($value)){
					array_push($this -> empty_keys,$key);
					
				}
				
				$this -> data[$key] = $this -> model('films') ->
												cleanPosts($value);
				
			}
			if(count($this -> empty_keys) > 0){
				set_session('error_empty', $this -> empty_keys);
				set_session('film_form_values', $this -> data);
			
			
			}else{
				if($_FILES['image']['name'] != '' && $_FILES['video']['name'] != ''){
					$img_upload = upload_file($_FILES['image']['tmp_name'],$_FILES['image']['name'], PUBLICROOT.'/public/images/films/'); 
					$vid_ext = upload_file($_FILES['video']['tmp_name'],$_FILES['video']['name'], PUBLICROOT.'/public/videos/films/');
					
					if($img_upload['status'] == 'success'){
						$this -> data['image'] =  $img_upload['data'];
						if($vid_ext['status'] == 'success'){
							$this -> data['video'] =  $vid_ext['data'];
							$res = $this -> model('films') -> insert($this -> data);
							if($res){
								redirect('admin/home');
								set_session('reg_success',"Thank's!, film is added");
							}	
							
						}else{
							set_session('error_format',"wrong format!");
							set_session('film_form_values', $this -> data);
						}
					}else{
						set_session('error_format',"wrong format");
						set_session('film_form_values', $this -> data);
					}
					
				}else{
					set_session('error_empty',"empty files!");
					set_session('film_form_values', $this -> data);
				}
			}
				
			redirect('admin/home');
			
		}
		
		# DELETE FUNCTION
		
		public function delete_film(){
			$sel_fetch = $this -> model('films') ->
								select() ->
								where('film_id','=',$_POST['id']) ->
								execute() ->
								fetch();
			
			if(file_exists(PUBLICROOT.'/public/images/films/'.$sel_fetch['image']) && file_exists(PUBLICROOT.'/public/videos/films/'.$sel_fetch['video'])){
				
				unlink(PUBLICROOT.'/public/images/films/'.$sel_fetch['image']);
				unlink(PUBLICROOT.'/public/videos/films/'.$sel_fetch['video']);
			
			}
			$delete_film = $this -> model('films') ->
									delete_film() ->
									where('film_id','=',$_POST['id']) ->
									execute();
			if($delete_film){
				echo 1;
			}
		}
		
		# EDIT FUNCTION
		
		public function edit_film_butt(){
			$sel_fetch = $this -> model('films') ->
								select() ->
								where('film_id','=',$_POST['id']) ->
								execute() ->
								fetch();
			unset($sel_fetch['created_at']);
			$myJSON = json_encode($sel_fetch);
			
			echo $myJSON;
		}
		
		public function edit(){
			$data = [];
			foreach($_POST as $key => $value){
				if(empty($value)){
					array_push($this -> empty_keys,$key);
					
				}
				
					$data[$key] = $this -> model('films') -> 
											cleanPosts($value);
					
				
			}
			 unset($this -> empty_keys['image'],$this -> empty_keys['video']);

        if(count($this -> empty_keys) > 0){
			set_session('errors_edit', $this -> empty_keys);
			set_session('filmedit_form_values', $data);
			
			redirect('admin/home');
		}else {
			$select = $this -> model('films') ->
								select() ->
								where('film_id','=',$_POST['film_id']) ->
								execute() ->
								fetch();
            if($_FILES['image']['name'] != ''){
				$img_upload = upload_file($_FILES['image']['tmp_name'],$_FILES['image']['name'], PUBLICROOT.'/public/images/films/'); 
				if($img_upload['status'] == 'success'){
					$data['image'] =  $img_upload['data'];
					if(file_exists(PUBLICROOT.'/public/images/films/'.$select['image'])){
						unlink(PUBLICROOT.'/public/images/films/'.$select['image']);
					}
				}
			}
			if($_FILES['video']['name'] != ''){
				$vid_ext = upload_file($_FILES['video']['tmp_name'],$_FILES['video']['name'], PUBLICROOT.'/public/videos/films/');
				if($vid_ext['status'] == 'success'){
					$data['video'] =  $vid_ext['data'];
					if(file_exists(PUBLICROOT.'/public/videos/films/'.$select['video'])){
						unlink(PUBLICROOT.'/public/videos/films/'.$select['video']);
					}
				}
			}
				
				
				unset($data['id']);	
				$res = $this -> model('films') ->
								update($data)->
								where('film_id','=',$_POST['film_id']) ->
								execute();
				var_dump($res);
				if($res){
					
					redirect('admin/home');
				}
			

			}
			
		}
		
		
		# Search FUNCTION
		public function search(){
			$num = $this -> model('films') ->
							select() ->
							where('name ','LIKE ',"%".$_POST['name']."%") ->
							execute() ->
							rowCount();
			
		
			if($num > 0){
				
				$data = $this -> model('films') ->
									select() ->
									where('name ','LIKE ',"%".$_POST['name']."%") ->
									execute() ->
									fetchAll();
				$res = [
					'status' => 'found',
					'data' => $data
				];
				
				$myJSON = json_encode($res);
			
				echo $myJSON;
				
			}else{
				
				$res = [
					'status' => 'not found',
					'data' => null
				];
				$myJSON = json_encode($res);
			
				echo $myJSON;
			}
			
		}
	}

?>