<?php include"imports.php" ;?>
<?php if(!isset($_GET['action']) ||$_GET['action']=='' ){ ?>
<script>window.location=window.location+'?action=quran';</script>
<?php 
} 
?>
<div id='HeaderDiv' class="Header">
<?php include('view/quran/quranButtonsBar.php');?>
</div>