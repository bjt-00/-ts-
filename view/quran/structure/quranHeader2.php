 <div class="row TopInfoBar">
    <div class="col-lg-12">
	    <span style='float:left;text-align:left;padding-left:10px'>
	    <?php echo 'المنزل'.'-'.$quran->getNumberInArabic($quran->getCurrentManzil());?>
	   </span>
	    <span style='text-align:center;'>
	    <?php echo ' اٰيٰاتُهَا'.' - '.$quran->getNumberInArabic($quran->getTotalAyaats()).' &nbsp;,&nbsp; '.'رُكُوۡ عَاتُهَا'.' - '.$quran->getNumberInArabic($quran->getTotalRuqus());?>
	   </span>
	    <span style='float:right;padding-right:10px;text-align:right;'>
	    <?php echo $quran->getNumberInArabic($quran->getCurrentParaNo()).' - '.$quran->getCurrentParaTitle();?>
	    </span>
   </div>
</div>
<script lang="javascript" >
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

</script>