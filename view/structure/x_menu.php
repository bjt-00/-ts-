
  <div class="Menu">
  <table cellpadding="0" cellspacing="0">
 	<tr>
 		<td class="<?php echo ($_GET['action']=='ourmission'?'active':''); ?>"> 
 		<a  href="index.php?action=ourmission&sm=1">Home</a> 
 		</td>
 	
 		<td class="<?php echo ($_GET['action']=='student/studentslist' || $_GET['action']=='student/result' || $_GET['action']=='student/studentform'|| $_GET['action']=='student/attendance' || $_GET['action']=='student/feelist' || $_GET['action']=='student/feeform'?'active':''); ?>">
 			<a  href="index.php?action=student/studentslist&sm=0">Student Managemnt</a>
 		</td>
 	
 		<td class="<?php echo ($_GET['action']=='ourpartners'?'active':''); ?>">
 			<a  href="index.php?action=ourpartners&sm=3">Our Partners</a>
 		</td>
 		
 		<td class="<?php echo ($_GET['action']=='ourteam'?'active':''); ?>">
 			<a  href="index.php?action=ourteam&sm=1">Our Team</a>
 		</td>

 		<td class="<?php echo ($_GET['action']=='qualitypolicy'?'active':''); ?>">
 			<a  href="index.php?action=qualitypolicy">Quality Policy</a>
 		</td>
 		<td class="<?php echo ($_GET['action']=='ourclients'?'active':''); ?>">
 			<a  href="index.php?action=ourclients">Our Clients</a>
 		</td>
 		<td class="<?php echo ($_GET['action']=='contactus'?'active':''); ?>">
 			<a  href="index.php?action=contactus">Contact Us</a>
 		</td>
 		
 	</tr>
 </table>
 </div>
 <div class="SubMenu">
   <table cellpadding="0" cellspacing="0">
 	<tr>
 <?php if($_GET['action']=='student/studentslist' || $_GET['action']=='student/studentform'|| $_GET['action']=='student/result'|| $_GET['action']=='student/attendance'|| $_GET['action']=='student/feelist'|| $_GET['action']=='student/feeform') {
 		$subMenu = array("Students List","Registration","Attendance","Result","Fee List",'Fee');
 		$subMenuPages=array("studentslist","studentform","attendance","result","feelist","feeform");
 		for($index=0;$index< sizeof($subMenu);$index++){
 	?>
 		<td class="<?php echo ($_GET['sm']==$index?'subActive':''); ?>"> 
 		<a  href="index.php?action=student/<?php print ($subMenuPages[$index]);?>&sm=<?php print($index);?>"><?php print($subMenu[$index]);?></a> 
 		</td>
 	 		
 <?php }}?>

 		<td width="100%">&nbsp;</td>
 
 </tr>
 </table>
 </div>
   <img  src="themes/default/images/<?php echo( ($_GET['action']!=null?$_GET['action']:'')."Header.png") ?>" alt="">
