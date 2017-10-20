<div class="row">
    <div class="col-lg-12">
    <!-- this empty div is to keep rest of UI alligned -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12 SuraTitle" style="border-bottom:0px">
   <?php //echo $quran->getCurrentSuraTitle().'(&nbsp;'.$quran->getCurrentSuraOrigin().'&nbsp;) &nbsp;,&nbsp; '.'مجموع الآيات'.' - '.$quran->getNumberInArabic($quran->getTotalAyaats()).' &nbsp;,&nbsp; '.'مجموع الركوع'.' - '.$quran->getNumberInArabic($quran->getTotalRuqus());?>
   <img  src='themes/<?php echo $userSetting->getTheme(); ?>/images/suraLeftTitle.png' style='float:left;' alt='' />
        <img  src='themes/<?php echo $userSetting->getTheme(); ?>/images/suraRightTitle.png' style='float:right' alt='' />
   
		<span style="float:left;text-align:left;padding-top:7px" >
		  <?php echo 'رُكُوۡ عَاتُهَا'.'-'.$quran->getNumberInArabic($quran->getTotalRuqus());?>
	    </span>
	    <span style="text-align:center;padding-top:7px">
	     <?php echo '('.$quran->getCurrentSuraTitle().'('.$quran->getCurrentSuraOrigin();?>
	    </span>
		<span style="float:right;text-align:right;padding-top:7px" >
		<?php echo 'اٰيٰاتُهَا'.'-'.$quran->getNumberInArabic($quran->getTotalAyaats());?>
		</span>
 		
    </div>
</div>

<?php 	
//for sura-e-Touba don't start with bismillah
if($currentSuraNo!=9){?>
<?php if($userSetting->isArabic()){?>
<div class="row">
    <div class="col-lg-12 SuraTitle">
        <img  src='themes/<?php echo $userSetting->getTheme(); ?>/images/suraLeftTitle.png' style='float:left' alt='' />
        <img  src='themes/<?php echo $userSetting->getTheme(); ?>/images/suraRightTitle.png' style='float:right' alt='' />
		
		<span id="verseRowNo01"  class="<?php echo $userSetting->getArabicFont(); ?>" style="text-align:center;color:<?php echo $userSetting->getVerseColor(); ?>">
				 بِسۡمِ ٱللهِ ٱلرَّحۡمَـٰنِ ٱلرَّحِيمِ 
		    </span>
	</div>
</div>
<?php }}?>
		
<!-- Translation -->		  
<?php 
//for sura-e-Touba don't start with bismillah
if($currentSuraNo!=9){?>
<?php if($userSetting->isTranslation()){?>
<div class="row">
    <div class="col-lg-12 SuraTitle" style="border-top:0px">
        <img  src='themes/<?php echo $userSetting->getTheme(); ?>/images/suraLeftTitle.png' style='float:left' alt='' />
        <img  src='themes/<?php echo $userSetting->getTheme(); ?>/images/suraRightTitle.png' style='float:right' alt='' />

		<span id="verseRowNo01.1" class="<?php echo $userSetting->getTranslationFont(); ?>" style="text-align:center;color:<?php echo $userSetting->getTranslationColor(); ?>">
 		<?php if((strpos($userSetting->getTranslation(),'urdu') ==true)||(strpos($userSetting->getTranslation(),'indopak') ==true)){?>
	 		  شروع الله کے نام سے جو بڑا مہربان نہایت رحم والا ہے
 		 <?php }?>
 		 <?php if(strpos($userSetting->getTranslation(),'english') !==false){?>
			 In the name of Allah, the Beneficent, the Merciful 
		 <?php }?>
		 </span>
	</div>
</div>
<?php }}?>
