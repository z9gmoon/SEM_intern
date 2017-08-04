<?php 
	namespace App\lib;

	/**
	* 
	*/
	class changeIDProject
	{
		
	    public function idName($id){
	      if($id<10){
	        $_string = "P00";  
	      }
	      else if($id<100){
	        $_string = "P0";
	      }
	      else if($id<1000){
	        $_string = "P";
	      }
	      return $_string.$id;
	    }
	}
 ?>