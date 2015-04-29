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
		function editUser(){
			if (isset($_POST)){
				$array=$_POST;
				if (!isValidMd5($array['password'])){
					$array['password']=md5($array['password']);
				}
				$res=$this->model->editUser($array);
				if ($res){
					$output=array('msg'=>'Usuari actualitzat');
				} else{
					$output=array('msg'=>'Error en actualitzar...');
				}
				
				$this->ajax_set($output);
			}
		}

		function editAdverts(){
			header('location:'.APP_W.'adverts');
		}
	}