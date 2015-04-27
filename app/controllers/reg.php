<?php
	
	class Reg extends Controller{
		
		function __construct($params){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();
			$this->model=new mReg($this->params);
			$this->view=new vReg;
			 
		}
		
		function home(){
					//	echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";	
		}
		function veruser(){
			if ($_POST){
				$email=$_POST['email'];
			}
			$result=$this->model->ver_user($email);
			if($result==true){
				$output=array('msg'=>'Usuari existent');
				$this->ajax_set($output);
				
			}
			else {
				$output=array('msg'=>'Usuari disponible');
				$this->ajax_set($output);
			}
		}
		function send(){
			if (isset($_POST)){
				$array=$_POST;
				unset($array['repassword']);
				$array['password']=md5($array['password']);
				
				$result=$this->model->send($array);
				if ($result){
					$this->log_msg($this->model->get_out());
					header('location:'.APP_W);

				}else{
					$this->log_error($this->model->get_out());
					//Coder::code_var($this->model->get_out());
					header('location:'.APP_W.'reg');
				}
			};
			
			
		}

	}