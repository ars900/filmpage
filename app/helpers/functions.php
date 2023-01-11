<?php
	
	
		//----Change location----//
		
	function redirect($url){
		if($url == '/'){
			header('Location:'.URLROOT);
		}
		else{
			header('Location:'.URLROOT.$url);
		}
	}
	
	//----Set session----//
	
	function set_session($name, $value){
		$_SESSION[$name] = $value;
		if(isset($_SESSION[$name])){
			return true;
		}
		else{
			return false;
		}
	}
	
	//----Get Session VAriable----//
	
	function get_session($name){
		if (isset($_SESSION[$name])){
			return $_SESSION[$name];
			
		}
		else{
			return null;
		}
	}
	
	//----remove Session VAriable----//
	
	function remove_session($name){
		if(isset($_SESSION[$name])){
			unset($_SESSION[$name]);
			return true;
		}
		else{
			return false;
		}
	}
	
	//---- get FILE format ----//
	
	function get_file_format($file_name){
        $array = explode('.', $file_name);
        $ext = end($array);
        return $ext;
    }
	
	 function change_file_name(){
		$t = microtime(true);
		$micro = sprintf("%06d",($t - floor($t)) * 1000000);
        $file_name = md5(date("Y h:i:s A" .$micro, $t));
        return $file_name;
    }
	
	function upload_file($tmp_name,$file_name,$path){
		$response = [
			'status' => '',
			'message' => '',
			'data' => ''
		];
		$allowed_ext = ['jpg','jpeg','png','gif','webp','mp4', 'H264', 'AVI', 'mov'];
		$file_format = get_file_format($file_name);
		if(in_array($file_format, $allowed_ext)){
			$new_file_name =change_file_name().'.'.$file_format;
			$upload = move_uploaded_file($tmp_name,$path.$new_file_name);
			if($upload){
				$response['status'] = 'success';
				$response['message'] = 'File has been uploaded';
				$response['data'] = $new_file_name;
			}else {
				$response['status'] = 'error';
				$response['message'] = 'Server Problems';
			}
		}else {
			$response['status'] = 'error';
			$response['message'] = 'File Type Is Incorrect!!!';
		}
		return $response;
	}
	
?>