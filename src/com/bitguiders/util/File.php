<?php 

class File{
	
	function upload($fileSourceID,$uploadPath,$fileName){
		  
		if($_FILES[$fileSourceID]!=''){
			
			 $uploadPath = $uploadPath . basename( $fileName) ; 
			 $ok=1; 
			 if(move_uploaded_file($_FILES[$fileSourceID]['tmp_name'], $uploadPath)) 
			 {
			 echo "<br>The file ". basename( $_FILES[$fileSourceID]['name']). " has been uploaded";
			 } 
			 else {
			 echo "<br>Sorry, there was a problem uploading your file.";
			 }
		}
	}
}//class end
 ?> 