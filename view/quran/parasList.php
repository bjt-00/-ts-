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
$paraTitles=array("الم‏","سَيَقُولُ السُّفَهَاء‏","تِلْكَ الرُّسُلُ‏","لَن تَنَالُواْ الْبِرَّ‏","وَالْمُحْصَنَاتُ‏","لاَّ يُحِبُّ اللّهُ الْجَهْرَ‏","وَإِذَا سَمِعُواْ مَا أُنزِلَ‏","وَلَوْ أَنَّنَا نَزَّلْنَا‏","قَالَ الْمَلأُ الَّذِينَ‏","وَاعْلَمُواْ أَنَّمَا‏","يَعْتَذِرُونَ إِلَيْكُمْ‏","وَمَا مِن دَآبَّةٍ‏","وَمَا أُبَرِّىءُ نَفْسِي‏","الَرَ تِلْكَ آيَاتُ ‏","سُبْحَانَ الَّذِي‏","قَالَ أَلَمْ أَقُل لَّكَ‏","اقْتَرَبَ لِلنَّاسِ‏","قَدْ أَفْلَحَ الْمُؤْمِنُونَ‏","وَقَالَ الَّذِينَ ‏","أَمَّنْ خَلَقَ‏","اتْلُ مَا أُوحِيَ‏","وَمَن يَقْنُتْ‏","وَمَا لِي لاَ أَعْبُدُ ‏","فَمَنْ أَظْلَمُ مِمَّن كَذَبَ‏","إِلَيْهِ يُرَدُّ ِ‏","حم تَنْزِيلُ الْكِتَابِ‏","قَالَ فَمَا خَطْبُكُمْ‏","قَدْ سَمِعَ اللَّهُ‏","تَبَارَكَ الَّذِي‏","عَمَّ يَتَسَاءلُونَ‏");
						
	for($i=0;$i< sizeof($paraTitles);$i++){
	?>

<?php if(($i+1)%3==0){?>
<div class="row Verse">
<?php }?>
	<div class="col-lg-4 <?php echo $userSetting->getArabicFont(); ?>">
	<?php print($quran->getNumberInArabic($i+1));?>
		&nbsp;<a href="index.php?paraNo=<?php echo $i+1?>" style='color:<?php echo $userSetting->getVerseColor()?>' onclick="hideDiv('suraPopupDiv')"  > <?php echo $paraTitles[$i]?>   </a>
	</div>
<?php if(($i+1)%3==0){?>
</div>	
<?php }?>

<?php }?>