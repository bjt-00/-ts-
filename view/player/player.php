<html>
<head>
	<title>Web Audio Player Demo</title>
  <!-- link rel="stylesheet" href="view/player/css/normalize.css" -->
	<link type="text/css" href="view/player/css/style.css" rel="stylesheet" />
	<?php 
	$audioPath ='http://thesuffah.org/audio/quran/';
	//$audioPath ='audio/quran/';
	?>
	<script type="text/javascript" src="view/player/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/player/js/jquery.js"></script>
	<script type="text/javascript" src="view/player/js/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="view/player/js/jplayer.playlist.min.js"></script>
	<script type="text/javascript" src="view/player/js/jquery.jplayer.inspector.js"></script>
	<script>
	var myPlaylist;
	var previousId=0;
	var previousColor;
	var scrollPosition=0;
	$(document).ready(function(){
		
      $("#jquery_jplayer_1").jPlayer({
        ready: function (event) {
        	
          $(this).jPlayer("setMedia", 
      			<?php if($userSetting->isArabic()){?>
    			{
    				title:"Taawuz",
    				mp3:"<?php echo $audioPath.$userSetting->getReciter();?>/mp3/taawuz.mp3",
    				oga:"<?php echo $audioPath.$userSetting->getReciter();?>/ogg/taawuz.ogg",
    				id:"verseRowNo00"
    			}
    			<?php } ?>
    			<?php echo ($userSetting->isTranslation()&& $userSetting->isArabic()&& strpos($userSetting->getTranslation(),'jalandhry')!==false?',':''); ?>
      			<?php if($userSetting->isTranslation()&& strpos($userSetting->getTranslation(),'jalandhry')!==false){?>
    			{
    				title:"Taawuz Translation",
    				mp3:"<?php echo $audioPath.$userSetting->getTranslation(); ?>/mp3/taawuz.mp3",
    				oga:"<?php echo $audioPath.$userSetting->getTranslation(); ?>/ogg/taawuz.ogg",
    				id:"verseRowNo00_1"
    			}
    			<?php } ?>

          );
		          
		    $(this).bind($.jPlayer.event.play, function() {
			      var obj = myPlaylist.playlist[myPlaylist.current];
			      setCurrentSelection(obj.id);

			      //set scrollbar position
			      var index = myPlaylist.current;
			      if(index>1){
				      var obj2 = myPlaylist.playlist[(index>3?index-3:index)];
				      var verseRowNo = obj2.id.replace("verseRowNo","_");
				      verseRowNo = verseRowNo.replace("translationRowNo","_");
				      window.location.href="#"+verseRowNo;
			      }
			    });

		    $(this).bind($.jPlayer.event.progress, function(event) {
		    	if (event.jPlayer.status.seekPercent === 100) {
		    	     // loading complete
		    		   hideLoading();
		    	    } else {
		    	     // Still loading
		    	    	 showLoading();
		    	    }
			     
			    });
		    
			    
        },
        swfPath: "view/player/js",
        supplied: "mp3,oga"
      });
      
    });
	
	
	
	
	</script>
	<script>
	function setId(verseId,id){
		document.getElementById(verseId).innerHTML=id;
	}
	function setCurrentSelection(verseId){
		try{
			if(previousId!=0){
			resetPreviousSelection();
			}
			
			previousId = verseId;
			previousColor = document.getElementById(verseId).style.color;
		alert(verseId);
		$("#"+verseId).css("color","orange");	
		showActiveVerse($("#"+verseId).text());
		}catch(err){
			//errorAlert(err);
			//document.getElementById('verseRowNo'+verseId).style.color=document.getElementById('verseRowNo'+(verseId-1)).style.color;
		}
		
	}
	function resetPreviousSelection(){
		try{
		//document.getElementById(previousId).style.color=previousColor;
		$("#"+previousId).css("color",previousColor);
		document.getElementById(previousId).style.fontWeight='normal';
		}catch(err){
			//document.getElementById('verseRowNo'+verseId).style.color=document.getElementById('verseRowNo'+(verseId-1)).style.color;
		}
		
	}

	</script>
</head>
<body>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio">
  <div class="jp-type-single">
    <div class="jp-gui jp-interface">

        <ul class="jp-controls">
         <li><span class="jp-text" tabindex="1" title="Repeat each audio <?php echo $userSetting->getRepeatAudio();?> time">&#61470;<?php echo $userSetting->getRepeatAudio();?></span></li>
          <li><a href="javascript:;" class="jp-play" tabindex="1" title="Play">&#61515;</a></li>
          <li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause">&#61516;</a></li>
          <li><a href="javascript:;" class="jp-previous" tabindex="1" title="Previous">&#61514;</a></li>
          <li><a href="javascript:;" class="jp-stop" tabindex="1" title="Stop"> &#61517; </a></li>
          <!-- li><a href="javascript:;" class="jp-repeat" tabindex="1" title="Repeat">&#61470;</a></li>
		  <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="Repeat off">&#10805;</a></li-->
          <li><a href="javascript:;" class="jp-next" tabindex="1" title="Next">&#61518;</a></li>
          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="Mute">&#61480;</a></li>
          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="Unmute">&#61478;</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <!-- div class="jp-time-holder">
          <div class="jp-current-time"></div>
        </div-->
        <ul class="jp-toggles">
						<!-- li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
						<li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">shuffle off</a></li-->
		</ul>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
    <div class="jp-no-solution">
    <!-- a href="http://get.adobe.com/flashplayer/" target="_blank">Install Flash plugin</a-->
    </div>
    <!-- div id="jplayer_inspector_1"></div-->
   
    <!-- div class="jp-playlist">
					<ul>
						<li></li>
					</ul>
	</div -->
	
	
  </div>
</div>
</div>

	<script>
	
	function test(){
		//$.jPlayer.pause();
		//$("#jquery_jplayer_1").jPlayer("play", 1);
		
		//alert("?");
		
	}
	//<![CDATA[
	$(document).ready(function(){
        //var audioFiles = [];

        function addAudio_(titl,audioFile,objId){
            var audio = {title:titl,mp3:audioFile,id:objId};
            audioFiles.push(audio);
        }
        /*
        <?php if($userSetting->isArabic()){?>
           addAudio("Taawuz","<?php echo $audioPath.$userSetting->getReciter();?>/mp3/taawuz.mp3","verseRowNo00",1);
		<?php } ?>
		
		<?php // echo ($userSetting->isTranslation()&& $userSetting->isArabic()&& strpos($userSetting->getTranslation(),'jalandhry')!==false && $quran->getCurrentSuraNo()!=9 ?',':''); ?>
		<?php if($userSetting->isTranslation()&& strpos($userSetting->getTranslation(),'jalandhry')!==false ){?>
		addAudio("Taawuz Translation","<?php echo $audioPath.$userSetting->getTranslation(); ?>/mp3/taawuz.mp3","verseRowNo00_1",1);
		<?php } ?>

		<?php if($userSetting->isArabic() && $quran->getCurrentSuraNo()!=9){?>
		  addAudio("Bismillah","<?php echo $audioPath.$userSetting->getReciter();?>/mp3/bismillah.mp3","verseRowNo01",1);
		<?php } ?>
				
		<?php if($userSetting->isTranslation()&& strpos($userSetting->getTranslation(),'jalandhry')!==false && $quran->getCurrentSuraNo()!=9 ){?>
		   addAudio("Bismillah Translation","<?php echo $audioPath.$userSetting->getTranslation(); ?>/mp3/bismillah.mp3","verseRowNo01_1",1);
		<?php } ?>
		*/
	    <?php 
			$quran->setSummary($paraNo,$suraNo,$userSetting->getQuranScript());
			$fromVerse = (isset($_GET['fromVerse'])?$_GET['fromVerse']:$quran->getMinAyaatID());
			$toVerse = (isset($_GET['toVerse'])?$_GET['toVerse']:$quran->getMaxAyaatID());
			$repeatNoOfTimes = $userSetting->getRepeatAudio();
			
			/*
			$query = " SELECT ID,AUDIO FROM quran_details".//.$userSetting->getQuranScript().
			" AT WHERE ".($searchQuery!=''?' ID IN('.$searchQuery.') ':($paraNo>0?' PARA_NO ='.$paraNo:'').($suraNo>0?' SURA_NO ='.$suraNo:'')).$limit."  ORDER BY ID";
			
			$versePath = $audioPath.$userSetting->getReciter();
			$transaltionPath = $audioPath.$userSetting->getTranslation();
			
			$resultset = $dataAccess->getResult($query);
			while($verse = mysql_fetch_object($resultset)){
				$verseNo = $verse->ID;
				$audioFileName = $verse->AUDIO;//$quran->getAudioFileName($verseNo,$suraNo);
			
			?>
			<?php for($repeat=1;$repeat<=$repeatNoOfTimes;$repeat++){ ?>
				<?php if($userSetting->isArabic()){?>
				   //addAudio("<?php echo $audioFileName; ?>","<?php echo $versePath;?>/mp3/<?php echo $audioFileName; ?>.mp3","verseRowNo<?php echo $verseNo; ?>");
				<?php } ?>
			
			<?php if($userSetting->isTranslation() && strpos($userSetting->getTranslation(),'jalandhry')!==false ){?>
				//addAudio("<?php echo $audioFileName; ?>","<?php echo $transaltionPath;?>/mp3/<?php echo $audioFileName; ?>.mp3","translationRowNo<?php echo $verseNo; ?>");				
			<?php } ?>
		 <?php }//for end?>
		
		<?php }*/ ?>
		 
	
		
		myPlaylist= new jPlayerPlaylist({
			jPlayer: "#jquery_jplayer_1",
			cssSelectorAncestor: "#jp_container_1"
		}, audioFiles, {
			swfPath: "view/player/js",
			supplied: "mp3,oga",
			solution:"html,flash",
			wmode: "window",
			errorAlerts: true,
			smoothPlayBar: false,
			keyEnabled: true
		});

		
	});
		
	//]]>
	</script>

</body>
</html>