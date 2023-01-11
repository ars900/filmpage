<?php
	class FilmpageController extends Controller{
	
		public function index(){
			 $this->view('error');
		}
		
		
		public function fullFilm($id){
			
			if(empty($id)){
                $this->view('error');
            }
			else{
            $data = $this->model('films')->select()
                                            ->where('film_id','=',$id)
                                            ->execute()
                                            ->fetch();
			}
									
            if($id == null){
                $this->view('error');
            }
                else{
                    $this->view('filmpage',$data);
                }
        }
	}
?>