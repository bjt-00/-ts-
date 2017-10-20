 <table class="Footer" border="0" cellpadding="0" cellspacing="0" > 
 <tr>
 	<td align="left" style="width:25%"> &nbsp; Copyright  &copy; 2013-15 
 	
 	<?php 
 	if(!isset($_SESSION["shareURL"])){
	  $_SESSION["shareURL"] = 'www.thesuffah.org/?action=quran';
	}
/*  	$ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
 	foreach ($ip_keys as $key) {
 		if (array_key_exists($key, $_SERVER) === true) {
 			foreach (explode(',', $_SERVER[$key]) as $ip) {
 				// trim for safety measures
 				$ip = trim($ip);
 				// attempt to validate IP
 				// if (validate_ip($ip)) {return $ip;} 
 				echo $ip;
 			}
 		}
 	}
 */ 	?>
 	<script type="text/javascript">
 	registerVisitor();
 	</script>
 	</td>
 	<td align="center" valign="middle" style="padding-top:2px;width:50%">
 		<a href="http://www.facebook.com/sharer.php?u=<?php echo $_SESSION["shareURL"]?>" target="_new" title="Share on facebook"> <img alt="f" src="themes/default/images/icons/facebook_selected.png"> </a>
 		<a href="http://twitter.com/home?status=<?php echo $_SESSION["shareURL"]?>" target="_new" title="Share on twitter"> <img alt="t" src="themes/default/images/icons/twitter_selected.png"> </a>
 		<a href="https://plus.google.com/share?url=<?php echo $_SESSION["shareURL"]?>" target="_new" title="Share on google plus"> <img alt="g+" src="themes/default/images/icons/google+_selected.png"> </a>
 	</td>
 	<td align="right" style="width:25%"> Powerd by:<a href='http://www.bitguiders.com' > www.bitguiders.com</a>&nbsp;</td>
 </tr>
</table>
