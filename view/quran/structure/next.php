				<div class='RightPanel WebFont'>				
					<?php 
					$nextSuraNo = $suraNo;
					$nextSuraNo = (++$nextSuraNo==115?1:$nextSuraNo);
					
					$nextParaNo = $paraNo;
					$nextParaNo=(++$nextParaNo==31?1:$nextParaNo); 
					$next = ($paraNo<=0?'suraNo='.$nextSuraNo:'paraNo='.$nextParaNo);
					?>
					<a href="?<?php echo $next;?>" title="Next">
					<img class="Icon" name='next' id='next'   src='themes/default/images/icons/next_selected.png' alt="&#61518;" />
					</a>
				</div>
