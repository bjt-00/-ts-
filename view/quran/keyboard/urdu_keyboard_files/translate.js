head.ready("jquery", function() {
    $("#translate-select-div").append("<select id='translateLangDest'><option value='en' selected>English</option></select>");
    $("#translateLangDest").one("hover",function() {
            var self = this;
            $.each(target_lang, function(index,lang_obj) {
                if (lang_obj[0] != "en"){
                    $(self).append("<option value='"+lang_obj[0]+"'>"+lang_obj[1]+"</option>")
                }
            });
    }); 
});
