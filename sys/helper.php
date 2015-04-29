<?php
 

	function is_base(){
            if (APP_W!='/'){
               return false; 
            }
            else{
                return true;
            }
        }
    function isValidMd5($md5 ='')
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }
    
	//now the section for autoloading classes
	//first of all nullify previous autoload
	spl_autoload_register(null, false);

	spl_autoload_register('KAutoloader::SysLoader');
	spl_autoload_register('KAutoloader::AppContLoader');
	spl_autoload_register('KAutoloader::AppModLoader');
	spl_autoload_register('KAutoloader::AppVieLoader');
    
    
	//this class helps in class autoload
	class KAutoloader{
		static function SysLoader($class){
			$filename = strtolower($class) . '.php';
        	$file =ROOT.'sys'.DS.$filename;
        	if (!file_exists($file))
        	{
            	return false;
        	}
        	include $file;
		}
		static function AppContLoader($class){
			$filename = strtolower($class) . '.php';
        	$file =APP.'controllers'.DS.$filename;
        	
        	if (!file_exists($file))
        	{
            	return false;
        	}
        	require $file;
		}
		static function AppModLoader($class){
			$filename = strtolower($class) . '.php';
        	$file =APP.'models'.DS.$filename;
        	
        	if (!file_exists($file))
        	{
            	return false;
        	}
        	require $file;
		}
		static function AppVieLoader($class){
			$filename = strtolower($class) . '.php';
        	$file =APP.'views'.DS.$filename;
        	
        	if (!file_exists($file))
        	{
            	return false;
        	}
        	require $file;
		}
	}

    class KMenu{

        static function create($menu=array()){
            echo '<ul>';
            foreach ($menu as $item => $link) {
                echo '<a href="'.$link.'"><li>'.$item.'</li></a>';
            }
            echo '</ul>';
        }
    }
    class KButton{
        static function create($menu=array()){
            echo '<ul>';
            foreach ($menu as $item ) {
                echo '<button type="button">'.$item.'</button>';
            }
            echo '</ul>';
        }
    }

	 class Coder{
	 	static function code($var){
	 		echo '<pre>'.$var.'</pre>';
            die;
	 	}
	 	static function code_var($var){
	 		echo '<pre>'.var_dump($var).'</pre>';
            die;
	 	}
	 }
     class SQLParser{
        
        static function outComments($query){
            $sqlComments = '@(([\'"]).*?[^\\\]\2)|((?:\#|--).*?$|/\*(?:[^/*]|/(?!\*)|\*(?!/)|(?R))*\*\/)\s*|(?<=;)\s+@ms';
            $query = trim( preg_replace( $sqlComments, '$1', $query ) );
        
        //Eventually remove the last ;
        if(strrpos($query, ";") === strlen($query) - 1) {
            $query = substr($query, 0, strlen($query) - 1);
        }
        
        return $query;

        }
        public static function parse($content) {

        $sqlList = array();
        
        // Processing the SQL file content 
        $lines = explode("\n", $content);

        $query = "";
        
        // Parsing the SQL file content 
        foreach ($lines as $sql_line):
            $sql_line = trim($sql_line);
            if($sql_line === "") continue;
            else if(strpos($sql_line, "--") === 0) continue;
            else if(strpos($sql_line, "#") === 0) continue;
                
            $query .= $sql_line;
            // Checking whether the line is a valid statement
            if (preg_match("/(.*);/", $sql_line)) {
                $query = trim($query);
                $query = substr($query, 0, strlen($query) - 1);

                $query = SQLParser::outComments($query);
                
                //store this query
                $sqlList[] = $query;
                //reset the variable
                $query = "";
            }
            
        endforeach;

        return $sqlList;
    }
     
     }
	