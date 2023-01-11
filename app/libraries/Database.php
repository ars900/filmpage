<?php

	class Database{
		private $con;
		private $query;
		private $sql_str;
		protected $table_name;
		public function __construct(){
			$this -> con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($this -> con -> connect_errno){
				echo "Failed to connect to MySQL:" . $this -> con -> connect_error;
				exit();
			}
			
			
		}
		
		
		//----Insert Query ----//
		
		public function insert($data){
			$fields_name = '';
			$values = '';
			foreach($data as $key => $value){
				if($key == 'password'){
					$values .= "'".md5($value)."'".',';
				}
				else{
					$values .= "'".$value."'".',';
				}
				$fields_name .= $key.',';
			}
			$fields_name = substr($fields_name, 0, -1);
			$values = substr($values, 0, -1);

			$this -> sql_str = "INSERT INTO ".$this -> table_name."(".$fields_name.") VALUES (".$values.")";
			
			$insert = $this -> execute();
			return $this -> query;
		}
		
		
		
		
		//----Select Query ----//
		
		public function select(){
			$this->sql_str = "SELECT * FROM ".$this->table_name."";
			return $this;
		}
		
		public function where($field_name, $operator, $value){
			if(strpos($this -> sql_str, 'WHERE')){
				$this -> sql_str .= ' AND '.$field_name.$operator."'".$value."'";
			}
			else{
				$this -> sql_str .= " WHERE ".$field_name.$operator."'".$value."'";
			}
			return $this;
		}
		
		
		//----rowCount Query ----//
		
		public function rowCount(){
			$count = mysqli_num_rows($this -> query);
			return $count;
		}
			//----Delete Query ----//
			
		public function delete_film() {
				$this->sql_str = "DELETE FROM ".$this->table_name."";
			return $this;
		}
		
		//----Update Query ----//
		
		public function update($data){
			
			$this -> sql_str = 'UPDATE '.$this -> table_name.' SET ';
			
			foreach($data as $key => $value){
				$this ->sql_str .= "".$key."="."'".$value."',";
			}
			$this -> sql_str = substr($this -> sql_str, 0, -1);
			
			return $this;
		}
		
		//----Execute Query ----//
		
		public function execute(){
			$this -> query = mysqli_query($this -> con, $this -> sql_str);
			return $this;
		}
		
		//----Clean posts----//
	
	
		function cleanPosts($data){
			$data = trim($data);
			$data = htmlspecialchars($data);
			$data = mysqli_real_escape_string($this -> con, $data);
			return $data;
		}
		
		//-------- Get Row -----------//
		
		public function fetch(){
			$fetch = mysqli_fetch_assoc($this->query);
			return $fetch;
		}
		
		//--------- Get Rows ------------//
		
		public function fetchAll(){
			$data = [];
			
			while($fetch = mysqli_fetch_assoc($this->query)){
				array_push($data, $fetch);
			}
			return $data;
		}
		
		
		//----Order----//
		
		public function order($field_name){
			$this->sql_str .= " ORDER BY ".$field_name." DESC";
			return $this;
		}
		
		//----Limit----//
		
		public function limit(){
			//$this->sql_str = "LIMIT".;
			return $this;
		}
		
	}

?>