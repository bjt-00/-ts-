<form name='searchForm'  method='GET' >
	<input type="hidden" name="action" value="quran">
		<select name='searchFrom' id="searchFrom">
			<?php if($userSetting->isTranslation()){ ?>
				<option value="<?php echo $userSetting->getTranslation();?>" <?php echo ($userSetting->getTranslation()==(isset($_GET['searchFrom'])?$_GET['searchFrom']:'')?'selected':'')?> ><?php echo (strpos($userSetting->getTranslation(),'urdu')!==false?"Urdu":"English"); ?></option>
				<?php }?>
			<?php if($userSetting->isArabic()){ ?>
				<option value="<?php echo $userSetting->getQuranScript();?>" <?php echo ($userSetting->getQuranScript()==(isset($_GET['searchFrom'])?$_GET['searchFrom']:'')?'selected':'')?> >Arabic</option>
			<?php }?>
		</select>
		<input name='searchText' id="searchText" onkeypress="languageTranslator()" type='text' value="<?php echo (isset($_GET['searchText']) ?$_GET['searchText']:'');?>" placeholder="Type Text or Drag and drop text here" style="width: 60%">
		<input  class='SearchButton WebFont' type='submit' class='WebFont' value="&#61442;" >
		<!-- img id='keyboard' onclick="showDiv('keyBoardPopupDiv');hideDiv('blockerUpDiv')" onmouseover="hover(this.id)"  onmouseout="out(this.id)" src='themes/default/images/icons/keyboard_selected.png' alt='&#61450;' title="Key Board"  /-->
</form>
