function getResponse(url)
{
	if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
	else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	
	xmlhttp.open("GET",url,false);
	xmlhttp.send();
	
	return xmlhttp.responseText;
	
}

function registerVisitor()
{
	 var text = getResponse("http://api.hostip.info/get_html.php");
	 var hostipInfo =text.split("\n");
	 var ip ='default';
	var url = "view/visitor/visitorRegistrar.php?";
	for (i=0; 3 > i; i++) {
	    var valus = hostipInfo[i].split(":");
	    url +=valus[0]+"="+valus[1]+"&";
	    
	    if(valus[0]=="IP"){
	    	ip = valus[1];
	    }
	}
	getResponse(url);
	//alert(ip);
	return ip;
}
