<?php 
session_start();
 include '../../src/com/bitguiders/weblayer/model/user/UserSettingsBackingBean.php';
 include '../../src/com/bitguiders/weblayer/model/quran/QuranBackingBean.php';
 
 $quran = new QuranBackingBean();
 $_SESSION["QuranBackingBean"] = serialize($quran);
 $userSetting = new UserSettingsBackingBean();
 $userSetting = unserialize($_SESSION['UserSettingsBackingBean']);
 
?>

<?php 
	$manzilTitles=array("اَلۡحَمۡدُ لِلّٰهِ رَبِّ الۡعٰلَمِيۡنَۙ‏","يٰۤـاَيُّهَا الَّذِيۡنَ اٰمَنُوۡۤ","تِلۡكَ اٰيٰتُ الۡكِتٰبِ","سُبۡحٰنَ الَّذِىۡۤ اَسۡرٰى بِعَبۡد","طٰسٓمّٓ‏","وَالصّٰٓفّٰتِ صَفًّا ۙ‏","وَالطُّوۡرِۙ‏");
	$paraTitles=array("سُوۡرَةُ الفَاتِحَة","سُوۡرَةُ المَائدة","سُوۡرَةُ یُونس","سُوۡرَةُ بنیٓ اسرآئیل","سُوۡرَةُ الشُّعَرَاء","سُوۡرَةُ الصَّافات","سُوۡرَةُ الطُّور");
	$suraNumbers=array(1,5,10,17,26,37,52);
	$substrPosition=array(65,65,60,65,60,60,60);
	for($i=0;$i< sizeof($manzilTitles);$i++){
	?>

<div class="row Verse <?php echo $userSetting->getArabicFont(); ?> <?php echo ($i%2==0?'EvenRow':'OddRow');?>">
<div class="col-lg-12">
<?php print($quran->getNumberInArabic($i+1));?>
&nbsp;<a href="index.php?suraNo=<?php echo $suraNumbers[$i]?>" style='color:<?php echo $userSetting->getVerseColor()?>' onclick="hideDiv('suraPopupDiv')"  ><?php echo substr($paraTitles[$i],0,$substrPosition[$i]).'..'?> &nbsp; ( <?php echo $manzilTitles[$i]?> )   </a>
</div>
</div>	
<?php }?>

