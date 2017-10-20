<?php 

class Date{
	
	function format($date){
		return date('d-M-Y',strtotime($date));
	}
	
	function getCurrentDate(){
		return $date = date('Y-m-d');//date('Y-m-d H:i:s');
	}
	
	function formatMy($date){
		return date('M-y',strtotime($date));
	}
	
}//class end
 ?> 