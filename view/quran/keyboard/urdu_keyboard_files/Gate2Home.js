
var pathname = document.location.pathname.split('/');

var Gate2Home = {
    language: pathname[1].split("-")[2],
    section:  pathname[2],
    lay:  document.location.hash.split("#")[1],
    };


function checkandsend()
{
    $(".mail-status").html("Sending...").fadeIn().fadeOut(3000);
    mail_regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
    spaces_regex = /^\s+|\s+$/g
    mails_regex = /^([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4},)*([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}){1}$/i
    //lots_of_mail_regex = 
    var from = $("#mail_from").val().replace(spaces_regex,"").replace(/(\r\n|\n|\r)/gm,"").replace(";",",");
    $("#mail_from").val(from);
    var contact = Gate2Home.section == "Contact";

    
    var textbox1 = $("#textbox1").val();
    var subject = $("#mail_subject").val();
    
    if(!from.match(mail_regex)) {
          alert('Please check your e-mail address in the "From" field')
          return;
    }

    if(!contact) {
        var to = $("#mail_to").val().replace(spaces_regex,"").replace(/(\r\n|\n|\r)/gm,"").replace(";",",");
        $("#mail_to").val(to);
        if(!to || !to.match(mails_regex)){
            alert('Please Specify at least one valid recipient in the "To" field');
            return;
        }
        if(!subject && !confirm('Send this message without a subject?')) return;
    }

    if(!textbox1 && !confirm('Send this message without text in the body?')) return;

    $.post("/services/email",$("#feedbackform").serialize(), function(text){
            $(".mail-status").hide().html(text).fadeIn().fadeOut(3000);

    }, 'text');
}

function translateit(langSource)
{
    var text = $("#textbox1").val();
    var langDest = $("#translateLangDest").val();
    var data = 
    {
        'source': langSource,
        'target': langDest,
        'text': text
    };
    
    $(".translate-button").attr('disabled','disabled');
    
    var funcCallback = function(res) {
        $("#translationResultTextarea").val(res['translatedText']);
        
        $("#translationResultTextarea").slideDown(function(){
             $("textarea").autoResize();
             $(".translate-button").removeAttr('disabled');
        });
    }; 
	
    $.get(
      "/services/translate",
      data, 
      funcCallback,
      'json'
    )
    .fail(function() { alert("Sorry, Can't translate right now. try again later."); });	
}

function gorealwiki(lann)
{
window.open("http://" + lann + ".wikipedia.org/wiki/"+$(".defaultvkinput").val(),"_blank");
}

                   
var storage = {
    init: function() {
        this.retrieve();
        setInterval(this.saveall, 5000);
    },
    saveall: function() {
        $("textarea").each(function(){  
            if ($(this).attr("id") != null) {
                $.jStorage.set($(this).attr("id"), $(this).val().replace("|",""), {
                  TTL: 10800000 // 3 hours
                });
            }
        });
    },
    retrieve: function(){  
         $("textarea").each(function(){
               key = $(this).attr("id");
               if(!key) return;
               value = $.jStorage.get(key);
               if(value!="") $(this).val(value);
         });
      }
}

//detach keyboard from inputs that are pre-disables (such as email fields)
Gate2Home.init = function() {

    $(".vkinput").on("focus",function(){
         if($("#keycheck").is(':checked') && !$(this).hasClass("vkdisable")) {
             VirtualKeyboard.attachInput($(this).get(0));
         }
         else {
             VirtualKeyboard.detachInput($(this).get(0));
         }
  });  
                              
  storage.init();

  //zclip
  $(function(){
     if(isApple) {
        $('#cp-button').hide();
        $('#clear-button').show().click(function(){ $("#textbox1").val("");})
      }
      else {
        $('#cp-button').show();
      }
   })


//layout selector below keyboard
$("#kb_langselector").live("hover",function(){
    try {
                            var langgroup = Gate2Home.lay.split(" ")[0];
                           
                           if(langgroup=="IQ") VirtualKeyboard.setVisibleLayoutCodes(["SA","IQ"]);//more arabic
                            else VirtualKeyboard.setVisibleLayoutCodes([langgroup]);
                                VirtualKeyboard.switchLayout(Gate2Home.lay); 
                        } catch(err) {

                        }
    $("#kb_langselector").hide();  
    setTimeout(function(){$("#kb_langselector").show(); 
                        },100);
    $("#kb_langselector").die();
});


//if($.browser.mozilla) {
//       $(".vkinput").live("keypress",function(){
//                 if(beenhere == 1) $(this).focus();
//        });  
//}
//else {
       
//}

 //VirtualKeyboard.attachInput($(".defaultvkinput").get(0));
  
      // if($.browser.mozilla) {
      //     $(".continue").css("top","8px");
      // }
  
            // on/off button
   $(".keyboardCheck").show();
   $("#keycheck").change(function(){
        if($(this).is(':checked')) {
            if($(".vkinput").attr("data-readonly") == "true") {
              $(".vkinput").attr("readonly","readonly");
              caretShow = true;
            }
            $(this).parents("label").removeClass("off").addClass("on").children(".labeltext").html("ON");
            if(!VirtualKeyboard.getAttachedInput()) {
                VirtualKeyboard.attachInput($(".defaultvkinput").get(0));
            }
            $(".vkdisable").removeClass("vkdisable");
            $("#keyboard").removeClass("disabled");
        }
        else {
             $(this).parents("label").removeClass("on").addClass("off").children(".labeltext").html("OFF");
              $("#keyboard").addClass("disabled");
              if($(".vkinput").attr("readonly") != undefined ) {
                  $(".vkinput").attr("data-readonly","true").removeAttr("readonly");
                  caretShow = false;
              }
        }
   });
   

     
}

//google search button
$("button.submitbutton").live("click",function(){
        storage.saveall();
         $(this).parents("form").submit();
});
