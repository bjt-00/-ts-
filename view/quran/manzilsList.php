<!-- data tables -->	
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#manzilsTable').DataTable(
						{
							"info":false,
							"paging":false,
							"searching":false
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
	$manzilTitles=array("اَلۡحَمۡدُ لِلّٰهِ رَبِّ الۡعٰلَمِيۡنَۙ‏","يٰۤـاَيُّهَا الَّذِيۡنَ اٰمَنُوۡۤ","تِلۡكَ اٰيٰتُ الۡكِتٰبِ","سُبۡحٰنَ الَّذِىۡۤ اَسۡرٰى بِعَبۡد","طٰسٓمّٓ‏","وَالصّٰٓفّٰتِ صَفًّا ۙ‏","وَالطُّوۡرِۙ‏");
	$paraTitles=array("سُوۡرَةُ الفَاتِحَة","سُوۡرَةُ المَائدة","سُوۡرَةُ یُونس","سُوۡرَةُ بنیٓ اسرآئیل","سُوۡرَةُ الشُّعَرَاء","سُوۡرَةُ الصَّافات","سُوۡرَةُ الطُّور");
	$suraNumbers=array(1,5,10,17,26,37,52);
	$substrPosition=array(65,65,60,65,60,60,60);
	
	?>

<table id="manzilsTable" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>No</th>
<th>Manzil</th>
</tr>
</thead>
<tbody>
<?php for($i=0;$i< sizeof($manzilTitles);$i++){ ?>
<tr>
	<td><?php echo $i+1?></td>
	<td class="<?php echo (null!=$userSetting?$userSetting->getArabicFont():''); ?>">
	<a href="index.php?suraNo=<?php echo $suraNumbers[$i]?><?php echo (isset($_GET['reciter'])?'&reciter='.$_GET['reciter']:'');?>" style='color:<?php echo (null!=$userSetting?$userSetting->getVerseColor():'orange')?>' onclick="hideDiv('suraPopupDiv')"  ><?php echo substr($paraTitles[$i],0,$substrPosition[$i]).'..'?> &nbsp; ( <?php echo $manzilTitles[$i]?> )   </a>	</td>
</tr>
<?php }?>

</tbody>
</table>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#manzilsTable')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>
			
