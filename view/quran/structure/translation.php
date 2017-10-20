<div  class="row Translation <?php echo((($verseNo%2)==0?'OddRow':'EvenRow'));?>" id="<?php print('translationRowNo'.$verse->AYAAT_ID); ?>"  style='color:<?php echo ($isError?'red':($isBookmark?'green':$userSetting->getTranslationColor()))?>;font-size:<?php echo $userSetting->getTranslationFontSize()?>px;'>
    <div class="col-lg-12 <?php echo $userSetting->getTranslationFont(); ?>" style="text-align: right">
    
		    
	        
        <!-- Verse Play icon -->
        <?php if(strpos($userSetting->getTranslation(),'jalandhry')!==false ){?>
		<a class="WebFont" style="font-size:16px" href="javascript:myPlaylist.play(<?php echo $playIndex; ?>);" title="Play Audio">
			<img id="<?php print('translationPlayNo'.$verse->AYAAT_ID); ?>" onmouseover="rollover(this.id,'<?php echo ($isRaqu==''?'o':'or')?>')"  onmouseout="selected(this.id,'<?php echo ($isRaqu==''?'o':'or')?>')" src='themes/default/images/icons/<?php echo ($isRaqu==''?'o':'or')?>_selected.png' alt='&#61469;' title="<?php echo ($userSetting->getRepeatAudio()==1?'Play':'Repeat '.$userSetting->getRepeatAudio().' times the')?> translation audio of verse no <?php echo $quran->getNumberInArabic(($verse->AYAAT_ID-$quran->getMinAyaatID())+1);$ayaatNo;?>" />
		</a>
		<?php }else{?>
				<img src='themes/default/images/icons/<?php echo ($isRaqu==''?'o':'or')?>_selected.png' alt='&#61469;' title=" End of verse no <?php echo $quran->getNumberInArabic(($verse->AYAAT_ID-$quran->getMinAyaatID())+1);$ayaatNo;?>" />
		<?php }?>

    	<!-- Verse No -->
		<span class="Circle">
		    <?php echo $verse->AYAAT_ID-$quran->getMinAyaatID()+1;$ayaatNo++;?>
			<?php //echo $quran->getNumberInArabic(($verse->AYAAT_ID-$quran->getMinAyaatID())+1);$ayaatNo++;?>
		</span>
		
		<!-- Verse Translation Text -->
		<?php $playIndex +=($userSetting->getRepeatAudio()>1?$userSetting->getRepeatAudio():1);?>
    	<?php //echo ($searchText!=''?str_replace($searchText, "<span class='SearchText'>".$searchText."</span>", $verse->TRANSLATION) :$verse->TRANSLATION)?>
			    <!-- Verse Arabic Text -->
	    <?php
	    $words = explode(" ",$verse->TRANSLATION);
	    $formattedTranslation ="";
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
	 	    $formattedTranslation .="<span id='errorWordIndex-".$verse->AYAAT_ID."-".$currentWordIndex."' class='ToolTip NormalWord' >"
	 	    ."<span class='ToolTipText'>"
	 	    ." <a href='?searchFrom=".$userSetting->getTranslation()."&searchText=".$word."' title='Search'><span class='glyphicon glyphicon-search'></span></a>"		
	 	    ."&nbsp;</span>"
	 	    .($searchText!=''?str_replace($searchText, "<font class='SearchText'>".$searchText."</font>", $word) :$word)
	    	."</span> ";
	    	}
	    }
		
	    echo $formattedTranslation;
	    ?>
		
		
		<!-- Error Marks -->
		<div  style='float:right;width:15px;font-size:16px;padding-right:15px' class="WebFont">
		<a id='<?php print('translationNo'.$verse->AYAAT_ID); ?>' href="javascript:markForFutureReading(<?php print('verseNo'.$verse->AYAAT_ID); ?>,<?php print($verse->AYAAT_ID); ?>,'<?php echo $userSetting->getVerseColor();?>')" title="" class="glyphicon glyphicon-star-empty" style="color:<?php echo ($isBookmark?'green':'#e1e1e1');?>">
    </a>			
		
	<a id='<?php print('errorTranslationNo'.$verse->AYAAT_ID); ?>' href="javascript:errorMark(<?php print('errorVerseNo'.$verse->AYAAT_ID); ?>,<?php print($verse->AYAAT_ID); ?>,'<?php echo $userSetting->getVerseColor();?>')" title="" class="glyphicon glyphicon-star" style="color:<?php echo ($isError?'red':'#e1e1e1');?>">
    </a>	
	
									    
			<!-- img id='<?php print('partNo'.$verse->AYAAT_ID); ?>' onclick="updateVerse(this.id,<?php print($verse->AYAAT_ID); ?>)" src='themes/default/images/icons/<?php echo $verse->PART_NO; ?>.png' alt='X' style='flat:right;color:<?php echo ($isError?'red':'#e1e1e1')?>' title="Para Part" /-->
			<?php echo $isManzal;?>
		</div>

		<!-- Raqu presentation -->
		<div style='float:right;border:0px solid red;padding-right:20px;padding-left:3px' class="<?php echo $userSetting->getArabicFont(); ?>">
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