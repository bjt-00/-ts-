<META http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?php 
include '../../src/com/bitguiders/dataaccesslayer/DataAccess.php';
$dataAccess = new DataAccess();
?>

<?php 
$tableName= "translation_urdu_jalandhry";
$filename = "archive/".$tableName.".php";
$file = fopen($filename, "r");
$arabic = fread($file, filesize($filename));
fclose($file);
?>


<?php
	$ayaats = explode("]", $arabic);
	$size = sizeof($ayaats);
	
	$replaceItems = array("[","١", "٢", "٣", "٤", "٥", "٦", "٧", "٨﻿", "٩", "٠","۱","۲","۳","۴","۵","۶","۷","۸","۹","۰",'=','1','2','3','4','5','6','7','8','9','0');
	
	//create table
	//$dataAccess->executeQuery("drop table ".$tableName);
	//$query = "CREATE TABLE `".$tableName."` (`ID` int(2) NOT NULL DEFAULT '0',`TEXT` varchar(9000) DEFAULT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8";
// 	echo $query;
	//$dataAccess->executeQuery($query);
	$id=1;
	for($i=0;$i<$size;$i++ ){
		$value = str_replace($replaceItems, " ", $ayaats[$i]);
		if($value!=''){
		$query = "INSERT INTO ".$tableName." VALUES(".$id++.",'".str_replace($replaceItems, " ", $ayaats[$i])."');";
		//$query = "UPDATE ".$tableName." SET TEXT='".str_replace($replaceItems, " ", $ayaats[$i])."'  WHERE ID=".$id++.";";
		echo "<br>".$query;
		}
		
		//$dataAccess->executeQuery($query);
			
		//۩  sajida 
	}
?>