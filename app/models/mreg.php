<?php
	
	class mReg extends Model{

		function __construct($params){
			parent::__construct($params);
			$this->db=DB::singleton();
		
		}

		function ver_user($email){
			$sql="SELECT email 	FROM users WHERE email=:email";
			$stmt=$this->db->prepare($sql);
			$stmt->bindParam(':email',$email);
			$result=$stmt->execute();
			$count=$stmt->rowCount();
			if ($count==1){
				return true;
			}
			else{
				return false;
			}

		}
		
		function send($array){

			//checking if users exists yet
			$sql="SELECT email 	FROM users WHERE email=:email";
			$stmt=$this->db->prepare($sql);
			$stmt->bindParam(':email',$array['email']);
			$result=$stmt->execute();
			$count=$stmt->rowCount();
			if ($count==0){
				$sql="call sp_new_user(?,?,?,2)";
				$stmt=$this->db->prepare($sql);
				$stmt->bindParam(1,$array['name']);
				$stmt->bindParam(2,$array['password']);
				$stmt->bindParam(3,$array['email']);
				$result=$stmt->execute();
				$this->data_out='Usuari registrat';
				return true;
			}
			else{//$result false
				$this->data_out='Usuari ja existeix';
				return false;
			}
			
			
	
		
			
		}
	}