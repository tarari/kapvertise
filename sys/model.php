<?php
	

	class Model {
			protected $db;
			protected $params_in;
			protected $data_out;
			protected $conf;

		function __construct($params=null){
			$this->conf=Registry::getInstance();

			$this->params_in=$params;
			if($this->conf->deployed!='false'){
				$this->db=DB::singleton();
       			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
		}
		public function get_out(){
			return $this->data_out;
		}

		public function llist($table){
			$sql="SELECT * FROM ".$table;
			$stmt=$this->db->prepare($sql);
			$result=$stmt->execute();
			if ($result){
				$objs=$stmt->fetchAll(PDO::FETCH_OBJ);
			}

		}
	}