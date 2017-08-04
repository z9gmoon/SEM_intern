<?php 
	namespace App\lib;
	/**
	* 
	*/
	class changeIDName 
	{
	    public function idName($id){
	      if($id<10){
	        $_string = "EN00";  
	      }
	      else if($id<100){
	        $_string = "EN0";
	      }
	      else if($id<1000){
	        $_string = "EN";
	      }
	      return $_string.$id;
	    }
	}
 ?>