<!-- Page Content -->
<div class="row PageTitle" align='center' style='color:<?php echo $userSetting->getverseColor()?>' >
    <div class="col-lg-12 Heading <?php echo $userSetting->getArabicFont(); ?>">
      القرآن الكريم
   </div>
</div>

<?php if($userSetting->isArabic()){?>
<div class="row PageTitle" align='center' style='color:<?php echo $userSetting->getverseColor()?>' >
    <div class="col-lg-12 Heading <?php echo $userSetting->getArabicFont(); ?>" style="color:<?php echo $userSetting->getVerseColor(); ?>"  id="verseRowNo00">
      أعوذ بالله من الشيطان الرجيم
    </div>
</div>
<?php }?>

<?php if($userSetting->isTranslation()){?>
<div class="row PageTitle" align='center' style='color:<?php echo $userSetting->getverseColor()?>' >
    <div class="col-lg-12 <?php echo $userSetting->getTranslationFont(); ?>" style="color:<?php echo $userSetting->getTranslationColor(); ?>" id="verseRowNo00.1">
		<?php if((strpos($userSetting->getTranslation(),'urdu') !==false)||(strpos($userSetting->getTranslation(),'indopak') !==false)){?>
		میں پناہ مانگتا ہوں الله کی شیطان کے شر سے
		<?php }?>
		<?php if(strpos($userSetting->getTranslation(),'english') !==false){?>
		I seek refuge in Allah from Shaitan, the expelled from his mercy
		<?php }?>
    </div>
</div>
<?php }?>
