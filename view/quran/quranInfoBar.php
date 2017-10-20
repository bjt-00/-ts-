<div class="row InfoBar">
    <div class="col-lg-4" style='text-align:left;padding-left:10px;'>
    		<span class="glyphicon glyphicon-star-empty" style="color:green" title="Bookmark"></span>
    		<span class="glyphicon glyphicon-star" style="color:red" title="Errormark"></span>
			<a href="#" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Release Notes','view/release.php')" title="Release Notes">
         		 <span class="glyphicon glyphicon-list"></span>
       		 </a>
       </div>
    <div class="col-lg-4" style='text-align:center;'>
      <?php echo ($searchQuery!=''?($totalResultCount>0?'Total '.$totalResultCount.' Match Found for <b>'.$_GET['searchText']:" </b><span style='color:red'>No Match Found for <b> ".$_GET['searchText']." </b></span>"):'');?>
   </div>
    <div class="col-lg-4" style='padding-right:10px;text-align:right;'>
			<span title="Ruqu"> ع </span> &nbsp;
			| <a title="Part-I" href="#  أربع  ">  أربع  </a>  &nbsp;
			| <a title="Part-II" href="# النصف ">النصف</a> &nbsp;
			| <a title="Part-III" href="# الثلاثة "> الثلاثة</a> &nbsp;
       </div>
</div>