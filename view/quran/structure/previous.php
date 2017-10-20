				<div class='LeftPanel WebFont'>
				<?php 
				$previousSuraNo = $suraNo;
				$previousSuraNo = (--$previousSuraNo==0?114:$previousSuraNo);
				$previousParaNo = $paraNo;
				$previousParaNo=(--$previousParaNo==0?30:$previousParaNo); 
				$previous = ($paraNo<=0?'suraNo='.$previousSuraNo:'paraNo='.$previousParaNo);
				?>
				<a href="?<?php echo $previous;?>" title="Previous">
				<img class="Icon" name='previous' id='previous'   src='themes/default/images/icons/previous_selected.png' alt="&#61514;" />
				</a>
				</div>
