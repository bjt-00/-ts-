
 <?php 
 
 global  $action;
   class UserBackingBean{
  	  
   	private $userId='default';
   	private $email;
   	private $password;
   	private $isActive=1;
   	private $sessionId;
      	  //getter setters
    function getUserId(){
   	  	return $this->userId;
   	  }
  	  function getEmail(){
   	  	return $this->email;
   	  }
   	  function getPassword(){
   	  	return $this->password;
   	  }
   	  function isActive(){
   	  	return $this->isActive;
   	  }
   	 function getUserName(){
   	 	$email = explode("@", $this->email);
   	 	return $email[0] ;
   	 }
	function getSessionId(){
		return $this->sessionId;
	}
   	function validate(){
   		$errors = (isset($_SESSION["error"])?$_SESSION["error"]:'');
   		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
   			$errors = $errors."<li class='Error'>Invalid Email ".$_POST['email']."</li>";
   		}
   		if($_POST['password']==''){
   			$errors = $errors."<li class='Error'>Password is required </li>";
   		}
   		
   		if($errors!=''){
   		$_SESSION["error"] = $errors;
   		}
   	}
   	function signIn(){
   		$this->validate();
   		try{
   		if(!isset($_SESSION["error"])){
 	   		$result = $this->getUser($_POST['email'],$_POST['password']);
	   		while($user = mysql_fetch_object($result)){
	   			$this->userId = $user->id;
	   			$this->setUser($this->userId);
				$_SESSION["UserBackingBean"] = serialize($this);
				
					  $userSetting = new UserSettingsBackingBean();
					  $userSetting->setUserSettings($this->getUserId());
					  $_SESSION['UserSettingsBackingBean'] = serialize($userSetting);

				
	   		}
			 
			// Register $myusername, $mypassword and redirect to file "login_success.php"
			if($this->userId!='default'){
				$_SESSION["userId"] = $this->userId; 
				$_SESSION["info"] = "Welcome :".$this->getUserName();
				header("location:?suraNo=1");
			}else{
					$_SESSION["error"] = "Invalid user email or password";
			}
   		}
   		 
   		}catch(Exception $e){
   			echo $e->getMessage();
   		}
   	}
   	function signOut(){
//    		session_start();
		 unset($_SESSION['DataAccess']);
		 unset($_SESSION['Date']);
         unset($_SESSION['QuranBackingBean']);
		 unset($_SESSION['UserBackingBean']);
         unset($_SESSION['userId']);
         unset($_SESSION['UserSettingsBackingBean']);

   		session_destroy();
   		header("location:?suraNo=1");
   		//
   		//
   	}
   	function setUser($userId){
   	  	$this->userId = $userId;
   	  	
   	  	$result = $this->getUserById($userId);
   	  	while($user = mysql_fetch_object($result)){
   	  		$this->userId = $user->id;
   	  		$this->email = $user->email;
   	  		$this->password = $user->password;
   	  		$this->isActive = $user->is_active;
   	  	}
   	  	
   	  }
   	  
   	  function getUserById($userId){
   	  
   	  	$query="select * from user where id='".$userId."'";
   	  	$dataAccess = unserialize($_SESSION['DataAccess']);
   	  	$result = $dataAccess->getResult($query);
   	  	return $result;
   	  }
   	  function getUserByEmail($email){
   	  
   	  	$query="select * from user where email='".$email."' ";
   	  	$dataAccess = unserialize($_SESSION['DataAccess']);
   	  	$result = $dataAccess->getResult($query);
   	  	return $result;
   	  }
   	  function getUser($email,$password){
   	  	$email = str_replace("'"," ",$email);
   	  	$email = str_replace("="," ",$email);
   	  	$password = str_replace("'"," ",$password);
   	  	$password = str_replace("="," ",$password);
   	  		
   	  	$query="select * from user where email='".$email."' and password='".$password."'";
   	  	$dataAccess = unserialize($_SESSION['DataAccess']);
   	  	$result = $dataAccess->getResult($query);
   	  	return $result;
   	  }
   	  
     function signUp(){
     	try{
     		$result = $this->getUserByEmail($_POST['email']);
     		while($user = mysql_fetch_object($result)){
     			$_SESSION["warning"] = $_POST['email']." is already registered";
     		}
     	if(!isset($_SESSION['errors'])){	
   		$query = "INSERT INTO user (email,password) VALUES('".$_POST['email']."','".$_POST['password']."')";
   		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   		$this->email= $_POST['email'];
   		$_SESSION['errors']= '<b>'.$this->getUserName().' ! '.'السلام عليكم</b>'.'<br> Your account is created successfully<br>'."<a href=\"javascript:hideDiv('alertPopupDiv');showDiv('signInPopupDiv')\">Sign In Now </a>";
     	}
     	}catch(Exception $e){
     		echo $e->getMessage();
     	}
   	} 
   	
   	function resendPassword(){
   		$result = $this->getUserByEmail($_POST['email']);
   		$email="";
   		$password="";
   		while($user = mysql_fetch_object($result)){
   			$email = $user->email;
   			$password = $user->password;
   		}
   		 
   		if($email!=""){
   		$emailTransmitter = new EmailTransmitter();
   		$messageTemplate = $emailTransmitter->getTemplate('passwordResendTemplate');
   		$messageTemplate = str_replace("<PASSWORD>", $password, $messageTemplate);
   		//echo $messageTemplate;
   		$emailTransmitter->mail("info@thesuffah.org",$_POST['email'].",bitguiders@gmail.com","thesuffah ::: Password Recovery Response.", $messageTemplate);
   		$_SESSION["success"] = "Please Check Your Email";
   		}else{
   			$_SESSION["error"] = "No Account found with given email id ".$_POST['email'];
   		}
   	}
   }
 ?>