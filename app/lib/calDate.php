<?php 
	namespace App\lib;

	/**
	* 
	*/
	class calDate
	{
		public function date($time,$join){
			$string = null;
			if(isset($join)==NULL){
				$string = "New Employee";
			}
			else if($time==0){
				$string = "Just leave";
			}
			else if($time==1){
				$string = $time. "Day";
			}
			else if($time<30){
				$string = $time." Days";				
			}
			else{
				$month = floor($time/30);
				$day = $time%30;
				// $string = $month.$day;
				$string = $month." ".$this->getStrMonth($month)." - ".$day." ".$this->getStrDay($day);	
			}
			return $string;
		}


		function getStrMonth($month){
			if($month==1){
				$strMonth = "Month";
			}else{
				$strMonth = "Months";
			}
			return $strMonth;
		}
		function getStrDay($day){
			if($day==1){
				$strDay = "Day";
			}else{
				$strDay = "Days";
			}
			return $strDay;
		}
	}
 ?>