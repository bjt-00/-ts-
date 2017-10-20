<?php 
session_start();
 include '../../src/com/bitguiders/dataaccesslayer/DataAccess.php';
 include '../../src/com/bitguiders/weblayer/model/mail/EmailTransmitter.php';
 include '../../src/com/bitguiders/weblayer/model/user/UserSettingsBackingBean.php';
 include '../../src/com/bitguiders/weblayer/model/quran/QuranBackingBean.php';
 include '../../src/com/bitguiders/weblayer/model/user/UserBackingBean.php';
 
 $dataAccess = new DataAccess();
 $dataAccess = unserialize($_SESSION['DataAccess']);
 
 $quran = new QuranBackingBean();
 $quran = unserialize($_SESSION['QuranBackingBean']);
 
 $userSetting = new UserSettingsBackingBean();
 $userSetting = unserialize($_SESSION['UserSettingsBackingBean']);

 $user = new UserBackingBean();
 $user = unserialize($_SESSION['UserBackingBean']);
 ?>

<?php
   //header('content-type:text/html; charset=utf-8');
   $paraNo = (isset($_GET['paraNo'])?$_GET['paraNo']:1 );
   $translation = (isset($_GET['translation'])?$_GET['translation']:'urdu' );
?>

		
				<div style='overflow-y:scroll;height:200px;'>
							<?php 
								$userBookmarks = $quran->getBookmarks($user->getUserId(),$userSetting->getQuranScript());
								$counter=0;
								$substrPosition=60;
								while($verse = mysql_fetch_object($userBookmarks)){
									
								if($verse->is_bookmark==1){
										
							?>
<div class="row Verse <?php echo $userSetting->getArabicFont(); ?> <?php echo ($counter%2==0?'EvenRow':'OddRow');?>">
<div class="col-lg-12">
<?php print($quran->getNumberInArabic(++$counter));?>
&nbsp;<a href="index.php?suraNo=<?php print($verse->SURA_NO);?>&fromVerse=<?php print($verse->ID);?>" style='color:<?php echo $userSetting->getVerseColor()?>' onclick="hideDiv('suraPopupDiv')"> <?php echo substr($verse->TEXT,0,$substrPosition)?>... &nbsp; ( <?php echo substr($quran->getSuraName($verse->SURA_NO),0,$substrPosition)?>)   </a>
<img src='themes/default/images/icons/<?php echo ($verse->is_bookmark?1:0)?>.png' alt='*'/>
</div>
</div>	
						<?php }}?>
			</div>
				
			
