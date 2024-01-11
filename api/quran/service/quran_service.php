<?php

include 'dataaccess/QuranDAO.php';
 $dao = new QuranDAO();
 header("Content-Type: application/json; charset = utf-8");
 header("Accept: application/json; charset = utf-8");
 if(isset($_POST["search"])){
 	echo $dao->getSearchHints($_POST['search'],$_POST['searchFrom']);
 }
 else{
     echo $dao->getSearchHints($_GET['search'],$_GET['searchFrom']);
 	//echo '[{"word":"abdul"},{"word":"abcul"},{"word":"abedul"}]';
 	//include "commands.php";
 }

?>