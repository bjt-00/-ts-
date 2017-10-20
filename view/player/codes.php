<META http-equiv="Content-Type" content="text/html;charset=utf-8" />

<html>
<head>
	<title>Web Audio Player Demo</title>
  <link rel="stylesheet" href="css/normalize.css">
	<link type="text/css" href="css/style.css" rel="stylesheet" />
	
<body>	
<span class='jp-controls'>
خَتَمَ اللّٰهُ عَلَىٰ قُلُوۡبِهِمۡ وَعَلٰى سَمۡعِهِمۡ‌ؕ وَعَلٰىٓ اَبۡصَارِهِمۡ غِشَاوَةٌ  وَّلَهُمۡ عَذَابٌ عَظِيۡمٌ‏  
</span>
<table>
<tr>
	<td>S.No</td>
	<td>Symbol</td>
	<td>Code</td>
</tr>	

<?php
  $counter=1;
  
 for($i=61440;$i<61675;$i++){
	?>
<tr>
	<td><?php echo $counter++;?></td>
	<td class='jp-controls'><?php echo '&#'.$i.';';?></td>
	<td>&# <?php echo $i.';';?></td>
</tr>	

<?php 
}
 ?>
</table>
</body>
</html>