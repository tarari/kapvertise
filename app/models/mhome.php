<?php
	
	final class mHome extends Model{
		
		function __construct($params){
			parent::__construct($params);
			$this->db=DB::singleton();
		
		}
		
		function log($email,$password){
        try{    
            $sql="SELECT name,email,rol FROM users WHERE email=? AND password=?";
            $query=$this->db->prepare($sql);
            $query->bindParam(1,$email);
            $query->bindParam(2,$password);
            $query->execute();
            $res=$query->fetch();
            if($query->rowCount()==1){
                Session::set('user',new user($res['name'],$res['email'],$res['rol']));
                //Coder::code_var($_SESSION);
                return TRUE;
            }
            else {

                $this->data_out="Usuari no existeix";
                return FALSE;
                 
            }
        }catch(PDOException $e){
            echo "Error:".$e->getMessage();
        }

        }
        
	}