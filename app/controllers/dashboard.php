<?php
	final class Dashboard extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();
			$this->model=new mDashboard($params);
			$this->view=new vDashboard;
		}

		function home(){

		}
		function listUsers(){
			$users=$this->model->listaUsers();
			
			//Coder::code_var($users);
			if (is_array($users)){
				Session::set('list','users');
				setcookie('list',$_SESSION['list'],time()+1200,APP_W);
				$this->ajax_set($users);
			}
			
		}
		function editAdverts(){
			header('location:'.APP_W.'adverts');
		}
	}