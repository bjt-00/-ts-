
<?php
//header('content-type:text/html; charset=utf-8');
   $paraNo = $userSetting->getActivePara();//(isset($_GET['paraNo'])?$_GET['paraNo']:0 );
   $suraNo = $userSetting->getActiveSura();//(isset($_GET['suraNo'])?$_GET['suraNo']:0 );
   $paraNo = (($paraNo==0 & $suraNo==0)?1:$paraNo);
   
   $paraNo = (($paraNo<0 || $paraNo>30)?1:$paraNo);
   $suraNo = (($suraNo<0 || $suraNo>114)?1:$suraNo);
   
   $activeTable = ($suraNo==0?'PARA_TBL':'SURA_TBL');
   $activeId    = ($suraNo==0?$paraNo:$suraNo);
   
   	 $limit = ((isset($_GET['fromVerse'])&&!isset($_GET['toVerse']))?' AND (AT.ID>='.$_GET['fromVerse'].')':'');
     $limit = ((isset($_GET['fromVerse'])&&isset($_GET['toVerse']))?' AND (AT.ID>='.$_GET['fromVerse'].' AND AT.ID<='.($_GET['toVerse']<$_GET['fromVerse']?$_GET['fromVerse']+1:$_GET['toVerse']).')':$limit);
     
   //translation
   $translation = $userSetting->getTranslation();
   
   //search
   $searchQuery='';
   $searchText ='';
   $shareURL='www.thesuffah.org/?action=quran';
   $shareURL .=($paraNo>0?'&paraNo='.$paraNo:'').($suraNo>0?'&suraNo='.$suraNo:'');
   /*
   if(isset($_POST['search'])&& $_POST['searchText']!=''){
	   	 //$searchQuery = "SELECT DISTINCT ID from ".$_POST['searchFrom']." where TEXT like '%".$_POST['searchText']."%'";
	   	 //$searchText = $_POST['searchText'];
	   	 //$shareURL .="&searchFrom=".$_POST['searchFrom']."&searchText=".$_POST['searchText'];
   		   $shareURL="?action=quran&searchFrom=".$_POST['searchFrom']."&searchText=".$_POST['searchText'];
   		 ?>
   		 	<script>window.location="<?php echo $shareURL?>";</script>
   		 <?php 
	   	 header($shareURL);
   	} else
   	*/
   	
   	 if(isset($_GET['searchText'])&& $_GET['searchText']!='' && strlen($_GET['searchText'])>2) /*&&(isset($_GET['searchFrom'])&& $_GET['searchFrom']!='')*/{
   		//$searchQuery = "SELECT DISTINCT ID from ".$_GET['searchFrom']." where TEXT like '%".$_GET['searchText']."%'";
   		$searchQuery = "SELECT DISTINCT ID from quran_view where TEXT like '%".$_GET['searchText']."%'";
   		 $searchText = $_GET['searchText'];
   	   	//$shareURL .="&searchFrom=".$_GET['searchFrom']."&searchText=".$_GET['searchText'];
   	   	$shareURL .="&searchText=".$_GET['searchText'];
   }else if((isset($_GET['fromVerse'])&& $_GET['fromVerse']!='')&&(isset($_GET['toVerse'])&& $_GET['toVerse']!='')){
   	    $shareURL .="&fromVerse=".$_GET['fromVerse']."&toVerse=".$_GET['toVerse'];
   }
   $_SESSION["shareURL"] = $shareURL;
 ?>

 <!-- Quran Header -->
<?php include('structure/quranHeader2.php'); ?>

 <!-- Previous Button -->
<?php include('structure/previous.php'); ?>

<input type='hidden' name='paraNo' value='<?php echo $paraNo;?>'>
<input type='hidden' name='suranNo' value='<?php echo $suraNo;?>'>

				
<?php 
				$query = "SELECT AT.ID AS 'AYAAT_ID',AT.TEXT AS 'AYAAT',RAQU_NO,PART_NO,MANZAL_NO,SURA_NO,T.TEXT AS 'TRANSLATION',IS_SAJDA FROM ".$userSetting->getQuranScript()." AT  JOIN ".$translation." T ON AT.ID = T.ID".
								" WHERE ".($searchQuery!=''?' AT.ID IN('.$searchQuery.') ':($paraNo>0?' PARA_NO ='.$paraNo:'').($suraNo>0?' SURA_NO ='.$suraNo:'')).$limit."  ORDER BY AYAAT_ID";
				//echo $query;
								$resultset = $dataAccess->getResult($query);
								
								//get user bookmarks
								$userBookmarks = $quran->getBookmarks($user->getUserId(),$userSetting->getQuranScript());
								$bookmarks = array();
								$index=0;
								while($bookmarkVerse = mysql_fetch_object($userBookmarks)){
									$bookmarks[$index] = $bookmarkVerse->verse_id."-".$bookmarkVerse->is_bookmark."-".$bookmarkVerse->is_error."-".$bookmarkVerse->error_word_csv_index;
									
									$bookmar = explode("-", $bookmarks[$index]);
// 									echo '<br> id '.$bookmar[0].'mark '.$bookmar[1].' err '.$bookmar[2];
									$index++;
								}
								
								$totalResultCount = $dataAccess->getSize($resultset);
								$verseNo=0;
								
								$manzalNo=1;
								$partNo =1;
								$raquNo =0;
								$currentSuraNo=0;
								$ayaatNo=1;
								$playIndex=($userSetting->isArabic()&&$userSetting->isTranslation()?3:2);
								
								
								$playIndex=(strpos($userSetting->getTranslation(),'jalandhry')!==false?$playIndex:2);
								
								while($verse = mysql_fetch_object($resultset)){
									++$verseNo;
									$isBookmark = 0;//$quran->isBookmark($user->getUserId(), $verse->AYAAT_ID);
									$isError = 0;//$quran->isError($user->getUserId(), $verse->AYAAT_ID);
									$errorWordIndexs = explode(",","1");
									
									foreach($bookmarks as $bookmark){
										$bookmar = explode("-", $bookmark);
										if($bookmar[0]==$verse->AYAAT_ID){
// 											echo'<br>'. $bookmar[0].' <Y> '.$verse->AYAAT_ID;
												
											$isBookmark = ($bookmar[1]==1?$bookmar[1]:0);
											$isError = ($bookmar[2]==1?$bookmar[2]:0);
											$errorWordIndexs = explode(",",$bookmar[3]);
											break;
										}
									}
									
									//manzil verification
									$isManzal = '';
									if($verse->MANZAL_NO!=$manzalNo && $verse->MANZAL_NO!=0){
										$manzalNo  = $verse->MANZAL_NO;
										$isManzal = $quran->getNumberInArabic($manzalNo).'-'.'المنزل';
									}
									
									//sura verification
									$isSura = '';
									if($verse->SURA_NO!=$currentSuraNo && $verse->SURA_NO!=0){
										$currentSuraNo = $verse->SURA_NO;
										$isSura = 'y';
										
										//reset
										$ayaatNo=1;
										$raquNo = 0;
										$quran->setSummary(0,$currentSuraNo,$userSetting->getQuranScript());
									}
									
									//part verification
									$isPart = '';
									if($verse->PART_NO!=0){
										$isPart = ($partNo==1? ' أربع ':($partNo==2?' النصف ':' الثلاثة '));
										$partNo++;
										if($partNo==4){
											$partNo=1;
										}
									}
									//raqu verification
									$isRaqu = '';
									if($verse->RAQU_NO!=0){
										//$raquNo = $verse->RAQU_NO;
										$raquNo++;
										$isRaqu = 'ع';
									}
									
									if($quran->getTotalAyaats()==$ayaatNo){
										//$raquNo =($raquNo>1?$raquNo-1:$raquNo);
										$isRaqu = 'ع';
									}
									
									//sajda verification
									$isSajda = '';
									if($verse->IS_SAJDA==1){
										$isSajda = 'السجدة';
									}
									?>
									
<!-- Show Bismillah -->
<?php if($isSura!=''){	include('structure/suraTitle.php');}?>
								
<!-- Show Arabic -->
<?php if($userSetting->isArabic()){	include('structure/verse.php'); }?>
 
<!-- Show Translation -->
<?php if($userSetting->isTranslation()){	include('structure/translation.php'); }?>

<?php }//while end?>
				   
