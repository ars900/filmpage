<?php


	class UsersController extends Controller{
		
		public $data = [];
		public $empty_keys = [];
		
		public function registration(){
			foreach($_POST as $key => $value){
				if(empty($value)){
					array_push($this -> empty_keys,$key);
				}
				
				$this -> data[$key] = $this -> model('users') -> cleanPosts($value);
				
			}
			if(count($this -> empty_keys) == 0){
				if(strlen($this -> data['password']) >= 6){
					$num = $this -> model('users') -> select() -> where('email','=',$this -> data['email']) -> execute() -> rowCount();
					if($num == 0){
						$res = $this -> model('users') -> insert($this -> data);
						if($res){
							set_session('reg_success',"Thank's!, You are Registrated");
						}
					}
						else{
							 $this -> email_error = 'Email is already exists!';
							 set_session('reg_email', $this -> email_error);
							 set_session('reg_form_values', $this -> data);
						}
				}
					 else{
						 $this -> pass_length = 'Minimum password length is 6.';
						 set_session('reg_pass_length', $this -> pass_length);
						 set_session('reg_form_values', $this -> data);
					 }
			}
				else{
					set_session('errors', $this -> empty_keys);
					set_session('reg_form_values', $this -> data);
				}
				redirect('/');
			
		}
		
		public function login(){
			if(empty($_POST['email']) || empty($_POST['email'])){
				$error = new ErrorController();
				$error -> render_error('empty_fields','All fields are required!');
				redirect('/');
			}
				else{
					$num = $this -> model('users') -> select() -> where('email','=',$_POST['email']) -> where('password','=',md5($_POST['password'])) -> execute() -> rowCount();
					if($num == 0){
						$error = new ErrorController();
						$error -> render_error('wrong_login','Wrong Email or Password!');
						redirect('/');
					}
						else{
							$fetch = $this -> model('users') -> select() -> where('email','=',$_POST['email']) -> where('password','=',md5($_POST['password'])) -> execute() -> fetch();
							set_session('user',$fetch);
							redirect('home');								
						}
					
				}
		}
		
	}
	
	

?>