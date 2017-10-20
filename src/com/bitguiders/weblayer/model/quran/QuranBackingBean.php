 <?php 
 
class   QuranBackingBean{
   	
	private  $currentParaTitle = '';
   	private  $currentSuraTitle = '';
   	private  $currentParaNo = 1;
   	private  $currentSuraNo = 1;
   	private  $totalAyaats=0;
   	private  $currentSuraOrigin='';
   	private  $totalRuqus=0;
   	private  $currentManzil=0;
   	private  $minAyaatID=1;
   	private  $maxAyaatID=0;
   	
	
	function getCurrentParaTitle(){
		return $this->currentParaTitle;
	}
	function getCurrentSuraTitle(){
		return $this->currentSuraTitle;
	}
	function getCurrentParaNo(){
		return $this->currentParaNo;
	}
	function getCurrentSuraNo(){
		return $this->currentSuraNo;
	}
	function getTotalAyaats(){
		return $this->totalAyaats;
	}
	function getCurrentSuraOrigin(){
		return $this->currentSuraOrigin;
	}
	function getTotalRuqus(){
		return $this->totalRuqus;
	}
	function getCurrentManzil(){
		return $this->currentManzil;
	}
	function getMinAyaatID(){
		return $this->minAyaatID;
	}
	function getMaxAyaatID(){
		return $this->maxAyaatID;
	}
	
	function setError($userId,$verseId,$errorWordIndex,$markError){
      		if($this->isNewBookmark($userId,$verseId)){
      			$this->createNewBookmark($userId,$verseId);
      		}
      	$query="";
      	$removeErrorMarkQuery="update user_bookmark set is_error=".$markError
      	." where user_id='".$userId."' and verse_id=".$verseId." and error_word_csv_index not like '%,%'";
      	 
      	if($markError==1){
   		$query="update user_bookmark set is_error=1"
   		." , error_word_csv_index=CONCAT(REPLACE(error_word_csv_index,',$errorWordIndex',''),',".$errorWordIndex."')"
   		." where user_id='".$userId."' and verse_id=".$verseId;
      	}
      	if($markError==0){
      		$query="update user_bookmark set "
      		." error_word_csv_index=CONCAT(REPLACE(error_word_csv_index,',$errorWordIndex',''),'')"
      				." where user_id='".$userId."' and verse_id=".$verseId;
      	}
      		
      	 
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   		$dataAccess->executeQuery($removeErrorMarkQuery);
   	}
   	function setBookmark($userId,$verseId,$bookmark){
   		if($this->isNewBookmark($userId,$verseId)){
   			$this->createNewBookmark($userId,$verseId);
   		}
   	
   		$query="update user_bookmark set is_bookmark=".$bookmark." where user_id='".$userId."' and verse_id=".$verseId;
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   	}
   	function updateVerse($verseId,$isPart){
   		$query="update quran_in_default_script set PART_NO=".$isPart." where  ID=".$verseId;
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   	}
   	
   	function createNewBookmark($userId,$verseId){
   		$query = "INSERT INTO user_bookmark (id,user_id,verse_id) VALUES(0,'".$userId."',".$verseId.")";
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   	}
   	
   	function isNewBookmark($userId,$verseId){
   		$isNewBookmark=true;
   		$result = $this->getBookmark($userId,$verseId);
   		while($bookmarks = mysql_fetch_object($result)){
   			$isNewBookmark=false;
   		}
   		return $isNewBookmark;
   	}
   	function getBookmarks($userId,$quranScript){
   	
   		$query="select * from  user_bookmark as ub JOIN ".$quranScript." as at ON ub.verse_id=at.id where (is_error=1 or is_bookmark=1) and user_id='".$userId."' order by ub.verse_id";
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$result = $dataAccess->getResult($query);
   		return $result;
   	}
   	
   	function getBookmark($userId,$verseId){
   	
   		$query="select * from user_bookmark where user_id='".$userId."' and verse_id=".$verseId;
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$result = $dataAccess->getResult($query);
   		return $result;
   	}
   	function getParaName($paraId){
   	
   		$query="select * from para_tbl where id=".$paraId;
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$result = $dataAccess->getResult($query);
   		while($sura = mysql_fetch_object($result)){
   			return $sura->TEXT;
   		}
   		return false;
   	}
   	
   	function getSuraName($suraId){
   	
   		$query="select * from sura_tbl where id=".$suraId;
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$result = $dataAccess->getResult($query);
   	    while($sura = mysql_fetch_object($result)){
   			return $sura->TEXT;
   		}
   		return false;
   	}
   	function getAudioFileName($verseId,$suraNo){
   	
   		//$query="select * from quran_in_default_script where id=".$verseId;
   		//$dataAccess = unserialize($_SESSION['DataAccess']);
   		//$result = $dataAccess->getResult($query);
   		//while($verse = mysql_fetch_object($result)){
   			$this->setSummary(0,$suraNo,'quran_in_default_script');
   			return $this->formatNo($suraNo).$this->formatNo(($verseId - $this->getMinAyaatID())+1);
   		//}
   		//return false;
   	}
   	private function formatNo($no){
   		return ($no<10?'00'.$no:($no<100?'0'.$no:$no));
   	}
   	function isError($userId,$verseId){
   		$result = $this->getBookmark($userId,$verseId);
   	   		while($bookmark = mysql_fetch_object($result)){
   			return $bookmark->is_error;
   		}
   		return false;
   	}
   	function isBookmark($userId,$verseId){
   		$result = $this->getBookmark($userId,$verseId);
   		while($bookmark = mysql_fetch_object($result)){
   			return $bookmark->is_bookmark;
   		}
   		return false;
   	}
   	function setSummary($paraNo,$suraNo,$quranScript){
   		$this->currentParaTitle='';
   		$this->currentSuraTitle='';
   		$this->tempCurrentParaTitle='';
   		$this->tempCurrentSuraTitle='';
   		$this->totalAyaats=0;
   		$this->totalRuqus=0;
   		$this->minAyaatID =0;
   		$this->maxAyaatID =0;
		   		$resultset = $this->getSummary($paraNo,$suraNo,$quranScript);
		   		while($row = mysql_fetch_object($resultset)){
		   			
		/*    		//display all suras and paras
		 * 			$this->currentParaTitle = ($this->tempCurrentParaTitle!=$row->PARA?$this->currentParaTitle.' , '.$row->PARA:$this->currentParaTitle);
		   			$this->currentSuraTitle = ($this->tempCurrentSuraTitle!=$row->SURA?$this->currentSuraTitle.' , '.$row->SURA:$this->currentSuraTitle);
		 */
		   			$this->currentParaTitle = $row->PARA;
		   			$this->currentSuraTitle = $row->SURA;
		   			
		   			$this->currentParaNo = $row->PARA_NO;
		   			$this->currentSuraNo = $row->SURA_NO;
		   			$this->totalAyaats += $row->TOTAL_AYAATS;
		   			$this->totalRuqus  = $row->TOTAL_RUQUS;
		   			$this->currentSuraOrigin = ($row->ORIGIN=='MAKKAH'?'مكي':'مدني');
		   			$this->tempCurrentParaTitle=$row->PARA;
		   			$this->tempCurrentSuraTitle=$row->SURA;
		   			$this->currentManzil = $row->MANZIL;
		   			if($this->minAyaatID==0){
		   				$this->minAyaatID = $row->MIN_ID;
		   			}else{
		   			$this->minAyaatID = ($row->MIN_ID<$this->minAyaatID?$row->MIN_ID:$this->minAyaatID);
		   			}
		   			$this->maxAyaatID = ($row->MAX_ID>$this->maxAyaatID?$row->MAX_ID:$this->maxAyaatID);
		   		}//while end
   		
   	}
   	function getSummary($paraNo,$suraNo,$quranScript){
   		$query = "SELECT COUNT(*) AS 'TOTAL_AYAATS',MIN(A.ID) AS MIN_ID,MAX(A.ID) AS MAX_ID,(select count(*) from quran_in_default_script where ".($paraNo!=0?'para_no='.$paraNo:'sura_no='.$suraNo)." and RAQU_NO=1)  AS 'TOTAL_RUQUS' ,PARA_NO,P.TEXT AS 'PARA', SURA_NO,S.TEXT AS 'SURA',MAX(MANZAL_NO) AS 'MANZIL',ORIGIN  FROM ".$quranScript." A ".
				"JOIN  para_tbl P ON A.PARA_NO = P.ID ". 
				"JOIN  sura_tbl S ON A.SURA_NO = S.ID ".
				"WHERE A.".($paraNo!=0?'para_no='.$paraNo:'sura_no='.$suraNo)." ".
				"GROUP BY PARA_NO,SURA_NO ".
                "ORDER BY SURA_NO";
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$result = $dataAccess->getResult($query);
   		return $result;
   	}
   	function getManzilsList($quranScript){
		if(!isset($manzilsList)){
			//private  $parasList;
			//private  $surasList;
			//private  $sajdasList;

   		$query = "SELECT DISTINCT MANZAL_NO,(select TEXT from ".$quranScript." WHERE MANZAL_NO=A.MANZAL_NO LIMIT  1) AS 'TEXT' FROM ".$quranScript." A";
   				
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$manzilsList = $dataAccess->getResult($query);
		echo '<br><br><br>mazsilllll--------------------------';
		}else{
		echo '2<br><br><br>mazsilllll--------------------------';
		}
   		return $manzilsList;
   	
   	}
  	function getParasList(){
   		$query = "SELECT * FROM para_tbl ORDER BY id";
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$parasList = $dataAccess->getResult($query);
   		return $parasList;
   	}
   	
   	function getNumberInArabic($number){
   		$temp = $number;
   		$replaceItems = array('1','2','3','4','5','6','7','8','9','0');
   		$withTheseItems = array("۱", "۲", "۳﻿", "۴", "۵﻿", "۶", "۷", "۸﻿", "۹", "۰");
   		for($i=0;$i<10;$i++ ){
   			$number = str_replace($replaceItems[$i], $withTheseItems[$i], $number);
   		
   			//۩  sajida
   		}
   		return ($number==''?$temp:$number);
   	}
   	function createNewBug($userId){
   		if(isset($_POST['bugDescription'])&& $_POST['bugDescription']!=''){
	   		$query = "INSERT INTO bug (bug_no,user_id,type,para_no,sura_no,verse_no,quran_script,translation,description) VALUES(0,'".$userId."','".$_POST['bugType']."',".$_POST['paraNo'].",".$_POST['suraNo'].",".($_POST['verseNo']==''?0:$_POST['verseNo']).",'".$_POST['quranScript']."','".$_POST['translation']."','".$_POST['bugDescription']."')";
	   		$dataAccess = unserialize($_SESSION['DataAccess']);
	   		$dataAccess->executeQuery($query);
	   		$_SESSION["info"] = "Thanks, for your precious time. Bug is reported successfully to dev team.";
   		}else{
   			$_SESSION["error"] = "Description is required";
   		}
   	}
   	function getBugsList(){
   		$query = "SELECT * FROM bug ORDER BY bug_no";
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$bugsList = $dataAccess->getResult($query);
   		return $bugsList;
   	}
   	
   }
 ?>