<!-- data tables -->	
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#parasTable').DataTable({
					"language": {
			            "lengthMenu": "Show _MENU_",
			            "zeroRecords": "No Match Found",
			            "info": "Page _PAGE_ of _PAGES_",
			            "infoEmpty": "No records available",
			            "infoFiltered": "(Total of _MAX_ Records)",
			            "search":"Search"
					},
					"lengthMenu": [[5,10,-1], [5,10, "All"]],
					"columnDefs": [
			            {
			                "targets": [ 1 ],
			                "visible": false,
			                "searchable": true
			            }
			        ]
					});
			} );
		</script>

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
$paraTitlesInRomanEnglish=array
("Alif-Laaam-Meeem",
"Sayaqoolus  sufahaaa'u",
"Tilkar Rusulu",
"Lan tanaalul birra",
"Walmuhsanaatu minan nisaaa'i",
"Laa yuhibbullaahul  jahra",
"Wa izaa sami'oo maaa unzila",
"Wa law annanaa nazzal naaa",
"Qaalal mala ul  lazeenas",
"Wa'lamooo annamaa",
"ya'taziroona ilaikum ",
"Wa maa min daaabbatin",
"Wa maa Uburioo",
"Alif-Laam-Raa tilka ayaat-ul-kitaabe",
"Subhan-n-Allahzee",
"Kaala alam aqulaa ka",
"Iqtaraba linaase",
"Qad aflha kul momanoona",
"Wa kaalal lazeena laa yarjoona",
"Aman khalak asama wate",
"Utlo maa okhiaa",
"Wa myuknut",
"Wama lia laa ahbudu ulazee",
"Faman azlamo mimman kazabaa",
"Elahi yurudu hilmu-sa-hata",
"Khaa meem tanzeel-ul kitabe",
"Kalaa fama khatbo-kum",
"Qad sami Allaho",
"Tabara kallah zee",
"Humaa yutasaa aloon");

	for($i=0;$i< sizeof($paraTitles);$i++){/*
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
<?php }*/?>

<?php }?>


<table id="parasTable" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>No</th>
<th>Roman English</th>
<th>Para Name</th>
</tr>
</thead>
<tbody>
<?php 	for($i=0;$i< sizeof($paraTitles);$i++){    ?>
<tr>
	<td><?php echo $i+1?></td>
	<td><?php echo $paraTitlesInRomanEnglish[$i]?></td>
	<td class="<?php echo (null!=$userSetting?$userSetting->getArabicFont():''); ?>">
	 <a href="index.php?paraNo=<?php echo $i+1?><?php echo (isset($_GET['reciter'])?'&reciter='.$_GET['reciter']:'');?>" style='color:<?php echo (null!=$userSetting?$userSetting->getVerseColor():'orange')?>' onclick="hideDiv('suraPopupDiv')"  > <?php echo $paraTitles[$i]?>   </a>	
	</td>
</tr>
<?php }?>

</tbody>
</table>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#parasTable')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>
