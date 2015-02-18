<?php
	final class mHome extends Model{
		
		function __construct($params){
			parent::__construct($params);
			$this->db=DB::singleton();
			// a litle prove in--->out
			$this->data_out=$params;
		}
		function get_out(){
			return $this->data_out;
		}
		
	}