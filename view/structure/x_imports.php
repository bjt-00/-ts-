
<link id="themeLink" rel="stylesheet" type="text/css" href="themes/<?php echo $userSetting->getTheme();?>/<?php echo $userSetting->getTheme();?>.css" />

	<link rel="StyleSheet" href="scripts/tree/tree.css" type="text/css">
	<script type="text/javascript" src="scripts/jscolor/jscolor.js"></script>
	<script type="text/javascript" src="scripts/thesuffah.js"></script>
	<script type="text/javascript" src="view/visitor/visitor.js"></script>
	<script type="text/javascript" src="scripts/angular.min.js"></script>

 <!-- back screen covering div during pop up -->
<div id='blockerUpDiv' style='width:100%;height:100%;border:2px;top:0%;bottom:0%;right:0%;z-index:3;background-color:black;opacity:0.5;filter:alpha(opacity=50);display:none;position:fixed'></div>
	
<!-- Sign In Form -->
<?php include('view/user/signInForm.php'); ?>
<!-- Sign Up Form -->
<?php include('view/user/signUpForm.php'); ?>


<!-- The QURAN Contents -->
<!-- Manzils List -->
<?php include('view/quran/manzilsList.php'); ?>

<!-- Paras List -->
<?php include('view/quran/parasList.php'); ?>

<!-- Suras List -->
<?php include('view/quran/surasList.php'); ?>

<!-- Sajdas List -->
<?php include('view/quran/sajdasList.php'); ?>

<!-- Settings -->
<?php include('view/quran/settings.php'); ?>
<!-- User Bookmarks -->
<?php include('view/quran/bookmarksList.php'); ?>


<!-- User Errors -->
<?php include('view/quran/errorsList.php'); ?>

<!-- User Errors -->
<?php include('view/structure/alert.php'); ?>

<!-- Report Bug -->
<?php include('view/quran/reportBug.php'); ?>

<!-- Key Board -->
<?php include('view/quran/keyboard/keyBoard.php'); ?>
