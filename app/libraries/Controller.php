<?php

  
	class Controller{
		private $allowed_user_pages = ['index', 'error'];
		private $allowed_admin_pages = ['index', 'error'];

        public function view($view,$data = false){
            $exp = explode('/',$view);

            if($exp[0] == 'admin'){
                if(get_session('admin') == null){
                    $view = 'admin/index';

                    if($_SERVER['REQUEST_URI'] != '/admin/index'){
                        redirect('admin/index');
                    }
                }
                    else{
                        $view = 'admin/home';
                        if($_SERVER['REQUEST_URI'] != '/admin/home'){
                            redirect('admin/home');
                        }
                        
                    }
            }

				else{

                    if(get_session('user') == null){
                        $view = 'index';
                        if($_SERVER['REQUEST_URI'] != '/index'){
                            redirect('index');

                        }
                            else{

                            }
                    }
                        else{
                            
                            if($view == 'home' || $view == 'index'){
                                if($_SERVER['REQUEST_URI'] != '/home'){
                                    redirect('home');
                                }
                            }
                        }
                }


            if(file_exists('app/views/pages/'.$view.'.php')){
                if($view == 'admin/index'){
                    require 'app/views/pages/layouts/adminheader.php';
                    require 'app/views/pages/'.$view.'.php';
                    require 'app/views/pages/layouts/adminfooter.php';
                }
                elseif($view == 'admin/home'){
                    require 'app/views/pages/layouts/adminheader.php';
                    require 'app/views/pages/'.$view.'.php';
                    require 'app/views/pages/layouts/adminfooter.php';
                }

                    else{
                        require 'app/views/pages/layouts/header.php';
                        require 'app/views/pages/'.$view.'.php';
                        require 'app/views/pages/layouts/footer.php';
                    }
            }
		}
			
			
			
				
		public function model($model){
			require_once APPROOT.'/models/'. ucwords($model) . '.php';
			return new $model();
		}
	}


?>