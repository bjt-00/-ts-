<!DOCTYPE html>
  <div class="alert alert-success" id="successAlert" style="display: <?php echo (isset($_SESSION["success"])?'':'none');?>" >
    <strong>Success!</strong> <div id="successMessage"><?php echo (isset($_SESSION["success"])?$_SESSION["success"]:'');?></div>
  </div>
   <?php if(isset($_SESSION["success"])){
  	unset($_SESSION["success"]);
  	?>
  <script>
  setTimeout(function(){$('#successAlert').fadeOut("slow");},5000);
  </script>
  <?php }?>

  <div class="alert alert-info" id="infoAlert" style="display: <?php echo (isset($_SESSION["info"])?'':'none');?>" >
    <strong>Info!</strong> <div id="infoMessage"><?php echo (isset($_SESSION["info"])?$_SESSION["info"]:'');?></div>
  </div>
   <?php if(isset($_SESSION["info"])){
  	unset($_SESSION["info"]);
  	?>
  <script>
  setTimeout(function(){$('#infoAlert').fadeOut("slow");},5000);
  </script>
  <?php }?>


  <div class="alert alert-warning" id="warningAlert" style="display: <?php echo (isset($_SESSION["warning"])?'':'none');?>" >
    <strong>Warning!</strong> <div id="warningMessage"><?php echo (isset($_SESSION["warning"])?$_SESSION["warning"]:'');?></div>
  </div>
   <?php if(isset($_SESSION["warning"])){
  	unset($_SESSION["warning"]);
  	?>
  <script>
  setTimeout(function(){$('#warningAlert').fadeOut("slow");},5000);
  </script>
  <?php }?>


  <div class="alert alert-danger" id="errorAlert" style="display: <?php echo (isset($_SESSION["error"])?'':'none');?>" >
    <strong>Oops!</strong> <div id="errorMessage"><?php echo (isset($_SESSION["error"])?$_SESSION["error"]:'');?></div>
  </div>
   <?php if(isset($_SESSION["error"])){
  	unset($_SESSION["error"]);
  	?>
  <script>
  setTimeout(function(){$('#errorAlert').fadeOut("slow");},5000);
  </script>
  <?php }?>
    