 <?php include '../../../src/com/bitguiders/weblayer/model/mail/EmailTransmitter.php';?>


<?php

		$messageTemplate='';
			try{
	    			$templateName ='passwordResendTemplate';
	
					$filename = "../../../view/contents/email/templates/".$templateName.".php";
					$file = fopen($filename, "r");
					$messageTemplate = fread($file, filesize($filename));
					fclose($file);
							
				}catch (Exception $ex){
					$ex->getMessage();
				}

?>
<?php 
	
?>

 <?php 
//$emailTransmitter = new EmailTransmitter();
//$messageTemplate = $emailTransmitter->getTemplate('orderConfirmationTemplate');
//$messageTemplate = str_replace("<ORDER_NO>", 13, $messageTemplate);
echo $messageTemplate;


//$emailTransmitter->mail("",$_GET['email'].",info@bitguiders.com","bitguiders ::: Reforming bits [ Order Confirmation ]",$messageTemplate);
?>
