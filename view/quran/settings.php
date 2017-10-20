<?php 
session_start();
 include '../../src/com/bitguiders/weblayer/model/user/UserSettingsBackingBean.php';
 include '../../src/com/bitguiders/weblayer/model/quran/QuranBackingBean.php';
 
 $quran = new QuranBackingBean();
 $_SESSION["QuranBackingBean"] = serialize($quran);
 $userSetting = new UserSettingsBackingBean();
 $userSetting = unserialize($_SESSION['UserSettingsBackingBean']);
 
?>

<?php
   header('content-type:text/html; charset=utf-8');
    
   $paraNo = (isset($_GET['paraNo'])?$_GET['paraNo']:1 );
   $translation = (isset($_GET['translation'])?$_GET['translation']:'urdu' );
?>
<form name='userSettingsForm' method='POST' class="form-horizontal" role="form">
  <div class="row">
    <div class="col-lg-6" >
    	<fieldset>
    		<legend><span class="glyphicon glyphicon-cog"> Verse</span></legend>
			  <div class="row">
			    <div class="col-lg-12" >
			      <div id='verseExampleText' class='SampleTextBox'  style="color:<?php echo $userSetting->getVerseColor()?>;font-family:<?php echo $userSetting->getArabicFont()?>;font-size:<?php echo $userSetting->getArabicFontSize()?>px">
			      الرَّحْمـنِ 
			      </div>
			    </div>
			  </div>
		   <div class="row">
		    <div class="col-lg-6 Label">
			      <input name='verseColor' id='verseColor'  type='color' value='<?php echo $userSetting->getVerseColor()?>' class='color' onchange="document.getElementById('verseExampleText').style.color=this.value;this.style.backgroundColor=this.value;" style="background-color:<?php echo $userSetting->getVerseColor()?>;width:15px;height:15px;font-size:1px;" title="Verse Color">
		      <span id="tst" class="glyphicon glyphicon-text-size"></span>
		      [<span id="arabicFontSizeDisplay"><?php echo $userSetting->getArabicFontSize();?></span>]
		    </div>
		    <div class="col-lg-6">
			      <input  type="range" id="arabicFontSize" name="arabicFontSize" min="16" max="100" onchange="$('.Verse').css('font-size',this.value+'px');$('#arabicFontSizeDisplay').html(this.value);$('#verseExampleText').css('font-size',this.value+'px');this.title=this.value;"  title="<?php echo $userSetting->getArabicFontSize()?>"  value="<?php echo $userSetting->getArabicFontSize()?>">
		    </div>
		  </div>

			  <div class="row">
			    <div class="col-lg-4  Label">
			      Font
			    </div>
			    <div class="col-lg-8">
					 <select id='arabicFont' name='arabicFont'  class="form-control">
						<option value='IndoPak' <?php echo ($userSetting->getArabicFont()=='IndoPak'?'selected':'')?> >Indo Pak</option>
						<option value='Usmani' <?php echo ($userSetting->getArabicFont()=='Usmani'?'selected':'')?> >Usmani</option>
						<option value='Default' <?php echo ($userSetting->getArabicFont()=='Default'?'selected':'')?> >Simple</option>
					 </select>
			     </div>
			  </div>
			     <div class="row">
			    <div class="col-lg-4  Label">Script </div>
			    <div class="col-lg-8">    
					<select id='quranScript' name='quranScript' class="form-control"  >
					    <option value='quran_in_indopak_script' <?php echo ($userSetting->getQuranScript()=='quran_in_indopak_script'?'selected':'')?> onclick="document.getElementById('verseExampleText').innerHTML='الرَّحۡمٰنِ'">Indo Pak </option>
					    <option value='quran_in_usmani_script' <?php echo ($userSetting->getQuranScript()=='quran_in_usmani_script'?'selected':'')?> onclick="document.getElementById('verseExampleText').innerHTML='ٱلرَّحۡمَـٰنِ'">Usmani</option>
					    <option value='quran_in_default_script' <?php echo ($userSetting->getQuranScript()=='quran_in_default_script'?'selected':'')?> onclick="document.getElementById('verseExampleText').innerHTML='الرَّحْمـنِ'" >Simple</option>
					    <option value='hide' <?php echo ($userSetting->isArabic()=='0'?'selected':'')?> >Hide</option>
					</select>
			    </div>
			  </div>

    	</fieldset>
    </div>
    <div class="col-lg-6" >
    	<fieldset>
    		<legend><span class="glyphicon glyphicon-cog"> Translation</span></legend>
		  <div class="row">
		    <div class="col-lg-12" >
		        <div id='translationExampleText' class="SampleTextBox"  style="color:<?php echo $userSetting->getTranslationColor()?>;font-family:<?php echo $userSetting->getTranslationFont()?>;font-size:<?php echo $userSetting->getTranslationFontSize()?>px" >
		        مہربان 
		        </div>
		    </div>
		  </div>
		   <div class="row">
		    <div class="col-lg-6 Label">
		      <input  name='translationColor' id='translationColor' type='color' value='<?php echo $userSetting->getTranslationColor()?>' class='color' onchange="document.getElementById('translationExampleText').style.color=this.value;this.style.backgroundColor=this.value;" style="background-color:<?php echo $userSetting->getTranslationColor()?>;width:15px;height:15px;font-size:1px;" title="Translation Color" >
		      <span class="glyphicon glyphicon-text-size"></span>
		      [<span id="translationFontSizeDisplay"><?php echo $userSetting->getTranslationFontSize();?></span>]
		    </div>
		    <div class="col-lg-6">
			      <input  type="range" id="translationFontSize" name="translationFontSize" min="16" max="100" onchange="$('.Translation').css('font-size',this.value+'px');$('#translationFontSizeDisplay').html(this.value);$('#translationExampleText').css('font-size',this.value+'px');this.title=this.value;"  title="<?php echo $userSetting->getTranslationFontSize()?>"  value="<?php echo $userSetting->getTranslationFontSize()?>">
		    </div>
		  </div>

		   <div class="row">
		    <div class="col-lg-4  Label">
		      Font
		    </div>
		    <div class="col-lg-8">
				<select id='translationFont' name='translationFont' onchange="document.getElementById('translationExampleText').style.fontFamily=this.value" class="form-control">
				    <option value='JameelNooriNastaleeq' <?php echo ($userSetting->getTranslationFont()=='JameelNooriNastaleeq'?'selected':'')?> >Nashtaleeq</option>
				    <option value='AlviNastaleeq' <?php echo ($userSetting->getTranslationFont()=='Usmani'?'selected':'')?> >Alvi</option>
				    <option value='' <?php echo ($userSetting->getTranslationFont()==''?'selected':'')?> >Default</option>
			  </select>
		    </div>
		  </div>
		   <div class="row">
		    <div class="col-lg-4  Label">Translation</div>
		    <div class="col-lg-8">    
				<select id='translation' name='translation' class="form-control">
				    <option value='translation_urdu_jalandhry' <?php echo ($userSetting->getTranslation()=='translation_urdu_jalandhry'?'selected':'')?> onclick="document.getElementById('translationExampleText').innerHTML='بڑا مہربان'">Urdu Jalandhry - Audio</option>
				    <option value='translation_english_pickthal' <?php echo ($userSetting->getTranslation()=='translation_english_pickthal'?'selected':'')?> onclick="document.getElementById('translationExampleText').innerHTML='the Merciful'">English Pickthal</option>
				    <option value='translation_urdu_ahmed_ali' <?php echo ($userSetting->getTranslation()=='translation_urdu_ahmed_ali'?'selected':'')?> onclick="document.getElementById('translationExampleText').innerHTML='بڑا مہربان'">Urdu Ahmed Ali</option>
				    <option value='hide' <?php echo ($userSetting->isTranslation()=='0'?'selected':'')?> >Hide</option>
				</select>
		    </div>
		  </div>

    	</fieldset>
    </div>
  </div>
  <div class="col-lg-12"></div>
  <div class="row" >
    <div class="col-lg-12" >
    	<fieldset>
    		<legend><span class="glyphicon glyphicon-cog">Audio</span></legend>
			   <div class="row">
			    <div class="col-lg-6  Label"><span class="glyphicon glyphicon-volume-up"></span> Reciter</div>
			    <div class="col-lg-6">    
					<select id='reciter' name='reciter' class="form-control">
					 	<option value='reciter_abdul_rahman_as_sudais' <?php echo ($userSetting->getReciter()=='reciter_abdul_rahman_as_sudais'?'selected':'')?> >As Sudays and Shraym</option>
					   	<option value='reciter_saad_al_ghamdi' <?php echo ($userSetting->getReciter()=='reciter_saad_al_ghamdi'?'selected':'')?>>Saad Al Ghamdi</option>
					   	<option value='reciter_abdul_baasit_as_samad' <?php echo ($userSetting->getReciter()=='reciter_abdul_baasit_as_samad'?'selected':'')?>>Abdul Baasit</option>
					</select>
			    </div>
			  </div>
			   <div class="row">
			    <div class="col-lg-6  Label"><span class="glyphicon glyphicon-repeat"></span> Repeat Audio (<span id="repeatAudioDisplay"><?php echo $userSetting->getRepeatAudio();?></span>)</div>
			    <div class="col-lg-6">    
			 		 <input  type="range" id="repeatAudio" name="repeatAudio" min="1" max="10" onchange="document.getElementById('repeatAudioDisplay').innerHTML=this.value;this.title=this.value;" title="<?php echo $userSetting->getRepeatAudio();?>"  value="<?php echo $userSetting->getRepeatAudio();?>">
			    </div>
			  </div>
			   <div class="row">
			    <div class="col-lg-6  Label">Theme</div>
			    <div class="col-lg-6">    
					<select id='theme' name='theme' onclick="document.getElementById('themeLink').href='themes/'+this.value+'/'+this.value+'.css'" class="form-control">
					    <option value='default' <?php echo ($userSetting->getTheme()=='default'?'selected':'')?> style='background:rgb(33,32,82);color:#ffffff'>Default</option>
					    <option value='spring' <?php echo ($userSetting->getTheme()=='spring'?'selected':'')?> style='background:rgb(113,194,6);color:#ffffff'>Spring</option>
					    <option value='autmn' <?php echo ($userSetting->getTheme()=='autmn'?'selected':'')?> style='background:rgb(200,32,21);color:#ffffff'>Autmn</option>
					    <option value='winter' <?php echo ($userSetting->getTheme()=='winter'?'selected':'')?> style='background:rgb(106,113,139);color:#ffffff'>Winter</option>
					    <option value='summer' <?php echo ($userSetting->getTheme()=='summer'?'selected':'')?> style='background:rgb(255,232,34);color:#ffffff'>Summer</option>
					</select>
			    </div>
			  </div>

	</fieldset>
  </div>
  </div>
 <div class="col-lg-12"></div>
   <div class="row">
    <div class="col-lg-12">
      <button type="submit" name="applySettings" class="btn btn-default">Apply Changes</button>
    </div>
  </div>
</form>

							
