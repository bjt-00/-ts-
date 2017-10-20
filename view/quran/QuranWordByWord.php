<META http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?php 
include '../../src/com/bitguiders/dataaccesslayer/DataAccess.php';
$dataAccess = new DataAccess();

//helping verbs

?>

<table>
<?php 
	$tableName= "quran_english_dictionary";
		$query = "SELECT q.ID,q.MANZAL_NO,q.PARA_NO,q.SURA_NO,q.TEXT as 'AYAAT',tep.TEXT as 'ENGLISH',tuj.TEXT as 'URDU'  FROM quran_in_default_script q ".
				"JOIN translation_english_pickthal tep on tep.id=q.id ".
				"JOIN translation_urdu_jalandhry tuj on tuj.id=q.id ".
		"WHERE PARA_NO=".$_GET['paraNo'].
		" ORDER BY q.ID";
		$resultset = $dataAccess->getResult($query);
		$id=1;
		while($verse = mysql_fetch_object($resultset)){
			
/* 			$ayaatArabicWords = explode(" ", $verse->AYAAT);
			$size = sizeof($ayaatArabicWords);
			for($i=0;$i<$size;$i++ ){
				if($ayaatArabicWords[$i]!='')
				echo "<br> INSERT INTO ".$tableName." VALUES (".$id++.",".$verse->MANZAL_NO.",".$verse->PARA_NO.",".$verse->SURA_NO.",".$verse->ID.",'".$ayaatArabicWords[$i]."','','');";
			}
 */			
			
			$replaceItems = array("our","can","but",".","than","are","not","was","and","such","the","for","who","(",")","that","which");
			$englishTranslation = str_replace($replaceItems, "", strtolower($verse->ENGLISH));
			$ayaatArabicWords = explode(" ",$englishTranslation );
			$size = sizeof($ayaatArabicWords);
			for($i=0;$i<$size;$i++ ){
					if(($ayaatArabicWords[$i]!='') && (strlen($ayaatArabicWords[$i]) >2))
						echo "<br> INSERT INTO ".$tableName." VALUES (".$id++.",".$verse->MANZAL_NO.",".$verse->PARA_NO.",".$verse->SURA_NO.",'',".$verse->ID.",'','".$ayaatArabicWords[$i]."','');";
			}
			
		}
?>
</table>