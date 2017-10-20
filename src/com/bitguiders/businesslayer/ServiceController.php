 <?php 

 include 'src/com/bitguiders/dataaccesslayer/DataAccess.php';
 include 'src/com/bitguiders/util/Date.php';
 include 'src/com/bitguiders/weblayer/model/mail/EmailTransmitter.php';
 include 'src/com/bitguiders/weblayer/model/user/UserSettingsBackingBean.php';
 include 'src/com/bitguiders/weblayer/model/user/UserBackingBean.php';
 include 'src/com/bitguiders/weblayer/model/quran/QuranBackingBean.php';
 //$_SESSION["transactionCounter"] = 0;
  if(!isset($_SESSION["transactionCounter"])){$_SESSION["transactionCounter"] = 0;}
 
 if (empty($_SESSION['DataAccess']) || !isset($_SESSION["userId"])){
	 $dataAccess = new DataAccess();
	 $_SESSION["DataAccess"] = serialize($dataAccess);
	 $currentAction = null;
	 $date = new Date();
	 $_SESSION["Date"] = serialize($date);
	 $quran = new QuranBackingBean();
	 $_SESSION["QuranBackingBean"] = serialize($quran);
	 $user = new UserBackingBean();
	 $_SESSION["UserBackingBean"] = serialize($user);
	  //if user already logged in
	 if(isset($_SESSION["userId"])){
		$user->setUser($_SESSION["userId"]);
	  } 

	  $userSetting = new UserSettingsBackingBean();
	  $userSetting->setUserSettings($user->getUserId());
	  $_SESSION['UserSettingsBackingBean'] = serialize($userSetting);
	  
	  }else{
	  //print_r($_SESSION['UserSettingsBackingBean']);
	  $dataAccess = unserialize($_SESSION['DataAccess']);
	  $date = unserialize($_SESSION['Date']);
	  $quran = unserialize($_SESSION['QuranBackingBean']);
	  $user = unserialize($_SESSION['UserBackingBean']);
	  $userSetting = unserialize($_SESSION['UserSettingsBackingBean']);
  }
 
  
 	
 if(isset($_POST['signUp'])){
 	$user->signUp();
 }
  else if(isset($_POST['signIn'])){
     $user->signIn();
    }
 else if(isset($_GET['signOut'])){
    	$user->signOut();
    }
    else if(isset($_POST['resendPassword'])){
    	$user->resendPassword();
    }
    else  if(isset($_POST['applySettings'])){
  	$userSetting->applySettings();
  }
    else if(isset($_GET['suraNo'])){
  	$userSetting->setActiveSura($_GET['suraNo']);
  }
   else if(isset($_GET['paraNo'])){
  	$userSetting->setActivePara($_GET['paraNo']);
  }
   else if(isset($_GET['markError'])){
  	$quran->setError($user->getUserId(), $_GET['verseId'],$_GET['errorWordIndex'],$_GET['markError']);
  }
   else if(isset($_GET['bookmark'])){
  	$quran->setBookmark($user->getUserId(), $_GET['verseId'],$_GET['bookmark']);
  }
   else if(isset($_POST['reportBug'])){
  	$quran->createNewBug($user->getUserId());
  }
  else if(isset($_GET['isPart'])){
  	$quran->updateVerse($_GET['verseId'],$_GET['isPart']);
  }
  
  ?>