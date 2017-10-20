<div  class="row <?php echo((($verseNo%2)==0?'OddRow':'EvenRow'));?>"   >
    <div class="col-lg-12 Verse <?php echo $userSetting->getArabicFont(); ?>" id="<?php print('verseRowNo'.$verse->AYAAT_ID); ?>" style='color:<?php echo ($isBookmark?'green':$userSetting->getVerseColor())?>;font-size:<?php echo $userSetting->getArabicFontSize()?>px;'>
    
    
	    <!-- Verse Arabic Text -->
	    <?php
	    $words = explode(" ",$verse->AYAAT);
	    $formattedVerse ="";
	    $errorWordIndex=0;//temp later it will be replaced with actual word no
	    $currentWordIndex=0;
	    foreach($words as $word){
	    	$currentWordIndex++;
	    	$word = trim($word," ");
	    	if(strlen($word)>0){
	    	//find error index
	    	if($isError){	
	    	foreach($errorWordIndexs as $index){
	    		$errorWordIndex = ($currentWordIndex==$index?$index:$errorWordIndex);
	    	}}
	 	    $formattedVerse .="<span id='errorWordIndex-".$verse->AYAAT_ID."-".$currentWordIndex."' class='ToolTip ".($isError && $currentWordIndex==$errorWordIndex?"ErrorWord":"NormalWord")."' >"
	 	    ."<span class='ToolTipText'>"
	 	    ." <a id='errorWord-".$verse->AYAAT_ID."-".$currentWordIndex."' href=\"javascript:errorMark(".($isError && $currentWordIndex==$errorWordIndex?"0":"1").",'#errorWordIndex-".$verse->AYAAT_ID."-".$currentWordIndex."',".$verse->AYAAT_ID.",".$currentWordIndex.",'".$userSetting->getVerseColor()."')\" title='".($isError && $currentWordIndex==$errorWordIndex?'Remove Errormark':'Add Errormark')."' class='glyphicon glyphicon-star' style='color:".($isError && $currentWordIndex==$errorWordIndex?'red':'#e1e1e1')."'></a>"
	 	    ." <a href='?searchFrom=".$userSetting->getQuranScript()."&searchText=".$word."' title='Search'><span class='glyphicon glyphicon-search'></span></a>"		
	 	    ."</span>"
	 	    .($searchText!=''?str_replace($searchText, "<font class='SearchText'>".$searchText."</font>", $word) :$word)
	    	."</span> ";
	    	}
	    }
		
	   //	echo ($searchText!=''?str_replace($searchText, "<font class='SearchText'>".$searchText."</font>", $formattedVerse) :$formattedVerse)
	    echo $formattedVerse;
	    ?>
    	<!-- Verse No -->
		<span class="Circle">
		    <?php echo $verse->AYAAT_ID-$quran->getMinAyaatID()+1;$ayaatNo++;?>
			<?php //echo $quran->getNumberInArabic(($verse->AYAAT_ID-$quran->getMinAyaatID())+1);$ayaatNo++;?>
		</span>
	    
        <!-- Verse Play icon -->
		<a class="WebFont Circle" style="font-size:16px" href="javascript:myPlaylist.play(<?php echo $playIndex; ?>);" title="Play Audio">
			<img id="<?php print('ayaatPlayNo'.$verse->AYAAT_ID); ?>" onmouseover="rollover(this.id,'<?php echo ($isRaqu==''?'o':'or')?>')"  onmouseout="selected(this.id,'<?php echo ($isRaqu==''?'o':'or')?>')" src='themes/default/images/icons/<?php echo ($isRaqu==''?'o':'or')?>_selected.png' alt='&#61469;' title="<?php echo ($userSetting->getRepeatAudio()==1?'Play':'Repeat '.$userSetting->getRepeatAudio().' times the')?> audio of verse no <?php echo $quran->getNumberInArabic(($verse->AYAAT_ID-$quran->getMinAyaatID())+1);$ayaatNo;?>" />
		</a>
	    <?php $playIndex +=($userSetting->getRepeatAudio()>1?$userSetting->getRepeatAudio():1);?>
	    
		<!-- Error Marks -->
		<div  style='float:right;width:15px;font-size:16px;padding-right:15px' class="WebFont">
	<a id='<?php print('verseNo'.$verse->AYAAT_ID); ?>' href="javascript:markForFutureReading(<?php print('verseNo'.$verse->AYAAT_ID); ?>,<?php print($verse->AYAAT_ID); ?>,'<?php echo $userSetting->getVerseColor();?>')" title="Bookmark" class="glyphicon glyphicon-star-empty" style="color:<?php echo ($isBookmark?'green':'#e1e1e1');?>">
    </a>			
		
	<!-- a id='<?php print('errorVerseNo'.$verse->AYAAT_ID); ?>' href="javascript:errorMark(<?php print('errorVerseNo'.$verse->AYAAT_ID); ?>,<?php print($verse->AYAAT_ID); ?>,'<?php echo $userSetting->getVerseColor();?>')" title="Errormark" class="glyphicon glyphicon-star" style="color:<?php echo ($isError?'red':'#e1e1e1');?>">
    </a-->	
    
			
			<!-- img id='<?php print('partNo'.$verse->AYAAT_ID); ?>' onclick="updateVerse(this.id,<?php print($verse->AYAAT_ID); ?>)" src='themes/default/images/icons/<?php echo $verse->PART_NO; ?>.png' alt='X' style='flat:right;color:<?php echo ($isError?'red':'#e1e1e1')?>' title="Para Part" /-->
			<?php echo $isManzal;?>
		</div>

		<!-- Raqu presentation -->
		<div id="<?php echo $isPart;?>" style='float:right;border:0px solid red;padding-right:20px;padding-left:3px'>
				<span  style='font-size:<?php echo $userSetting->getArabicFontSize(); ?>px;font-weight:bold;color:orange;'>
					<span  style='font-size:16px;height:10px;'>
						<?php echo $isPart;?>
						<?php echo ($isSajda!=''?$isSajda:'');?>
					</span>
					<?php echo ($isRaqu!=''?'&nbsp;'.$quran->getNumberInArabic($raquNo).$isRaqu:'&nbsp;');?>
				</span>
		</div>							
    </div>
</div>