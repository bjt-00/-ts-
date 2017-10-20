<?php  include('view/quran/quranInfoBar.php'); ?>
<div class="row ButtonsBar WebFont">
	    <div class="col-lg-6" style='text-align:left;padding-left:15px;float:left'>
	        <img src="themes/default/images/thesuffah.png" alt="TheSuffah" style="margin-bottom: 0px;margin-left: 0px;" />
		<img src='themes/default/images/icons/splitter.png' alt='::' title="<?php //echo $dataAccess->getNoOfQueries();?>" />
	    
			<!-- img id='info' data-toggle="modal" data-target="#myModal" onclick="showPopUp('Quran Info','view/quran/quranInfoBar.php')" onclick="showDiv('infoPopupDiv')" onmouseover="hover(this.id)"  onmouseout="out(this.id)" src='themes/default/images/icons/info_selected.png' alt='&#61450;' title="Info" /-->
	    </div>
	    <div class="col-lg-6" style="padding-right:20px;">
				<?php //include('view/quran/quranButtonsBar.php');?>		
						<?php if(!isset($_GET['searchText'])){?>
						<span class='Label'>From Verse </span>
						<select  name='fromVerse' id='fromVerse' style='height:20px;font-size:14px'>
							<?php 
							$quran->setSummary($paraNo,$suraNo,$userSetting->getQuranScript());
							$verseCounter=0;
							for($i=$quran->getMinAyaatID();$i<=$quran->getMaxAyaatID();$i++){?>
							<option value="<?php echo $i;?>" <?php echo ((isset($_GET['fromVerse'])&& $_GET['fromVerse']==$i)?'selected':'')?> ><?php echo ++$verseCounter;?></option>
							<?php }?>
						</select>
						<span class='Label'>To</span>
						<select name='toVerse' id='toVerse' onchange="window.location='index.php?action=quran&<?php print(($paraNo==0?'suraNo='.$suraNo:'paraNo='.$paraNo));?>&fromVerse='+document.getElementById('fromVerse').value+'&toVerse='+this.value" style='height:20px;font-size:14px' >
							<?php 
							$quran->setSummary($paraNo,$suraNo,$userSetting->getQuranScript());
							$verseCounter=0;
							for($i=$quran->getMinAyaatID();$i<=$quran->getMaxAyaatID();$i++){?>
							<option value="<?php echo $i;?>" <?php echo ((isset($_GET['toVerse'])&& $_GET['toVerse']==$i)?'selected':(!isset($_GET['toVerse']) && $quran->getMaxAyaatID()==$i?'selected':''))?>><?php echo ++$verseCounter;?></option>
							<?php }?>
						</select>
					<?php }?>
	    
	    </div>
</div>