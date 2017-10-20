<div id='HeaderDiv' class="Header">
<table style="width:100%" celpadding="0" cellspacing="0">
	<tr>
		<td>
		<!-- loading -->
			<img id='pageLoading' src="themes/default/images/loading.gif" width="18" height="18">
				<a href="downloads">
				<img id='download'   src='themes/default/images/icons/download_selected.png' alt='&#61450;' title="Downloads" />
				</a>
				<!--  a style="font-family:verdana;color:#ffffff;background-color:orange;font-size:14px;padding-left:5px;padding-right:5px;border:1px solid #e1e1e1;" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=DNB4QB9XHGYJ2&lc=AE&item_name=The Suffah ::: Quran, Hadith and You (Project)&no_note=0&cn=Add%20special%20instructions%20to%20the%20seller%3a&no_shipping=1&rm=1&return=http%3a%2f%2fwww%2ethesuffah%2eorg%2fsuccess&cancel_return=http%3a%2f%2fwww%2ethesuffah%2eorg%2fcancel&currency_code=USD&bn=PP%2dDonationsBF%3abug_rollover%2epng%3aNonHosted" target="_new" title="You have an Opportunity to contribute in this project." > D o n a t e </a-->
				
		</td>	
		<td class="TabRight">
		</td>
		<td class="TabMiddle" style="text-align:right;">
				<img class="Icon" id='manzil' data-toggle="modal" data-target="#myModal" onclick="showPopUp('فهرست المنزل','view/quran/manzilsList.php')"     src='themes/default/images/icons/manzil_selected.png' alt='&#61450;' title="Manzils List" />
				<img class="Icon" id='para' data-toggle="modal" data-target="#myModal" onclick="showPopUp('فهرست پارا','view/quran/parasList.php')"     src='themes/default/images/icons/para_selected.png' alt='&#61451;' title="Paras List" />
				<img class="Icon" id='sura' data-toggle="modal" data-target="#myModal" onclick="showPopUp('فهرست سورة','view/quran/surasList.php')"    src='themes/default/images/icons/sura_selected.png' alt='&#61642;' title="Suras List" />
				<img class="Icon" id='sajda' data-toggle="modal" data-target="#myModal" onclick="showPopUp('فهرست السجدة','view/quran/sajdasList.php')"     src='themes/default/images/icons/sajda_selected.png' alt='Û©' title="Sajdas List" />
				<img class="Icon" id='settings' data-toggle="modal" data-target="#myModal" onclick="showPopUp('Settings','view/quran/settings.php')"     src='themes/default/images/icons/settings_selected.png' alt='&#61613;' title="Settings"/>
				<img class="Icon" id='bug' data-toggle="modal" data-target="#myModal" onclick="showPopUp('Report Bug','view/quran/reportBug.php')"     src='themes/default/images/icons/bug_selected.png' alt='&#61450;' title="Report Bug"/>
		</td>
		<td class="TabMiddleRight">
		</td>
		<td class="TabMiddle" style="<?php echo ($user->getUserId()!='default'?'':'width:90px')?>">
				<img class="Icon" id='error' data-toggle="modal" data-target="#myModal" onclick="showPopUp('My Error Marks','view/quran/errorsList.php')"  src='themes/default/images/icons/error_selected.png' alt='&#61603;' title="My errors" style='color:red' />
				<img class="Icon" id='bookmark' data-toggle="modal" data-target="#myModal" onclick="showPopUp('My Book Marks','view/quran/bookmarksList.php')"  src='themes/default/images/icons/bookmark_selected.png' alt='&#61603;' title="My Bookmarks" style="color:green" />
				<?php if($user->getUserId()!='default'){?>
				<a href='index.php?action=quran&signOut'>
				<img class="Icon" id='signout' data-toggle="modal" data-target="#myModal" onclick="showPopUp('Sign Out','view/quran/surasList.php')"   src='themes/default/images/icons/signout_selected.png' alt='&#61579;' title="Sign Out"/>
				</a>
				<span class='Label'> <?php  echo $user->getUserName(); ?></span>
				<?php }else{?>
				<img class="Icon" id='signin' data-toggle="modal" data-target="#myModal" onclick="showPopUp('Sign In','view/user/signInForm.php')"  src='themes/default/images/icons/signin_selected.png' alt='&#61584;' title="Sign In"/>
				<?php }?>
				
		</td>
		</tr>
		<tr>
		</tr>
</table>
</div>
<div class="SearchBar">
<?php include('view/quran/search.php');?>
</div>