
   <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Custom CSS -->
    <style>
    body {
        padding-top: 60px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>
	<link  rel="stylesheet" type="text/css" href="themes/common/common.css" />
    
    <link id="themeLink" rel="stylesheet" type="text/css" href="themes/<?php echo $userSetting->getTheme();?>/<?php echo $userSetting->getTheme();?>.css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery Version 1.11.1 -->
    <script src="scripts/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!-- script src="scripts/jquery-1.8.2.min.js"></script-->
    <script src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="scripts/thesuffah.js"></script>
	
	
		  <!--pop up-->
	
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header TitleBar">
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        <h4 id="popupHeading" class="modal-title PageTitle">Modal Header</h4>
      </div>
      <div id='loadingDiv' class="Label" style="margin:0 auto;text-align: center;">L <img   src="themes/default/images/loading.gif" width="18" height="18"> a d i n g...</div>
      <div id='popupContents' class="modal-body Body">
      </div>
      <div class="modal-footer PopupButtonsBar">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
	<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header TitleBar">
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        <h4 id="popupHeading2" class="modal-title PageTitle">Sign Up</h4>
      </div>
      <div id='popupContents2' class="modal-body Body">
      <?php include('signUpForm.php'); ?>
      </div>
      <div class="modal-footer PopupButtonsBar">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	