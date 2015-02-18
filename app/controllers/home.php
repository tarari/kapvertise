<?php
	final class home extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mHome($params);
			$this->view=new vHome;
		}
		function home(){
			//we can comprove that we pass the parameters
			//var_dump($this->params);
			//echo "   Action";
			//Accedim a valors de configuració
			Coder::code_var($this->model->get_out());
			echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
		}
		function login(){
			$user=$_POST['email'];
			echo $user;
		}
	}