$(document).ready(function(){
	$("#pageLoading").show();
	//alert("test");
	$(".minimize").fadeIn();
	$(".maximize").fadeOut();
	$( ".QuranPanelDiv" ).slideDown(2000);
	
	$(".minimize").click(function(){
		minimize();
	});

	$(".maximize").click(function(){
		$(this).hide();
		$( ".ButtonsBar" ).slideDown(2000);
		$(".InfoBar").slideDown(2000);
		$(".Footer").slideDown(2000);
		$(".minimize").fadeIn("slow");
	});

	$(".NormalWord").click(function(){
		$("#searchText").val($(this).text());
	});
	$(".ErrorWord").click(function(){
		$("#searchText").val($(this).text());
	});
	
	//Icons
	$(".Icon").hover(function(){
		$(this).attr("src" , 'themes/default/images/icons/'+$(this).attr("id")+'_rollover.png');
	});
	
	$(".Icon").mouseout(function(){
		$(this).attr("src" , 'themes/default/images/icons/'+$(this).attr("id")+'_selected.png');
	})
	$("#pageLoading").hide();
});

function showPopUp(popupHeading,url){
	showLoading();
	
	$("#popupHeading").text(popupHeading);
	$("#popupContents").html("<div id='loadingDiv' class=\"Label\" style=\"margin:auto;text-align: center;\">L <img   src=\"themes/default/images/loading.gif\" width=\"18\" height=\"18\"> a d i n g...</div>");
	$.ajax({url: url, 
			success: function(result){
				$("#popupContents").html(result);
			}
    });
  hideLoading();
}
function showPopUp2(popupHeading,url){
	showLoading();
	document.getElementById("popupHeading2").innerHTML = popupHeading;
    var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById("popupContents2").innerHTML = this.responseText;
    }
  }
  r.open('get', url, true);
  r.send();
  hideLoading();
}

function showDiv(divId){
document.getElementById(divId).style.display = 'block';
document.getElementById('blockerUpDiv').style.display = 'block';
}
function hideDiv(divId){
document.getElementById(divId).style.display = 'none';
document.getElementById('blockerUpDiv').style.display = 'none';
}
function out(buttonId){
	document.getElementById(buttonId).src = 'themes/default/images/icons/'+buttonId+'_selected.png';
	}
function hover(buttonId){
	document.getElementById(buttonId).src = 'themes/default/images/icons/'+buttonId+'_rollover.png';
	}
function selected(buttonId,imageId){
	document.getElementById(buttonId).src = 'themes/default/images/icons/'+imageId+'_selected.png';
	}
function rollover(buttonId,imageId){
	document.getElementById(buttonId).src = 'themes/default/images/icons/'+imageId+'_rollover.png';
	}

function nxt(nextIndex,isPara,translation){
	nextIndex = nextIndex+1;
	var url=window.location;
	if(isPara=="PARA_TBL"){
	nextIndex = (nextIndex==31?1:nextIndex);
	url='index.php?action=quran&paraNo='+nextIndex+'&translation='+translation;
	}else{
		nextIndex = (nextIndex==115?1:nextIndex);
		url='index.php?action=quran&suraNo='+nextIndex+'&translation='+translation;
	}
	goToURL(url,'contents');
}
function back(nextIndex,isPara,translation){
	nextIndex = nextIndex-1;
	var url=window.location;
	if(isPara=="PARA_TBL"){
	nextIndex = (nextIndex==0?30:nextIndex);
	url='index.php?action=quran&paraNo='+nextIndex+'&translation='+translation;
	}else{
		nextIndex = (nextIndex==0?114:nextIndex);
		url='index.php?action=quran&suraNo='+nextIndex+'&translation='+translation;
	}
	goToURL(url,'contents');
}
/*function changeLanguage(nextIndex,isPara,translation){
	var url=window.location;
	url='index.php?action=quran&paraNo='+nextIndex+'&translation='+translation;
	goToURL(url,'contents');
}
*/
/*function increaseFontSize(){
	var fontSize = document.getElementById('quranTable').style.fontSize;
	fontSize = fontSize.replace('px','');
	fontSize = (fontSize<18?18:fontSize);
	fontSize++;
	fontSize = (fontSize++>102?102:fontSize);
	document.getElementById('quranTable').style.fontSize = fontSize+'px';
}
function decreaseFontSize(){
	var fontSize = document.getElementById('quranTable').style.fontSize;
	fontSize = fontSize.replace('px','');
	fontSize = fontSize-2;
	fontSize = (fontSize<18?18:fontSize);
	document.getElementById('quranTable').style.fontSize = fontSize+'px';
}
*//*Settings getter/setters*/
function updateVerse(currentRowIndex,verseId){
	/*
	var url='';
	var currentColor = document.getElementById('verseRowNo'+verseId).style.color;
	if(currentColor=='green'){
	document.getElementById(currentRowIndex).src = 'themes/default/images/icons/0.png';
	try{
	document.getElementById('verseRowNo'+verseId).style.color=document.getElementById('verseRowNo'+(verseId+1)).style.color;
	}catch(err){
		document.getElementById('verseRowNo'+verseId).style.color=document.getElementById('verseRowNo'+(verseId-1)).style.color;
	}
	url='index.php?action=quran&isPart=0&verseId='+verseId;
	}else{
		document.getElementById(currentRowIndex).src = 'themes/default/images/icons/1.png';
		document.getElementById('verseRowNo'+verseId).style.color='green';
		url='index.php?action=quran&isPart=1&verseId='+verseId;
	}
	getResponse(url);
	*/
}

function markForFutureReading(currentRowIndex,verseId,verseColor){
	$('#successAlert').show();
	
	$('#successMessage').text('bookmark request received');
	var targetUrl='index.php?action=quran&bookmark=0&verseId='+verseId;
	var currentColor = document.getElementById('verseRowNo'+verseId).style.color;

	if(currentColor=='green'){
		$('#successMessage').text('removing error');
		document.getElementById('verseNo'+verseId).style.color='#e1e1e1';
		document.getElementById('verseRowNo'+verseId).style.color=verseColor;
	}else{
		$('#successMessage').text('setting error');
		targetUrl='index.php?action=quran&bookmark=1&verseId='+verseId;
		document.getElementById('verseRowNo'+verseId).style.color='green';
		document.getElementById('verseNo'+verseId).style.color='green';
	}
	$.ajax({
	    url : targetUrl,
	    success : function(responseText) {  //$('#etlLog').text(responseText);
	    	$('#successMessage').text(targetUrl+' '+currentColor);
	    	$('#successMessage').text('done');
	    }
	});//ajax end
	setTimeout(function(){$('#successAlert').hide();},3000);
}
function showActiveVerse(text){
	showVerse('#verseAlert',text)
}
var isMinimized=false;
function showVerse(alertId,text){
	$(alertId).slideDown(2000);
	$("#verseText").text(text);
	//to minimize it first time only
	if(!isMinimized){
		minimize();
		isMinimized=true;
	}
}
function minimize(){
	$(".minimize").hide();
	$( ".ButtonsBar" ).slideUp(2000);
	$(".InfoBar").slideUp(2000);
	$(".Footer").slideUp(2000);
	$(".maximize").fadeIn("slow");
}
function successAlert(message){
	alert('#successAlert',message)
}
function infoAlert(message){
	alert('#infoAlert',message)
}
function warningAlert(message){
	alert('#warningAlert',message)
}
function errorAlert(message){
	alert('#errorAlert',message)
}

function alert(alertId,message){
	$(alertId).slideDown(2000);
	$(alertId).text(message);
	setTimeout(function(){$(alertId).slideUp(2000);},3000);
}
function errorMark(isError,errorWordId,verseId,errorWordIndex,verseColor){
	var targetUrl='index.php?markError='+isError+'&verseId='+verseId+'&errorWordIndex='+errorWordIndex;


	if(isError=='0'){
		//infoAlert('Removing Error');
		$(errorWordId).removeClass("ErrorWord");
		$(errorWordId).addClass("NormalWord");
		$("#errorWord-"+verseId+"-"+errorWordIndex).attr("href","javascript:errorMark(1,'"+errorWordId+"',"+verseId+","+errorWordIndex+",'"+verseColor+"')");
		$("#errorWord-"+verseId+"-"+errorWordIndex).attr("title","Add Errormark");
		$("#errorWord-"+verseId+"-"+errorWordIndex).css("color","#e1e1e1");
	}else{
		//successAlert('Setting Error');
		$(errorWordId).removeClass("NormalWord");
		$(errorWordId).addClass("ErrorWord");
		$("#errorWord-"+verseId+"-"+errorWordIndex).attr("href","javascript:errorMark(0,'"+errorWordId+"',"+verseId+","+errorWordIndex+",'"+verseColor+"')");
		$("#errorWord-"+verseId+"-"+errorWordIndex).attr("title","Remove Errormark");
		$("#errorWord-"+verseId+"-"+errorWordIndex).css("color","red");

	}
	successAlert("Error "+(isError=='0'?'Removed':'Marked')+' Successfully');
	$.ajax({
	    url : targetUrl,
	    success : function(responseText) {  //$('#etlLog').text(responseText);
	    	//successAlert("Error "+(isError=='0'?'Removed':'Marked')+' Successfully');
	    }
	});//ajax end
	
}

/*function applyChanges(totalAyaats){
	//view Settings
	if(isArabicOnly()){
		hideRows(totalAyaats,'translationRowNo');
		showRows(totalAyaats,'verseRowNo');	
	}
	if(isTranslationOnly()){
		hideRows(totalAyaats,'verseRowNo');
		showRows(totalAyaats,'translationRowNo');
	}
	if(isBoth()){
		showRows(totalAyaats,'verseRowNo');
		showRows(totalAyaats,'translationRowNo');
	}
	
	applyColorChanges(totalAyaats);
}
function applyColorChanges(totalAyaats){
	for(var i=1;i<=totalAyaats;i++){
	//update view color
	document.getElementById('translationRowNo'+i).style.color = document.getElementById('translationColor').value;
	document.getElementById('verseRowNo'+i).style.color = document.getElementById('verseColor').value;
	}
}

function hideRows(totalAyaats,id){
	var translationRowNo=1;
	var currentStyle = document.getElementById(id+translationRowNo).style.display;
	for(var i=1;i<=totalAyaats;i++){
		translationRowNo = id+i;
	document.getElementById(translationRowNo).style.display = 'none';
	}
}
function showRows(totalAyaats,id){
	var rowNo=0;
	for(var i=1;i<=totalAyaats;i++){
		rowNo = id+i;
	document.getElementById(rowNo).style.display = '';
	}
}

function  isTranslationOnly(){
	var showTextOptions = document.getElementById('showTextOptions').value;
	
	if(showTextOptions=="showTranslationOnly"){
		return true;
	}else{
		return false;
	}
}
function  isArabicOnly(){
	var showTextOptions = document.getElementById('showTextOptions').value;
	
	if(showTextOptions=="showArabicOnly"){
		return true;
	}else{
		return false;
	}
}
function  isBoth(){
	var showTextOptions = document.getElementById('showTextOptions').value;
	
	if(showTextOptions=="showBoth"){
		return true;
	}else{
		return false;
	}
}

*///Mouse event
//document.onmousedown = mouseDown; 

/*function mouseDown(e) {
    if (e.which==3) {//righClick
    	showDiv('quranPopupDiv');
    }else if(e.which==1){
    	hideDiv('quranPopupDiv');
    }
    //var e = window.event;

    var posX = e.clientX;
    var posY = e.clientY;
   // document.getElementById('quranPopupDiv').style.top=posX+'px';
   // document.getElementById('quranPopupDiv').style.left=posY+'px';
}
//don't show browser right click popup
//document.oncontextmenu=RightMouseDown;
function RightMouseDown() { 
	return false;
	}
*/
function getResponse(url)
{
	if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
	else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	
	xmlhttp.open("GET",url,false);
	xmlhttp.send();
	
	return xmlhttp.responseText;
	
}
function showLoading(){
	$("#loadingDiv").show();
	//document.getElementById('loadingDiv').style.display = 'block';
}

function hideLoading(){
	$("#loadingDiv").hide();
	//document.getElementById('loadingDiv').style.display = 'none';
}
function goToURL(url,divId)
{
	document.getElementById('loadingDiv').style.display = 'block';
	document.getElementById(divId).innerHTML=getResponse(url);
	document.getElementById('loadingDiv').style.display = 'none';
	
}
function signOut(){
	url='index.php?action=quran&signOut=y';
getResponse(url);
window.location=window.location;
}

function validateSignInForm(){
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var isValid=true;
	if(email==''){
		document.getElementById('message').innerHTML='Email is required';
		isValid=false;
	}else{
			if(email.indexOf('@')<0 || email.indexOf('.')<0 || (email.indexOf('@')>email.indexOf('.'))){
				document.getElementById('message').innerHTML='Invalid Email';
				isValid=false;
			}
	}

	if(isValid && password==''){
		document.getElementById('message').innerHTML='Password is required';
		isValid=false;
	}
	return isValid;
}
function signIn(){
	if(validateSignInForm()){
		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;

		var url='index.php?action=quran&signIn=y&email='+email+'&password='+password;
		document.getElementById('message').innerHTML = getResponse(url);
	//window.location=window.location;
	}
}

function validateSignUpForm(){
	var email = document.getElementById('signUpEmail').value;
	var password = document.getElementById('signUpPassword').value;
	var reTypePassword = document.getElementById('reTypePassword').value;
	var isValid=true;
	if(email==''){
		document.getElementById('signUpMessage').innerHTML='Email is required';
		isValid=false;
	}else{
			if(email.indexOf('@')<0 || email.indexOf('.')<0 || (email.indexOf('@')>email.indexOf('.'))){
				document.getElementById('signUpMessage').innerHTML='Invalid Email';
				isValid=false;
			}
	}

	if(isValid && password==''){
		document.getElementById('signUpMessage').innerHTML='Password is required';
		isValid=false;
	}
	if(isValid && reTypePassword==''){
		document.getElementById('signUpMessage').innerHTML='Please re-type password';
		isValid=false;
	}
	if(isValid && password!=reTypePassword){
		document.getElementById('signUpMessage').innerHTML='Password mismatched re-type password again';
		isValid=false;
	}

	return isValid;
}


function languageTranslator(){
	//get current selected language
	var language = document.getElementById('searchFrom').value;
	var text = document.getElementById('searchText').value;
	//urdu
	if(language.indexOf("urdu") != -1){
		document.getElementById('searchText').style.textAlign='right';
			var urdu =['ا','آ','ب','ب','ث','چ','د','ڈ','ع','ع','ف','ف','گ','غ','ہ','ح','ی','ئ','ج','ژ','ک','خ','ل','ل','م','م','ن','ں','و','ؤ','پ','پ','ق','ق','ر','ڑ','س','ش','ت','ٹ','ي','ﺀ','','','ه','ھ','','','ے','ۓ','ذ','ز'];
			var english =['a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K','l','L','m','M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','w','W','x','X','y','Y','z','Z'];
			text = translateNow(english,urdu,text);
	}
	document.getElementById('searchText').value=text;
}

function translateNow(fromLanguage,toLanguage,text){
	var i=0;
	var loc=toLanguage.length;
	for(var i=0;i<fromLanguage.length;i++){
		text = text.replace(fromLanguage[i],toLanguage[i]);
	}
	return text;
}