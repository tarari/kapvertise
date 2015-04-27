<?php
	class mUsers extends Model{

		function __construct($params){
			parent::__construct($params);
			$this->db=DB::singleton();
		
		}

		function lista(){
			$sql="SELECT name,email,rol FROM users";
			$stmt=$this->db->prepare($sql);
			$result=$stmt->execute();
			$rows=$stmt->fetchAll();
			
			return $rows;

		}
	}