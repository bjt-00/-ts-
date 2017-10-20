<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<script type="text/javascript" src="galleries/script/jquery.min.js"></script>

<style type="text/css">

/*Make sure your page contains a valid doctype at the top*/
#simplegallery1{ //CSS for Simple Gallery Example 1
position: relative; /*keep this intact*/
visibility: hidden; /*keep this intact*/
border: 2px solid #e1e1e1;
border-left-style-ltr-source: physical;
border-left-style-rtl-source: physical;
}

#simplegallery1 .gallerydesctext{ //CSS for description DIV of Example 1 (if defined)
text-align: left;
padding: 2px;
}

</style>

<script type="text/javascript" src="galleries/script/simplegallery.js">

/***********************************************
* Simple Controls Gallery- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<script type="text/javascript">
var simpleGallery_navpanel={
		loadinggif: 'galleries/images/ajaxload.gif', //full path or URL to loading gif image
		panel: {height:'45px', opacity:0.5, paddingTop:'5px', fontStyle:'bold 11px Verdana'}, //customize nav panel container
		images: [ 'galleries/images/left.gif', 'galleries/images/play.gif', 'galleries/images/right.gif', 'galleries/images/pause.gif'], //nav panel images (in that order)
		imageSpacing: {offsetTop:[-4, 0, -4], spacing:10}, //top offset of left, play, and right images, PLUS spacing between the 3 images
		slideduration: 500 //duration of slide up animation to reveal panel
	}
<?php $galleryPath = ($_GET['action']!=null? $_GET['action']:'home');
 ?>


var mygallery=new simpleGallery({
	wrapperid: "simplegallery1", //ID of main gallery container,
	dimensions: [1000, 200], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
	imagearray: [
		["galleries/<?php printf($galleryPath);?>/1.png", "http://www.bitguiders.com", "", "Email Your requirements"],
		["galleries/<?php printf($galleryPath);?>/2.png", "http://www.bitguiders.com", "", "Aggrement of your requirements"],
		["galleries/<?php printf($galleryPath);?>/3.png", "http://www.bitguiders.com", "", "Get your software solution"]
	],
	autoplay: [true, 2500, 2], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){ //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})

</script>
