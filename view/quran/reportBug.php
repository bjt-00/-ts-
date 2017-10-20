<?php 
session_start();
 include '../../src/com/bitguiders/dataaccesslayer/DataAccess.php';
 include '../../src/com/bitguiders/weblayer/model/mail/EmailTransmitter.php';
 include '../../src/com/bitguiders/weblayer/model/user/UserSettingsBackingBean.php';
 include '../../src/com/bitguiders/weblayer/model/quran/QuranBackingBean.php';
 include '../../src/com/bitguiders/weblayer/model/user/UserBackingBean.php';
 
// $dataAccess = new DataAccess();
 $dataAccess = unserialize($_SESSION['DataAccess']);
 
 $quran = new QuranBackingBean();
 $quran = unserialize($_SESSION['QuranBackingBean']);
 
 $userSetting = new UserSettingsBackingBean();
 $userSetting = unserialize($_SESSION['UserSettingsBackingBean']);

 $user = new UserBackingBean();
 $user = unserialize($_SESSION['UserBackingBean']);
 
 ?>


<?php
   header('content-type:text/html; charset=utf-8');
   $quran->setSummary($userSetting->getActivePara(),$userSetting->getActiveSura(),$userSetting->getQuranScript());
?>
   <form name='bugReportForm' method='POST' class="form-horizontal" role="form">
				
						<div class="row">
							<div class="col-lg-12"  id='bugReportMessage' colspan="4" class='Error'>
							</div>
					</div>
<div class="row">
	<div class="col-lg-12 Label" style="text-align:left">
	<?php echo $user->getUserName(); ?>
    </div>
</div>    					
<div class="row">
	<div class="col-lg-12 Label" style="text-align:left;padding:left:5px">
		Current Para ( <?php echo $quran->getParaName($quran->getCurrentParaNo()) ?> )
		<input name='paraNo' type='hidden' value='<?php echo $quran->getCurrentParaNo();?>' size='2' readonly="readonly" class="form-control">
		 , Current Sura (<?php echo $quran->getSuraName($quran->getCurrentSuraNo())?>)
		<input name='suraNo' type='hidden' value='<?php echo $quran->getCurrentSuraNo();?>' size='3' readonly="readonly" class="form-control">
		<input name='quranScript' type='hidden' value='<?php echo $userSetting->getQuranScript();?>' readonly="readonly" class="form-control">
		<input name='translation' type='hidden' value='<?php echo $userSetting->getTranslation();?>' readonly="readonly" class="form-control">
	</div>
</div>
						
						
						<div class="row">
							<div class="col-lg-3 Label">Verse No</div>
							<div class="col-lg-3" >
							<input name='verseNo' type='text'  class="form-control" required="required" placeholder="0" min="1" >
						   </div>
							<div class="col-lg-3 Label">Bug Type</div>
							<div class="col-lg-3" >
								<select id='bugType' name='bugType' class="form-control">
							   	 	<option value='arabic'>Arabic Error</option>
							   	 	<option value='translation'>Translation Error</option>
							   	 	<option value='gui'>GUI error</option>
							   	 	<option value='suggestion'>Suggestion</option>
							   	 	<option value='query'>Query</option>
							   	 	<option value='other'>Other</option>
							  	</select>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12 Label" style="text-align: left">Description *</div>
						</div>
						<div class="row">
							<div class="col-lg-12"><textarea id="bugDescription" name='bugDescription' rows="3" style='width:100%' class="form-control" required="required" ></textarea> </div>
						</div>
<div class="row">
	<div class="col-lg-12">&nbsp;</div>
</div>
						
  <div class="row">
    <div class="col-lg-12">
      <button type="submit" name="reportBug" class="btn btn-default">Report Bug</button>
    </div>
  </div>
			
</form>
<p>
<fieldset >
	<legend id="reportedBugsTab" onclick="$('#reportedBugsList').slideDown(2000);">Reported Bugs</legend>
	<div id="reportedBugsList">
	<ol>
<?php 
$bugsList = $quran->getBugsList();

while($bug = mysql_fetch_object($bugsList)){
	echo "<li>".$bug->type." [ Reported By: ".$bug->user_id." ]".$bug->description."</li>";
}
?>
</ol>
</div>
<script type="text/javascript">$('#reportedBugsList').slideUp(2000);</script>
</fieldset>
