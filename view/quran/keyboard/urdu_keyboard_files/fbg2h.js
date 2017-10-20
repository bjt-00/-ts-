  
function postToTwitter() {
	_gaq.push(['_trackEvent', 'Twitter', 'tweet clicked',  Gate2Home.language]);
	window.open("http://twitter.com/share?url="+escape(document.URL)+"&via=Gate2HomeCom&text="+$('#textbox1').val(),"twitterwindow",'height=350,width=500');
}
  
function onceLoader(src_name,src_path,before_func,after_func){
	if(!this.calledArray) this.calledArray = [];
	if(!this.calledArray[src_name]) {
				if(before_func) before_func();
				head.js({src_name : src_path},function(){
					if(after_func) after_func();
				});
				this.calledArray[src_name] = true;
	}
};


function randomDelay(func, max) {
	clearTimeout(func.timeout);
	return function() {
		func.timeout = setTimeout(func,Math.floor(max*Math.random()*1000));
	}
}


var zclipDelar = {
	init: function() {		 
		$("#textbox1").one("click keypress",randomDelay(this.loader,10));
		$(".kbButton").one("click",randomDelay(this.loader,10));
		$("#cp-button").one("click hover",this.loader);
	},
	loader: function() {
	  	 onceLoader("zclip", path['zclip'],false,function(){
	  	 		$('#cp-button').show().zclip({
	                path: path['zclipswf'],
	                copy: function() {
	                    return $('#textbox1').val();
	                }
              	});
	  	 	});
	}
}

var autoResizeDealer = {
	init: function() {		 
		$("textarea").one("click keypress",randomDelay(this.loader,20));
		$(".kbButton").one("click",randomDelay(this.loader,20));

	},
	loader: function() {
	  	 onceLoader("autoresize" ,path['autoresize'],false,function(){
	  	 		$("textarea").autoResize();
	  	 	});
	}
}

var AddthisDealer = {
	init: function() {		 
		$("#textbox1").one("click keypress",randomDelay(this.loader,10));
		$(".kbButton").one("click",randomDelay(this.loader,10));
		$(".addthis_button_expanded").one("click hover",this.loader);
	},
	loader: function() {
	  	 onceLoader("addthis", "http://s7.addthis.com/js/250/addthis_widget.js#username=ilanbm");
	}
}

var FBdealer = {
		init: function() {
		$("#textbox1").one("click keypress",randomDelay(this.loader,10));
		$(".kbButton").one("click",randomDelay(this.loader,10));
		$(".fb-button").one("hover",this.loader);
		},
		loader: function() {
		  		onceLoader('fball',"//connect.facebook.net/en_US/all.js#xfbml=1&appId=135016923220292",function(){
		  			$("body").prepend("<div id='fb-root'></div>");
		  		});
	},
	publishStatus: function() {
			   var publish = {
								method: 'stream.publish',
								message: document.getElementById('textbox1').value,
								user_prompt_message: 'Update your Facebook status'
							};
				_gaq.push(['_trackEvent', 'Facebook', '3. Calling UI Publish', Gate2Home.language]);
				FB.api(publish, function(response) {
					 if (response && !response.error_msg) {
					   //Post was published.
					   _gaq.push(['_trackEvent', 'Facebook', '3A. Post Published', Gate2Home.language]);
			                   alert("Post published to Facebook!");
					 } else {
					 	_gaq.push(['_trackEvent', 'Facebook', '3B. Post wasn\'t Published', Gate2Home.language]);
			                        alert("Error occurred, Post was not published to Facebook!");
					   //Post was not published.
					 }
				   });		
	},
	postClicked: function() {
			this.loader();
			var $this = this;
		    FB.init({appId: '135016923220292', status: true, cookie: true,   oauth: true,  xfbml: true});	 
			_gaq.push(['_trackEvent', 'Facebook', '2B. FB.login', Gate2Home.language]);
					// no user session available, someone you dont know
					FB.login(function(response) {
						  if (response.authResponse) {
							_gaq.push(['_trackEvent', 'Facebook', '2B1. FB.login Success', Gate2Home.language]);
							// user successfully logged in
							$this.publishStatus();		
						  } else {
							_gaq.push(['_trackEvent', 'Facebook', '2B1. FB.login cancelled', Gate2Home.language]);
							// user cancelled login
						  }
						},  {scope: "publish_stream"});
	}
}

FBdealer.init();
AddthisDealer.init();
autoResizeDealer.init();
if(!isApple) zclipDelar.init();

$(document).scroll(function() {
	if($(document).scrollTop() > 130 ) {
		AddthisDealer.loader();
		FBdealer.loader();
	}
});
