<?php
	
	final class Home extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();
			$this->model=new mHome($params);
			$this->view=new vHome;
			
		
		}

		function home(){
			
			//echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
		}
		function login(){
			if(isset($_POST['email'])){

	            $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	            $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));           
	            
	            $user=$this->model->log($email,$password);
	            //Coder::code($user);
	           
				if ($user == TRUE){
					setcookie('user',Session::get('user')->getEmail(),0,APP_W);
	                setcookie('rol', Session::get('user')->getRol(),0,APP_W);
	                $this->ajax_set(array('redirect'=>APP_W.'dashboard'));                
            	}
            	else{ 
            		 
            		
            		//Coder::code($this->model->get_out());
            		//die;
	                //Session::set('error',$this->model->get_out());
	                $this->log_error($this->model->get_out());
	                //setcookie('error',Session::get('error'),time()+120,APP_W);
	                //Coder::code_var($_SESSION);
	                $this->ajax_set(array('redirect'=>APP_W.'reg'));

            	}
        	}

				
			
		}
		function logout(){
			Session::destroy();
			
			unset($_COOKIE);

			header('Location:'.APP_W);

		}
	}