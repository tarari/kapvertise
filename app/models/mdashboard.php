<?php
	final class mDashboard extends Model{
		
		function __construct($params){
			parent::__construct($params);
			$this->db=DB::singleton();
		
		}
		function listaUsers(){
			//$rows=$this->llist('users');
			$sql="SELECT id,name,email,pwd,rol FROM users";
			$stmt=$this->db->prepare($sql);
			$result=$stmt->execute();
			$rows=$stmt->fetchAll(PDO::FETCH_OBJ);
			
			return $rows;

		}
		function editUser($array){
			
			$sql="UPDATE users SET name=:name, email=:email, pwd=:password, rol=:rol WHERE id=:id";
			$stmt=$this->db->prepare($sql);
			$stmt->bindParam(':name',$array['name']);
			$stmt->bindParam(':password',$array['password']);
			$stmt->bindParam(':email',$array['email']);
			$stmt->bindParam(':rol',$array['rol'],PDO::PARAM_INT);
			$stmt->bindParam(':id',$array['id']);
			$result=$stmt->execute();
			if ($result==1){
				$this->data_out="Usuari modificat";
				return true;
			}
			else{
				$this->data_out="Error modificant usuari";
				return false;
			}
		}
	}