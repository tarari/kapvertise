<?php
	final class Users extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();
			$this->model=new mUsers($params);
			$this->view=new vUsers;
		}

		function home(){
		}
		function listUsers(){
			
		}
		function back(){
			
        	header("location:javascript://history.go(-1)");
    		}
		
	}