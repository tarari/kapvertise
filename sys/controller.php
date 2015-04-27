<?php
	

	class Controller {
		protected $model;
		protected $view;
		protected $params;
		protected $conf;
		protected $session;
		protected $errors=array();

		function __construct($params){
			$this->params=$params;
			$this->conf=Registry::getInstance();
			if (isset($_SESSION['error'])){
					unset($_SESSION['error']);
				}
			
		}
		/**
		 * log_msg: sends a warning to view through COOKIES
		 * @param string $msg
		 * @return mixed
		 * 
		 **/
		protected function log_msg($msg){
			Session::set('msg',$msg);
			setcookie('msg',Session::get('msg'),time()+120,APP_W);
		}
		/**
		 * log_error: sends a error notice to view through COOKIES
		 * @param string $msg
		 * @return mixed
		 * 
		 **/
		protected function log_error($er){
			Session::set('error',$er);
			setcookie('error',Session::get('error'),time()+120,APP_W);
		//	$this->errors[]=$er;
		}

		protected function ajax_set($output){
			//prevously, in View, we must initiate output buffer, ob_start()
			ob_clean();
			$resp= json_encode($output);
			echo $resp;
      		
		}
	}