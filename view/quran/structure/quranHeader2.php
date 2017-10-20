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
