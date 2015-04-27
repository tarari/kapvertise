<?php
    
    class user{
        public $name;
        
        public $email;
        
        public $rol;
        
        
        function __construct($name,$email,$rol) {
            $this->name=$name;  
            $this->email=$email;
            $this->rol=$rol;
            
        }
        
        function getName(){
            return $this->name;
        }
        
        function getEmail(){
            return $this->email;
        }
        
        
        function getRol(){
            return $this->rol;
        }
        
    }