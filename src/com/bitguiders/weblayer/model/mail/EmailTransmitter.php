<?php
	class EmailTransmitter{
		function mail($from,$to, $subject, $message){
			//change this to your email.
			//$to = "bitguiders@gmail.com";
			$from = "info@thesuffah.org";
// 			$subject = "Your order placed successfully.";
			
			$headers  = "From: $from\r\n";
			$headers .= "Content-type: text/html\r\n";
			
			 
			//options to send to cc+bcc
			//$headers .= "Cc: [email]maa@p-i-s.cXom[/email]";
			//$headers .= "Bcc: [email]email@maaking.cXom[/email]";
			try{
			// now lets send the email.
			mail($to, $subject, $message, $headers);
			}catch(Exception $ex){
				$_SESSION['errors'] = $ex->getMessage();
			}
			
			//echo "Message has been sent ok....!";
			
		}
	function getTemplate($templateName){
		try{
		
			$filename = "view/contents/email/templates/".$templateName.".php";
			$file = fopen($filename, "r");
			$messageTemplate = fread($file, filesize($filename));
			fclose($file);
			return $messageTemplate;
		}catch (Exception $ex){
			return $ex->getMessage();
		}
		return "";
	}
		
	}
?>