<!-- data tables -->	
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#sajdasTable').DataTable(
						{
							"language": {
					            "lengthMenu": "Show _MENU_",
					            "zeroRecords": "No Match Found",
					            "info": "Page _PAGE_ of _PAGES_",
					            "infoEmpty": "No records available",
					            "infoFiltered": "(Total of _MAX_ Records)",
					            "search":"Search"
							},
							"lengthMenu": [[5,10,-1], [5,10, "All"]]
						}
				 );
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
	$sajdaTitles=array(" اِنَّ الَّذِيۡنَ عِنۡدَ رَبِّكَ لَا يَسۡتَكۡبِرُوۡنَ عَنۡ عِبَادَتِهٖ وَيُسَبِّحُوۡنَهٗ وَلَهٗ يَسۡجُدُوۡنَ۩‏ "," وَلِلّٰهِ يَسۡجُدُ مَنۡ فِى السَّمٰوٰتِ وَالۡاَرۡضِ طَوۡعًا وَّكَرۡهًا وَّظِلٰلُهُمۡ بِالۡغُدُوِّ وَالۡاٰصَالِ ۩‏ "," يَخَافُوۡنَ رَبَّهُمۡ مِّنۡ فَوۡقِهِمۡ وَيَفۡعَلُوۡنَ مَا يُؤۡمَرُوۡنَ ۩‏ "," وَيَخِرُّوۡنَ لِلۡاَذۡقَانِ يَبۡكُوۡنَ وَيَزِيۡدُهُمۡ خُشُوۡعًا ۩‏ "," اُولٰٓٮِٕكَ الَّذِيۡنَ اَنۡعَمَ اللّٰهُ عَلَيۡهِمۡ مِّنَ النَّبِيّٖنَ مِنۡ ذُرِّيَّةِ اٰدَمَ وَمِمَّنۡ حَمَلۡنَا مَعَ نُوۡحٍ وَّمِنۡ ذُرِّيَّةِ اِبۡرٰهِيۡمَ وَاِسۡرَآءِيۡلَ وَمِمَّنۡ هَدَيۡنَا وَاجۡتَبَيۡنَا‌ ؕ اِذَا تُتۡلٰى عَلَيۡهِمۡ اٰيٰتُ الرَّحۡمٰنِ خَرُّوۡا سُجَّدًا وَّبُكِيًّا ۩‏ "," اَلَمۡ تَرَ اَنَّ اللّٰهَ يَسۡجُدُ لَهٗ مَنۡ فِى السَّمٰوٰتِ وَمَنۡ فِى الۡاَرۡضِ وَالشَّمۡسُ وَالۡقَمَرُ وَالنُّجُوۡمُ وَ الۡجِبَالُ وَالشَّجَرُ وَالدَّوَآبُّ وَكَثِيۡرٌ مِّنَ النَّاسِ‌ ؕ وَكَثِيۡرٌ حَقَّ عَلَيۡهِ الۡعَذَابُ‌ؕ وَمَنۡ يُّهِنِ اللّٰهُ فَمَا لَهٗ مِنۡ مُّكۡرِمٍ‌ؕ اِنَّ اللّٰهَ يَفۡعَلُ مَا يَشَآءُ ۩  ؕ‏ "," يٰۤـاَيُّهَا الَّذِيۡنَ اٰمَنُوۡا ارۡكَعُوۡا وَاسۡجُدُوۡا وَ اعۡبُدُوۡا رَبَّكُمۡ وَافۡعَلُوۡا الۡخَيۡرَ لَعَلَّكُمۡ تُفۡلِحُوۡنَ۩ ۚ‏ "," وَاِذَا قِيۡلَ لَهُمُ اسۡجُدُوۡا لِلرَّحۡمٰنِ قَالُوۡا وَمَا الرَّحۡمٰنُ اَنَسۡجُدُ لِمَا تَاۡمُرُنَا وَزَادَهُمۡ نُفُوۡرًا ۩‏ "," اَللّٰهُ لَاۤ اِلٰهَ اِلَّا هُوَ رَبُّ الۡعَرۡشِ الۡعَظِيۡمِ ۩‏ "," اِنَّمَا يُؤۡمِنُ بِاٰيٰتِنَا الَّذِيۡنَ اِذَا ذُكِّرُوۡا بِهَا خَرُّوۡا سُجَّدًا وَّسَبَّحُوۡا بِحَمۡدِ رَبِّهِمۡ وَهُمۡ لَا يَسۡتَكۡبِرُوۡنَ۩‏ "," قَالَ لَقَدۡ ظَلَمَكَ بِسُؤَالِ نَعۡجَتِكَ اِلٰى نِعَاجِهٖ‌ ؕ وَاِنَّ كَثِيۡرًا مِّنَ الۡخُلَـطَآءِ لَيَبۡغِىۡ بَعۡضُهُمۡ عَلٰى بَعۡضٍ اِلَّا الَّذِيۡنَ اٰمَنُوۡا وَعَمِلُوا الصّٰلِحٰتِ وَقَلِيۡلٌ مَّا هُمۡ‌ ؕ وَظَنَّ دَاوٗدُ اَنَّمَا فَتَنّٰهُ فَاسۡتَغۡفَرَ رَبَّهٗ وَخَرَّ رَاكِعًا وَّاَنَابَ‏ "," فَاِنِ اسۡتَكۡبَرُوۡا فَالَّذِيۡنَ عِنۡدَ رَبِّكَ يُسَبِّحُوۡنَ لَهٗ بِالَّيۡلِ وَالنَّهَارِ وَهُمۡ لَا يَسۡـَٔـمُوۡنَ۩‏ "," فَاسۡجُدُوۡا لِلّٰهِ وَاعۡبُدُوۡا ۩‏ "," وَاِذَا قُرِئَ عَلَيۡهِمُ الۡقُرۡاٰنُ لَا يَسۡجُدُوۡنَ ؕ ۩‏ "," كَلَّا ؕ لَا تُطِعۡهُ وَاسۡجُدۡ وَاقۡتَرِبْ۩‏ " );
	$suraTitles=array("الاٴعرَاف","سُوۡرَةُ الرّعد","سُوۡرَةُ النّحل","سُوۡرَةُ بنیٓ اسرآئیل ","سُوۡرَةُ مَریَم","سُوۡرَةُ الحَجّ","سُوۡرَةُ الحَجّ","سُوۡرَةُ الفُرقان","سُوۡرَةُ النَّمل","سُوۡرَةُ السَّجدَة","سُوۡرَةُ صٓ","سُوۡرَةُ حٰمٓ السجدة ","سُوۡرَةُ النّجْم","سُوۡرَةُ الانشقاق","سُوۡرَةُ العَلق");
	$verseNumbers=array(1159,1721,1950,2137,2307,2612,2671,2914,3184,3517,3993,4255,4845,5904,6124);
	$suraNumbers=array(7,13,16,17,19,22,22,25,27,32,38,41,53,84,96);
	$substrPosition=array(60,63,60,63,64,63,63,60,64,60,60,63,63,60,60);

	?>

<table id="sajdasTable" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>No</th>
<th>Sajda</th>
</tr>
</thead>
<tbody>
<?php 	for($i=0;$i< sizeof($sajdaTitles);$i++){
    ?>
<tr>
	<td><?php echo $i+1?></td>
	<td class="<?php echo (null!=$userSetting?$userSetting->getArabicFont():''); ?>">
		<a href="index.php?suraNo=<?php echo $suraNumbers[$i]?>&fromVerse=<?php echo $verseNumbers[$i]?><?php echo (isset($_GET['reciter'])?'&reciter='.$_GET['reciter']:'');?>" style='color:<?php echo (null!=$userSetting?$userSetting->getVerseColor():'orange')?>' onclick="hideDiv('suraPopupDiv')"  ><?php echo substr($sajdaTitles[$i],0,$substrPosition[$i]).'..';?> &nbsp;( <?php echo $suraTitles[$i]?>)   </a>	
	</td>
</tr>
<?php }?>

</tbody>
</table>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#sajdasTable')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>
			
