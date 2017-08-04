<?php 
	namespace App\lib;

	/**
	* 
	*/
	class changeIDTeam
	{
		
	    public function idName($id){
	      if($id<10){
	        $_string = "T00";  
	      }
	      else if($id<100){
	        $_string = "T0";
	      }
	      else if($id<1000){
	        $_string = "T";
	      }
	      return $_string.$id;
	    }
	}
 ?>