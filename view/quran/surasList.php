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
	$suraTitles=array(
			"الفَاتِحَة","البَقَرَة","آل عِمرَان","النِّسَاء","المَائدة","الاٴنعَام","الاٴعرَاف","الاٴنفَال","التّوبَة","یُونس","هُود","یُوسُف","الرّعد","إبراهیم","الحِجر","النّحل","الإسرَاء","الکهف","مَریَم","طٰه","الاٴنبیَاء","الحَجّ","المؤمنون","النُّور","الفُرقان","الشُّعَرَاء","النَّمل","القَصَص","العَنکبوت","الرُّوم","لقمَان","السَّجدَة","الاٴحزَاب","سَبَإ","فَاطِر","یسٓ","الصَّافات","صٓ","الزُّمَر","المؤمن ","حٰمٓ السجدة ","الشّوریٰ","الزّخرُف","الدّخان","الجَاثیَة","الاٴحقاف","محَمَّد","الفَتْح","الحُجرَات","قٓ","الذّاریَات","الطُّور","النّجْم","القَمَر","الرَّحمٰن","الواقِعَة","الحَدید","المجَادلة","الحَشر","المُمتَحنَة","الصَّف","الجُمُعَة","المنَافِقون","التّغَابُن","الطّلاَق","التّحْریم","المُلک","القَلَم","الحَاقَّة","المعَارج","نُوح","الجنّ","المُزمّل","المدَّثِّر","القِیَامَة","ٱلدَّهۡر","المُرسَلات","النّبَإِ","النَّازعَات","عَبَسَ","التّکویر","الانفِطار","المطفّفِین","الانشقاق","البُرُوج","الطّارق","الاٴعلی","الغَاشِیَة","الفَجر","البَلَد","الشّمس","اللیْل","الِضُّحىٰ","الشَّرح","التِّین","العَلق","القَدر","البَیّنَة","الزّلزَلة","العَادیَات","القَارعَة","التّکاثُر","العَصر","الهُمَزة","الفِیل","قُرَیش","المَاعون","الکَوثَر","الکافِرون","النّصر","لهب ","الإخلاص","الفَلَق","النَّاس"
	);
	$suraRevealedAt =array(
			"MAKKAH","MADINAH","MADINAH","MADINAH","MADINAH","MAKKAH","MAKKAH","MADINAH","MADINAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MADINAH","MAKKAH","MADINAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MADINAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MADINAH","MADINAH","MADINAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MADINAH","MADINAH","MADINAH","MADINAH","MADINAH","MADINAH","MADINAH","MAKKAH","MADINAH","MADINAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MADINAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH","MADINAH","MAKKAH","MAKKAH","MAKKAH","MAKKAH"
	);					
	
	//''
	for($i=0;$i< sizeof($suraTitles);$i++){
	?>

<?php if(($i+1)%6==0){?>
<div class="row Verse">
<?php }?>
	<div class="col-lg-2 <?php echo $userSetting->getArabicFont(); ?>">
	<?php print($quran->getNumberInArabic($i+1));?>
	<img src="themes/default/images/icons/<?php echo $suraRevealedAt[$i];?>.png"alt="<?php echo ($suraRevealedAt[$i]=='MAKKAH'?'مكي':'مدني');?>">
		<a href="index.php?suraNo=<?php echo $i+1?>"style='color:<?php echo $userSetting->getVerseColor()?>' onclick="hideDiv('suraPopupDiv')" title="<?php echo ($suraRevealedAt[$i]=='MAKKAH'?'مكي':'مدني');?>"> <?php echo $suraTitles[$i]?>‏   </a>
	</div>
<?php if(($i+1)%6==0){?>
</div>	
<?php }?>

<?php }?>