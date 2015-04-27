<?php
	final class mDashboard extends Model{
		
		function __construct($params){
			parent::__construct($params);
			$this->db=DB::singleton();
		
		}
		function listaUsers(){
			//$rows=$this->llist('users');
			$sql="SELECT id,name,email,password,rol FROM users";
			$stmt=$this->db->prepare($sql);
			$result=$stmt->execute();
			$rows=$stmt->fetchAll(PDO::FETCH_OBJ);
			
			return $rows;

		}
	}