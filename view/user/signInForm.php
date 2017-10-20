<?php 
session_start();
 include '../../src/com/bitguiders/weblayer/model/user/UserSettingsBackingBean.php';
 include '../../src/com/bitguiders/weblayer/model/quran/QuranBackingBean.php';
 
 $quran = new QuranBackingBean();
 $_SESSION["QuranBackingBean"] = serialize($quran);
 $userSetting = new UserSettingsBackingBean();
 $userSetting = unserialize($_SESSION['UserSettingsBackingBean']);
 
?>

<?php
   header('content-type:text/html; charset=utf-8');
   include('../structure/imports.php');
?>
<form name='signInForm' method='POST' class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2 Label" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 Label" for="password">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="signIn" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>

<div class="row">
	<div class="col-lg-12">
		<span class='Label'>Don't have account </span> 
		| <a class='Label' href="javascript:showPopUp('Sign Up','view/user/signUpForm.php')"  > Create New Account</a>
		| <a class='Label' href="javascript:showPopUp('Forgott Password','view/user/forgottPasswordForm.php')"  > Forgott Password</a>
	</div>
</div>
