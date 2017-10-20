 <?php 
 
 global  $action;
   class UserSettingsBackingBean{
  	  
   	public $isTranslation=1;
   	public $isArabic=1;
   	public $userId;
   	public $translation='translation_urdu_ahmed_ali';
   	public $verseColor;
   	public $translationColor;
   	public $arabicFontSize=22;
   	public $translationFontSize=22;
   	public $arabicFont;
   	public $translationFont;
   	public $activeSura=1;
   	public $activePara=0;
   	public $isError;
   	public $isBookmark;
   	public $quranScript = 'quran_in_default_script';
   	public $theme="green";
   	public $reciter;
   	
   	public $repeatAudio;
   	
      	  //getter setters
  	 public function isTranslation(){
   	  		return $this->isTranslation;
   	  }
   	  function isArabic(){
   	  	return $this->isArabic;
   	  }
   	  function getVerseColor(){
   	  	return $this->verseColor;
   	  }
   	  function getTranslationColor(){
   	  	return $this->translationColor;
   	  }
   	  function getTranslation(){
   	  	return $this->translation;
   	  }
   	  function getArabicFontSize(){
   	  	return $this->arabicFontSize;
   	  }
      function getTranslationFontSize(){
   	  	return $this->translationFontSize;
   	  }
      function getArabicFont(){
   	  	return $this->arabicFont;
   	  }
   	  function getTranslationFont(){
   	  	return $this->translationFont;
   	  }
   	  function getActiveSura(){
   	  	return $this->activeSura;
   	  }
   	  function getActivePara(){
   	  	return $this->activePara;
   	  }
   	  function getUserId(){
   	  	return $this->userId;
   	  }
   	  function getQuranScript(){
   	  	return $this->quranScript;
   	  }
   	  function getRepeatAudio(){
   	  	return $this->repeatAudio;
   	  }
   	  function getTheme(){
   	  	return $this->theme;
   	  }
   	  function getReciter(){
   	  	return $this->reciter;
   	  }
   	  
   	function applySettings(){
   		if($_POST['quranScript']=='hide'){
   			$this->showArabic(0);
   		}else{
   			$this->showArabic(1);
   		}
   	   	if($_POST['translation']=='hide'){
   			$this->showTranslation(0);
   		}else{
   			$this->showTranslation(1);
   		}
   	   	   		
   		$query="update user_setting set translation='".$_POST['translation']."', verse_color='".$_POST['verseColor']."' , translation_color='".$_POST['translationColor']."' , arabic_font_size='".$_POST['arabicFontSize']."' , translation_font_size='".$_POST['translationFontSize']."' , quran_script='".$_POST['quranScript']."' , arabic_font='".$_POST['arabicFont']."' , translation_font='".$_POST['translationFont']."', repeat_audio='".$_POST['repeatAudio']."', theme='".$_POST['theme']."', reciter='".$_POST['reciter']."' where user_id='".$this->userId."'";
   		
		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   		$this->setUserSettings($this->userId);
   	}
   	function setUserSettings($userId){
   	  	$this->userId = $userId;
   	  	if($this->isNewUser($userId)){
   	  	 $this->createNewSettings();
   	  	}
   	  	
   	  	$result = $this->getViewSettings($userId);
   	  	while($settings = mysql_fetch_object($result)){
   	  		$this->isArabic = $settings->is_arabic;
   	  		$this->isTranslation = $settings->is_translation;
   	  		$this->quranScript= ($settings->quran_script=='hide'?'quran_in_default_script':$settings->quran_script);
   	  		$this->translation = ($settings->translation=='hide'?'translation_urdu_jalandhry':$settings->translation);
   	  		$this->translationColor = $settings->translation_color;
   	  		$this->verseColor = $settings->verse_color;
   	  		$this->arabicFontSize = $settings->arabic_font_size;
   	  		$this->translationFontSize = $settings->translation_font_size;
   	  		$this->arabicFont = $settings->arabic_font;
   	  		$this->translationFont = $settings->translation_font;
   	  		$this->activeSura = $settings->active_sura;
   	  		$this->activePara = $settings->active_para;
   	  		$this->repeatAudio = $settings->repeat_audio;
   	  		$this->theme = $settings->theme;
   	  		$this->reciter = $settings->reciter;
   	  	}
   	  	
   	  }
   	  
   	  function isNewUser($userId){
   	  	$isNewUser=true;
   	  	$result = $this->getViewSettings($userId);
   	  	while($settings = mysql_fetch_object($result)){
   	  		$isNewUser=false;
   	  	}
   	  	return $isNewUser;
   	  }
   	  function getViewSettings($userId){
   	  
   	  	$query="select * from user_setting where user_id='".$userId."'";
   	  	
		$dataAccess = unserialize($_SESSION['DataAccess']);
   	  	$result = $dataAccess->getResult($query);
   	  	return $result;
   	  }
   	  
     function createNewSettings(){
   		$query = "INSERT INTO user_setting (user_id) VALUES('".$this->userId."')";
   		
		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   	}  
   	  function showArabic($showArabic){
   		$query="update user_setting set is_arabic=".$showArabic." where user_id='".$this->userId."'";
   		
		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   	}  
   	function showTranslation($showTranslation){
   		$query="update user_setting set is_translation=".$showTranslation." where user_id='".$this->userId."'";
   		
		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   	}
   	function setActiveSura($activeSura){
   		$this->activeSura = $activeSura;
   		$this->activePara = 0;
		if($this->userId!='default'){
   		$query="update user_setting set active_sura=".$this->activeSura.", active_para=0 where user_id='".$this->userId."'";
   		
		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
		}
   	}
   function setActivePara($activePara){
   		$this->activePara = $activePara;
   		$this->activeSura = 0;
   		$query="update user_setting set active_para=".$this->activePara.", active_sura=0 where user_id='".$this->userId."'";
   		
		$dataAccess = unserialize($_SESSION['DataAccess']);
   		$dataAccess->executeQuery($query);
   	}
   	  
   }
 ?>