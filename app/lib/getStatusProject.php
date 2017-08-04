<?php 
	namespace App\lib;

	/**
	* 
	*/
	class getStatusProject 
	{
		
		function getStatus($status){
			$_status;
			switch ($status) {
				case 0:
					$_status = 'New';
					break;
				case 1:
					$_status = 'Assigned';
					break;
				case 2:
					$_status = 'Feedback';
					break;
				case 3:
					$_status = 'In progress';
					break;
				case 4:
					$_status = 'Resolve';
					break;		
				default:
					# code...
					break;
			}
			return $_status;
		}
	}

 ?>