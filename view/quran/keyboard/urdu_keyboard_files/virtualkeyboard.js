﻿;

var VirtualKeyboard=new function(){
    var I=this;
    I.$VERSION$="3.7.0.760";
    var l=vkbase; //findPath('vk_loader.js');
    var o= /\x03/;
    var O={
        'layout':null,
        'skin':'winxp'
    };
    
    var Q='kb_b';
    var _=true;
    var c=true;
    var C={
        14:'backspace',
        15:'tab',
        28:'enter',
        29:'caps',
        41:'shift_left',
        52:'shift_right',
        53:'del',
        54:'ctrl_left',
        55:'alt_left',
        56:'space',
        57:'alt_right',
        58:'ctrl_right'
    };
    
    var v={
        'SHIFT':'shift',
        'ALT':'alt',
        'CTRL':'ctrl',
        'CAPS':'caps'
    };
    
    var V;
    var x={
        'QWERTY Standard':"À1234567890m=ÜQWERTYUIOPÛÝASDFGHJKL;ÞZXCVBNM¼¾¿",
        'QWERTY Canadian':"Þ1234567890m=ÜQWERTYUIOPÛÝASDFGHJKL;ÀZXCVBNM¼¾¿",
        'QWERTY Dutch':"Þ1234567890Û¿ÜQWERTYUIOPÝ;ASDFGHJKL=ÀZXCVBNM¼¾m",
        'QWERTY Estonian':"¿1234567890m=ÜQWERTYUIOPÞÛASDFGHJKL;ÀZXCVBNM¼¾Ý",
        'QWERTY Greek (220)':"À1234567890¿ÛÜQWERTYUIOP=ÝASDFGHJKL;ÞZXCVBNM¼¾m",
        'QWERTY Greek (319)':"À1234567890¿=ÜQWERTYUIOPÛÝASDFGHJKL;ÞZXCVBNM¼¾m",
        'QWERTY Gujarati':"À1234567890m=XQWERTYUIOPÛÝASDFGHJKL;ÜZXCVBNM¼¾¿",
        'QWERTY Italian':"Ü1234567890ÛÝ¿QWERTYUIOP;=ASDFGHJKLÀÞZXCVBNM¼¾m",
        'QWERTY Kannada':"À1234567890m=ZQWERTYUIOPÛÝASDFGHJKL;ÞZXCVBNM¼¾¿",
        'QWERTY Portuguese':"À1234567890ÛÝ¿QWERTYUIOP=;ASDFGHJKLÞÜZXCVBNM¼¾m",
        'QWERTY Scandinavian':"Ü1234567890=Û¿QWERTYUIOPÝ;ASDFGHJKLÀÞZXCVBNM¼¾m",
        'QWERTY Spanish':"Ü1234567890mÛ¿QWERTYUIOPÝ;ASDFGHJKLÀÞZXCVBNM¼¾ß",
        'QWERTY Tamil':"À1234567890m =ZQWERTYUIOPÛÝASDFGHJKL;ÞCVBNM¼¾ ¿",
        'QWERTY Turkish':"À1234567890ßm¼QWERTYUIOPÛÝASDFGHJKL;ÞZXCVBNM¿Ü¾",
        'QWERTY UK':"ß1234567890m=ÞQWERTYUIOPÛÝASDFGHJKL;ÀZXCVBNM¼¾¿",
        'QWERTZ Albanian':"À1234567890m=ÜQWERTZUIOPÛÝASDFGHJKL;ÞYXCVBNM¼¾¿",
        'QWERTZ Bosnian':"À1234567890¿=ÜQWERTZUIOPÛÝASDFGHJKL;ÞYXCVBNM¼¾m",
        'QWERTZ Czech':"À1234567890=¿ÜQWERTZUIOPÛÝASDFGHJKL;ÞYXCVBNM¼¾m",
        'QWERTZ German':"Ü1234567890ÛÝ¿QWERTZUIOP;=ASDFGHJKLÀÞYXCVBNM¼¾m",
        'QWERTZ Hungarian':"0123456789À¿=ÜQWERTZUIOPÛÝASDFGHJKL;ÞYXCVBNM¼¾m",
        'QWERTZ Slovak':"À1234567890¿ßÜQWERTZUIOPÛÝASDFGHJKL;ÞYXCVBNM¼¾m",
        'QWERTZ Swiss':"Ü1234567890ÛÝßQWERTZUIOP;ÞASDFGHJKLÀ¿YXCVBNM¼¾m",
        'AZERTY Belgian':"Þ1234567890ÛmÜAZERTYUIOPÝ;QSDFGHJKLMÀWXCVBN¼¾¿=",
        'AZERTY French':"Þ1234567890Û=ÜAZERTYUIOPÝ;QSDFGHJKLMÀWXCVBN¼¾¿ß",
        ',WERTY Bulgarian':"À1234567890m¾Ü¼WERTYUIOPÛÝASDFGHJKL;ÞZXCVBNMßQ¿",
        'QGJRMV Latvian':"À1234567890mFÜQGJRMVNZWXYH;USILDATECÞÛBÝKPOß¼¾¿",
        '/,.PYF UK-Dvorak':"m1234567890ÛÝÜÀ¼¾PYFGCRL¿=AOEUIDHTNSÞ;QJKXBMWVZ",
        'FG;IOD Turkish F':"À1234567890=mXFG;IODRNHPQWUÛEAÝTKMLYÞJÜVC¿ZSB¾¼",
        ';QBYUR US-Dvorak':"7ÛÝ¿PFMLJ4321Ü;QBYURSO¾65=mKCDTHEAZ8ÞÀXGVWNI¼09",
        '56Q.OR US-Dvorak':"m1234JLMFP¿ÛÝÜ56Q¾ORSUYB;=78ZAEHTDCKÞ90X¼INWVGÀ"
    };
    
    var X=0,z=0,Z=1,w=2,W=4,s=8,S=W|s,k=W|Z,K=w|s,q=w|W,E=w|W|s,r=w|Z,R=Z|w|W,t=Z|s,T=Z|w|W|s;
    var y={
        'buttonUp':'kbButton',
        'buttonDown':'kbButtonDown',
        'buttonHover':'kbButtonHover',
        'hoverShift':'hoverShift',
        'hoverAlt':'hoverAlt',
        'modeAlt':'modeAlt',
        'modeAltCaps':'modeAltCaps',
        'modeCaps':'modeCaps',
        'modeNormal':'modeNormal',
        'modeShift':'modeShift',
        'modeShiftAlt':'modeShiftAlt',
        'modeShiftAltCaps':'modeShiftAltCaps',
        'modeShiftCaps':'modeShiftCaps',
        'charNormal':'charNormal',
        'charShift':'charShift',
        'charAlt':'charAlt',
        'charShiftAlt':'charShiftAlt',
        'charCaps':'charCaps',
        'charShiftCaps':'charShiftCaps',
        'hiddenAlt':'hiddenAlt',
        'hiddenCaps':'hiddenCaps',
        'hiddenShift':'hiddenShift',
        'hiddenShiftCaps':'hiddenShiftCaps',
        'deadkey':'deadKey',
        'noanim':'VK_no_animate'
    };
    
    var Y=null;
    var u=[];
    u.hash={};
    
    u.codes={};
    
    u.codeFilter=null;
    u.options=null;
    var U={
        keyboard:null,
        desk:null,
        progressbar:null,
        langbox:null,
        attachedInput:null
    };
    
    var p=null;
    I.addLayoutList=function(){
        for(var i=0,ii=arguments.length;i<ii;i++){
            try{
                I.addLayout(arguments[i]);
            }catch(e){}
        }
        };
    
I.addLayout=function(i){
    var e=i.code.entityDecode().split("-"),ii=i.name.entityDecode(),iI=j(i.normal);
    if(!isArray(iI)||47!=iI.length)throw new Error('VirtualKeyboard requires \'keys\' property to be an array with 47 items, '+iI.length+' detected. Layout code: '+e+', layout name: '+ii);
    i.code=(e[1]||e[0]);
    i.name=ii;
    i.normal=iI;
    i.domain=e[0];
    i.id=i.code+" "+i.name;
    if(u.hash.hasOwnProperty(i.id)){
        var il=u.hash[i.id];
        for(var io in i){
            il[io]=i[io]
            }
        }else{
    var e;
    if(!u.codes.hasOwnProperty(i.code)){
        e={
            'name':i.code,
            'layout':[]
        };
        
        u.codes[i.code]=e
        }else{
        e=u.codes[i.code]
        }
        u.push(i);
    e.layout.push(i);
    u.hash[i.id]=i;
    if(!u.codes.hasOwnProperty(i.code))u.codes[i.code]=i.code;
    i.toString=function(){
        return this.id
        };
        
    u.options=null
    }
};

I.switchLayout=function(i){
    var e=c&&(!Y||i!=Y.toString());
    if(e){
        H();
        if(!i){
            i=U.langbox.value
            }
            if(!u.options.hasOwnProperty(i))return false;
        g(10);
        I.IME.hide();
        U.langbox.options[u.options[i]].selected=true;
        Y=u.hash[i];
        e=!!Y;
        if(e){
            if(Y.requires){
                var ii=Y.requires.map(function(iI){
                    return l+"layouts/"+iI
                    });
                ScriptQueue.queue(ii,F);
            }else{
                F(null,true);
            }
        }else{
        F(null,false);
    }
}else{
    e=Y&&i==Y.toString();
}
return e
};

I.getLayouts=function(){
    var i=[];
    for(var e=0,ii=u.length;e<ii;e++){
        i[i.length]=[u[e].code,u[e].name]
        }
        return i.sort();
};

I.setVisibleLayoutCodes=function(){
    var i=isArray(arguments[0])?arguments[0]:arguments,e=null,ii;
    for(var iI in u.codes){
        if(u.codes.hasOwnProperty(iI)){
            ii=iI.toUpperCase();
            if(i.indexOf(ii)>-1){
                if(!e)e={};
                    
                e[ii]=ii
                }
            }
    }
    u.codeFilter=e;
u.options=null;
Y=null;
if(!I.switchLayout(U.langbox.value)){
    I.switchLayout(U.langbox.value);
}
};

I.getLayoutCodes=function(){
    var i=[];
    for(var e in u.codes){
        if(!u.codes.hasOwnProperty(e))continue;
        i.push(e);
    }
    return i.sort();
};

var P=function(i,e){
    var ii="",iI=false;
    i=i.replace(Q,"");
    switch(i){
        case v.CAPS:case v.SHIFT:case"shift_left":case"shift_right":case v.ALT:case"alt_left":case"alt_right":
            return true;
        case'backspace':
            if(isFunction(Y.charProcessor)&&DocumentSelection.getSelection(U.attachedInput).length){
            ii="\x08"
            }else if(e&&e.currentTarget==U.attachedInput){
            I.IME.hide(true);
            return true
            }else{
            DocumentSelection.deleteAtCursor(U.attachedInput,false);
            I.IME.hide(true);
        }
        break;
        case'del':
            I.IME.hide(true);
            if(e)return true;
            DocumentSelection.deleteAtCursor(U.attachedInput,true);
            break;
        case'space':
            ii=" ";
            break;
        case'tab':
            ii="\t";
            break;
        case'enter':
            ii="\n";
            break;
        default:
            ii=Y.keys[i][X];
            break
            }
            if(ii){
        if(!(ii=N(ii,DocumentSelection.getSelection(U.attachedInput))))return iI;
        var il=false;
        var io=DOM.getWindow(U.attachedInput);
        if(!ii[1]&&ii[0].length<=1&&ii[0].charCodeAt(0)<=0x7fff&&!U.attachedInput.contentDocument){
            var iO=ii[0].charCodeAt(0);
            if(isFunction(io.document.createEvent)){
                var e=null;
                try{
                    // gate2home fix for ff12 
                    if ($.browser.mozilla && $.browser.version >= 12) {
                        throw "Firefox 12 and above"
                    }
                    e=io.document.createEvent("KeyEvents");
                    e.initKeyEvent('keypress',false,true,U.attachedInput.contentWindow,false,false,false,false,0,iO);
                    e.VK_bypass=true;
                    U.attachedInput.dispatchEvent(e);
                }catch(ex){
                    try{
                  
                        e=io.document.createEvent("KeyboardEvents");
                        e.initKeyEvent('keypress',false,true,U.attachedInput.contentWindow,false,false,false,false,iO,0);
                        e.VK_bypass=true;
                        U.attachedInput.dispatchEvent(e);
                    }catch(ex){
                        il=true
                        }
                    }
            }else{
        try{
            e.keyCode=10==iO?13:iO;
            iI=true
            }catch(ex){
            il=true
            }
        }
}else{
    il=true
    }
    if(il){
    DocumentSelection.insertAtCursor(U.attachedInput,ii[0]);
    if(ii[1]){
        DocumentSelection.setRange(U.attachedInput,-ii[1],0,true);
    }
}
}
return iI
};

var a=function(i){
    if(!I.isEnabled())return;
    var e=X;
    var ii=i.getKeyCode();
    switch(i.type){
        case'keydown':
            switch(ii){
            case 9:
                break;
            case 37:
                if(I.IME.isOpen()){
                I.IME.prevPage(i);
                i.preventDefault();
            }
            break;
            case 39:
                if(I.IME.isOpen()){
                I.IME.nextPage(i);
                i.preventDefault();
            }
            break;
            case 38:
                if(I.IME.isOpen()){
                if(!I.IME.showPaged())I.IME.prevPage(i);
                i.preventDefault();
            }
            break;
            case 40:
                if(I.IME.isOpen()){
                if(!I.IME.showAllPages())I.IME.nextPage(i);
                i.preventDefault();
            }
            break;
            case 8:case 46:
                var iI=U.desk.childNodes[V[ii]];
                if(_&&!i.getRepeat())DOM.CSS(iI).addClass(y.buttonDown);
                if(!P(iI.id,i))i.preventDefault();
                break;
            case 20:
                if(!i.getRepeat()){
                e=e^s
                }
                break;
            case 27:
                if(I.IME.isOpen()){
                I.IME.hide();
            }else{
                var il=DocumentSelection.getStart(U.attachedInput);
                DocumentSelection.setRange(U.attachedInput,il,il);
            }
            return false;
            default:
                if(!i.getRepeat()){
                e=e|i.shiftKey|i.ctrlKey<<2|i.altKey<<1
                }
                if(V.hasOwnProperty(ii)){
                if(!(i.altKey^i.ctrlKey)){
                    var iI=U.desk.childNodes[V[ii]];
                    if(_)DOM.CSS(iI).addClass(y.buttonDown);
                    p=iI.id
                    }
                    if(i.altKey&&i.ctrlKey){
                    i.preventDefault();
                    if(i.srcElement){
                        P(U.desk.childNodes[V[ii]].id,i);
                        p=""
                        }
                    }
            }else{
            I.IME.hide();
        }
        break
        }
        break;
case'keyup':
    switch(ii){
    case 20:
        break;
    default:
        if(!i.getRepeat()){
        e=X&(T^(!i.shiftKey|(!i.ctrlKey<<2)|(!i.altKey<<1)));
    }
    if(_&&V.hasOwnProperty(ii)){
        DOM.CSS(U.desk.childNodes[V[ii]]).removeClass(y.buttonDown);
    }
    }
    break;
case'keypress':
    //gate2home code
//    if(parent.beenhere == 1) {
//        parent.beenhere = 2;
//    }
    //end gate2home code
    if(p&&!i.VK_bypass){
    if(!P(p,i)){
        i.stopPropagation();
        i.preventDefault();
    }
    p=null
    }
    if(!X^q&&(i.altKey||i.ctrlKey)){
    I.IME.hide();
}
if(0==ii&&!p&&!i.VK_bypass&&(!i.ctrlKey&&!i.altKey&&!i.shiftKey)){
    i.preventDefault();
}
}
if(e!=X){
    b(e);
    L();
}
};

var A=function(i){
    var e=DOM.getParent(i.srcElement||i.target,'a');
    if(!e||e.parentNode.id.indexOf(Q)<0)return;
    e=e.parentNode;
    switch(e.id.substring(Q.length)){
        case"caps":case"shift_left":case"shift_right":case"alt_left":case"alt_right":case"ctrl_left":case"ctrl_right":
            return
            }
            if(DOM.CSS(e).hasClass(y.buttonDown)||!_){
        P(e.id);
    }
    if(_){
        DOM.CSS(e).removeClass(y.buttonDown)
        }
        var ii=X&(s|i.shiftKey|i.altKey<<1|i.ctrlKey<<2);
    if(X!=ii){
        b(ii);
        L();
    }
    i.preventDefault();
    i.stopPropagation();
};

var d=function(i){
    var e=DOM.getParent(i.srcElement||i.target,'a');
    if(!e||e.parentNode.id.indexOf(Q)<0)return;
    e=e.parentNode;
    var ii=X;
    var iI=e.id.substring(Q.length);
    switch(iI){
        case"caps":
            ii=ii^s;
            break;
        case"shift_left":case"shift_right":
            if(i.shiftKey)break;
            ii=ii^Z;
            break;
        case"alt_left":case"alt_right":case"ctrl_left":case"ctrl_right":
            ii=ii^(i.altKey<<1^w)^(i.ctrlKey<<2^W);
            break;
        default:
            if(_)DOM.CSS(e).addClass(y.buttonDown);
            break
            }
            if(X!=ii){
        b(ii);
        L();
    }
    i.preventDefault();
    i.stopPropagation();
};

var D=function(i){
    var e=DOM.getParent(i.srcElement||i.target,'div'),ii=i.type=='mouseover'?2:3;
    if(e&&(id=e.id).indexOf(Q)>-1){
        if(id.indexOf(v.SHIFT)>-1){
            B(ii,v.SHIFT);
        }else if(id.indexOf(v.ALT)>-1||id.indexOf(v.CTRL)>-1){
            B(ii,v.CTRL);
            B(ii,v.ALT);
        }else if(id.indexOf(v.CAPS)>-1){
            n(ii,e);
        }else if(_){
            n(ii,e);
            if(3==ii){
                n(0,e);
            }
        }
    }
i.preventDefault();
i.stopPropagation();
};

var f=function(i){
    DocumentCookie.set('vk_mapping',i.target.value);
    V=x[i.target.value]
    };
    
I.attachInput=function(i){
    if(!i)return U.attachedInput;
    if(isString(i))i=document.getElementById(i);
    if(i==U.attachedInput)return U.attachedInput;
    if(!I.switchLayout(O.layout)&&!I.switchLayout(U.langbox.value)){
        throw new Error('No layouts available');
    }
    I.detachInput();
    if(!i||!i.tagName){
        U.attachedInput=null
        }else{
        _=!DOM.CSS(i).hasClass(y.noanim);
        U.attachedInput=i;
        h();
        if(i.contentWindow){
            i=i.contentWindow.document.body.parentNode
            }
            i.focus();
        EM.addEventListener(i,'keydown',a);
        EM.addEventListener(i,'keyup',a);
        EM.addEventListener(i,'keypress',a);
        EM.addEventListener(i,'mousedown',I.IME.blurHandler);
        var e=document.body.parentNode;
        if(document.body.parentNode!=DOM.getParent(i,'html')){
            EM.addEventListener(e,'keydown',a);
            EM.addEventListener(e,'keyup',a);
            EM.addEventListener(e,'keypress',a);
        }
        G(true);
    }
    return U.attachedInput
    };
    
I.detachInput=function(){
    if(!U.attachedInput)return false;
    h(true);
    I.IME.hide();
    if(U.attachedInput){
        var i=U.attachedInput;
        if(i.contentWindow){
            i=i.contentWindow.document.body.parentNode
            }
            EM.removeEventListener(i,'keydown',a);
        EM.removeEventListener(i,'keypress',a);
        EM.removeEventListener(i,'keyup',a);
        EM.removeEventListener(i,'mousedown',I.IME.blurHandler);
        var e=document.body.parentNode;
        EM.removeEventListener(e,'keydown',a);
        EM.removeEventListener(e,'keyup',a);
        EM.removeEventListener(e,'keypress',a);
    }
    G(false);
    U.attachedInput=null;
    return true
    };
    
I.getAttachedInput=function(){
    return U.attachedInput
    };
    
I.open=I.show=function(i,e){
    if(!(i=I.attachInput(U.attachedInput||i))||!U.keyboard||!document.body)return false;
    if(!U.keyboard.parentNode||U.keyboard.parentNode.nodeType==11){
        if(isString(e))e=document.getElementById(e);
        if(!e.appendChild)return false;
        e.appendChild(U.keyboard);
    }
    return true
    };
    
I.close=I.hide=function(){
    if(!U.keyboard||!I.isOpen())return false;
    I.detachInput();
    U.keyboard.parentNode.removeChild(U.keyboard);
    return true
    };
    
I.toggle=function(i,e,ii){
    I.isOpen()&&U.attachedInput==I.attachInput(i)?I.close():I.show(i,e,ii);
};

I.isOpen=function(){
    return(!!U.keyboard.parentNode)&&U.keyboard.parentNode.nodeType==1
    };
    
I.isEnabled=function(){
    return I.isOpen()&&c
    };
    
var F=function(e,ii){
    if(!e){
        if(ii){
            delete Y.requires;
            if(!Y.keys){
                J(Y);
                Y.html=m(Y.keys);
            }
            U.desk.innerHTML=Y.html;
            U.keyboard.className=Y.domain;
            I.IME.css=Y.domain;
            X=z;
            L();
            if(isFunction(Y.activate)){
                Y.activate();
            }
            h();
            DocumentCookie.set('vk_layout',Y.id);
            O.layout=Y.id;
            g(100);
        }else{
            var iI=6;
            var il=setInterval(function(){
                var io=['loaderror',''];
                DOM.CSS(U.progressbar).removeClass(io).addClass(io[iI%2]);
                if(!--iI){
                    clearInterval(il);
                    F(null,true);
                }
            },200);
    }
}else if(ii){
    if(Y.requires){
        g(Math.round(100/(Y.requires.length+1)));
        Y.requires.pop();
    }
}
};

var g=function(i){
    c=i>99;
    U.progressbar.style.display=c?"none":"block";
    U.desk.style.display=c?"block":"none";
    U.progressbar.innerHTML=i+"%"
    };
    
var G=function(i){
    if(i){
        var e=DOM.StyleSheet(l+'css/'+O.skin+'/keyboard.css');
        e.add();
    }
    var ii=DOM.getWindow(U.attachedInput);
    if(window!=ii){
        var e=DOM.StyleSheet(l+'css/'+O.skin+'/keyboard.css',ii);
        if(i){
            e.add();
        }else{
            e.remove();
        }
    }
};

var h=function(i){
    if(U.attachedInput){
        var X=i?"":(Y.rtl?'rtl':'ltr');
        if(U.attachedInput.contentWindow)U.attachedInput.contentWindow.document.body.dir=X;else U.attachedInput.dir=X
            }
        };

var H=function(){
    if(null!=u.options)return;
    var i=u.sort(),e,ii,iI,il={};
    
    u.options={};
    
    U.langbox.innerHTML="";
    for(var io=0,iO=i.length,iQ=0;io<iO;io++){
        e=u[io];
        iI=e.id;
        if(u.codeFilter&&!u.codeFilter.hasOwnProperty(e.code))continue;
        if(il.label!=e.code){
            il=document.createElement('optgroup');
            il.label=e.code;
            U.langbox.appendChild(il);
        }
        ii=document.createElement('option');
        ii.value=iI;
        ii.appendChild(document.createTextNode(e.name));
        ii.label=e.name;
        il.appendChild(ii);
        u.options[iI]=iQ++
    }
    };
    
var j=function(i){
    if(isString(i))return i.match(/\x01.+?\x01|\x03.|[\ud800-\udbff][\udc00-\udfff]|./g).map(function(e){
        return e.replace(/[\x01\x02]/g,"")
        });else return i.map(function(e){
        return isArray(e)?e.map(function(i){
            return String.fromCharCodeExt(i)
            }).join(""):String.fromCharCodeExt(e).replace(/[\x01\x02]/g,"")
        });
};

var J=function(i){
    var e=i.normal,ii=i.shift||{},iI=i.alt||{},il=i.shift_alt||{},io=i.caps||{},iO=i.shift_caps||{},iQ=i.dk,i_=i.cbk,ic,iC,ie,iv,iV=null,ix,iX,iz,iZ,iw=-1,iW=[];
    for(var is=0,iS=e.length;is<iS;is++){
        var ik=e[is],iK=null,iq=null,iE=null,ir=[ik];
        if(ii.hasOwnProperty(is)){
            ic=j(ii[is]);
            ix=is
            }
            if(ix>-1&&ic[is-ix]){
            iE=ic[is-ix];
            ir[Z]=iE
            }else if(ik&&ik!=(ik=ik.toUpperCase())){
            ir[Z]=ik;
            iE=ik
            }
            if(iI.hasOwnProperty(is)){
            iC=j(iI[is]);
            iX=is
            }
            if(iX>-1&&iC[is-iX]){
            iK=iC[is-iX];
            ir[q]=iK
            }
            if(il.hasOwnProperty(is)){
            ie=j(il[is]);
            iz=is
            }
            if(iz>-1&&ie[is-iz]){
            ir[R]=ie[is-iz]
            }else if(iK&&iK!=(iK=iK.toUpperCase())){
            ir[R]=iK
            }
            if(io.hasOwnProperty(is)){
            iv=j(io[is]);
            iZ=is
            }
            if(iZ>-1&&iv[is-iZ]){
            iq=iv[is-iZ]
            }
            if(iq){
            ir[s]=iq
            }else if(iE&&iE.toUpperCase()!=iE.toLowerCase()){
            ir[s]=iE
            }else if(ik){
            ir[s]=ik.toUpperCase();
        }
        if(iO.hasOwnProperty(is)){
            iV=j(iO[is]);
            iw=is
            }
            if(iw>-1&&iV[is-iw]){
            ir[t]=iV[is-iw]
            }else if(iq){
            ir[t]=iq.toLowerCase();
        }else if(iE){
            ir[t]=iE.toLowerCase();
        }else if(ik){
            ir[t]=ik
            }
            iW[is]=ir
        }
        if(iQ){
        i.dk={};
        
        for(var is in iQ){
            if(iQ.hasOwnProperty(is)){
                var iR=is;
                if(parseInt(is)&&is>9){
                    iR=String.fromCharCode(is);
                }
                i.dk[iR]=j(iQ[is]).join("").replace(iR,iR+iR);
            }
        }
        }
        i.rtl=!!iW.join("").match(/[\u05b0-\u06ff]/);
if(isFunction(i_)){
    i.charProcessor=i_
    }else if(i_){
    i.activate=i_.activate;
    i.charProcessor=i_.charProcessor
    }
    i.keys=iW;
delete i.normal;
delete i.shift;
delete i.alt;
delete i.shift_alt;
delete i.caps;
delete i.shift_caps;
delete i.cbk;
return iW
};

var L=function(){
    var i=[];
    i[z]=y.modeNormal;
    i[Z]=y.modeShift;
    i[q]=y.modeAlt;
    i[R]=y.modeShiftAlt;
    i[s]=y.modeCaps;
    i[t]=y.modeShiftCaps;
    i[w]=y.modeNormal;
    i[W]=y.modeNormal;
    i[r]=y.modeShift;
    i[k]=y.modeShift;
    i[K]=y.modeCaps;
    i[S]=y.modeCaps;
    i[E]=y.modeShiftAltCaps;
    i[T]=y.modeShiftAltCaps;
    DOM.CSS(U.desk).removeClass(i).addClass(i[X]);
};

var b=function(i){
    var e=X^i;
    if(e&Z){
        B(!!(i&Z),v.SHIFT);
    }
    if(e&w){
        B(!!(i&w),v.ALT);
    }
    if(e&W){
        B(!!(i&W),v.CTRL);
    }
    if(e&s){
        n(!!(i&s),null,v.CAPS);
    }
    X=i
    };
    
var B=function(i,e){
    var ii=document.getElementById(Q+e+'_left'),iI=document.getElementById(Q+e+'_right');
    switch(0+i){
        case 0:
            ii.className=DOM.CSS(iI).removeClass(y.buttonDown).getClass();
            break;
        case 1:
            DOM.CSS(U.desk).removeClass([y.hoverShift,y.hoverAlt]);
            ii.className=DOM.CSS(iI).addClass(y.buttonDown).getClass();
            break;
        case 2:
            if(v.SHIFT==e&&X&Z^Z){
            DOM.CSS(U.desk).addClass(y.hoverShift);
        }else if(v.ALT==e&&X^q){
            DOM.CSS(U.desk).addClass(y.hoverAlt);
        }
        ii.className=DOM.CSS(iI).addClass(y.buttonHover).getClass();
            break;
        case 3:
            if(v.SHIFT==e){
            DOM.CSS(U.desk).removeClass(y.hoverShift);
        }else if(v.ALT==e){
            DOM.CSS(U.desk).removeClass(y.hoverAlt);
        }
        ii.className=DOM.CSS(iI).removeClass(y.buttonHover).getClass();
            break
            }
        };

var n=function(i,e,ii){
    var iI=e||document.getElementById(Q+ii);
    if(iI){
        switch(0+i){
            case 0:
                DOM.CSS(iI).removeClass(y.buttonDown);
                break;
            case 1:
                DOM.CSS(iI).addClass(y.buttonDown);
                break;
            case 2:
                DOM.CSS(iI).addClass(y.buttonHover);
                break;
            case 3:
                DOM.CSS(iI).removeClass(y.buttonHover);
                break
                }
            }
};

var N=function(i,e){
    var ii=[i,0];
    if(isFunction(Y.charProcessor)){
        var iI={
            shift:X&Z,
            alt:X&w,
            ctrl:X&W,
            caps:X&s
            };
            
        ii=Y.charProcessor(i,e,iI);
    }else if(i=="\x08"){
        ii=['',0]
        }else if(Y.dk&&e.length<=1){
        var il=o.test(i);
        i=i.replace(o,"");
        if(e&&Y.dk.hasOwnProperty(e)){
            ii[1]=0;
            var io=Y.dk[e];
            idx=io.indexOf(i)+1;
            ii[0]=idx?io.charAt(idx):i
            }else if(il&&Y.dk.hasOwnProperty(i)){
            ii[1]=1;
            ii[0]=i
            }
        }
    return ii
};

var m=function(Y){
    var i=document.createElement('span');
    document.body.appendChild(i);
    i.style.position='absolute';
    i.style.left='-1000px';
    for(var e=0,ii=Y.length,iI=[],il,io;e<ii;e++){
        il=Y[e];
        iI.push(["<div id='",Q,e,"' class='",y.buttonUp,"'><a href='#'>",M(Y,il,z,y.charNormal,i),M(Y,il,Z,y.charShift,i),M(Y,il,q,y.charAlt,i),M(Y,il,R,y.charShiftAlt,i),M(Y,il,s,y.charCaps,i),M(Y,il,t,y.charShiftCaps,i),"</a></div>"].join(""));
    }
    for(var e in C){
        if(C.hasOwnProperty(e)){
            il=C[e];
            io=il.replace(/_.+/,'');
            iI.splice(e,0,["<div id='",Q,il,"' class='",y.buttonUp,"'><a title='",io,"'","><span class='title'>",io,"</span>","</a></div>"].join(""));
        }
    }
    document.body.removeChild(i);
return iI.join("").replace(/(<\w+)/g,"$1 unselectable='on' ");
};

var M=function(i,e,X,ii,iI){
    var il=[],io=e[X]||"",iO=o.test(io)&&i.dk&&i.dk.hasOwnProperty(io=io.replace(o,""));
    if(iO)ii+=" "+y.deadkey;
    if((X==t&&e[s]&&io.toLowerCase()==e[s].toLowerCase())||(X==s&&e[t]&&io.toLowerCase()==e[t].toLowerCase())){
        ii+=" "+y.hiddenCaps
        }
        if((X==Z&&e[z]&&io.toLowerCase()==e[z].toLowerCase())||(X==z&&e[Z]&&io.toLowerCase()==e[Z].toLowerCase())){
        ii+=" "+y.hiddenShift
        }
        if((X==Z&&e[t]&&io.toLowerCase()==e[t].toLowerCase())||(X==t&&e[Z]&&io.toLowerCase()==e[Z].toLowerCase())){
        ii+=" "+y.hiddenShiftCaps
        }
        if((X==s&&e[z]&&io.toLowerCase()==e[z].toLowerCase())||(X==z&&e[s]&&io.toLowerCase()==e[s].toLowerCase())){
        ii+=" "+y.hiddenCaps
        }
        if((X==R&&e[q]&&io.toLowerCase()==e[q].toLowerCase())||(X==q&&e[Z]&&io.toLowerCase()==e[Z].toLowerCase())){
        ii+=" "+y.hiddenAlt
        }
        il.push("<span");
    if(ii){
        il.push(" class=\""+ii+"\"");
    }
    il.push(" >\xa0"+io+"\xa0</span>");
    return il.join("");
};
(function(){
    U.keyboard=document.createElement('div');
    U.keyboard.unselectable="on";
    U.keyboard.style.visibility="hidden";
    U.keyboard.id='virtualKeyboard';
    U.keyboard.innerHTML=("<div id=\"kbDesk\"><!-- --></div>"+"<div class=\"progressbar\"><!-- --></div>"+"<select id=\"kb_langselector\"></select>"+"<select id=\"kb_mappingselector\"></select>").replace(/(<\w+)/g,"$1 unselectable='on' ");
    U.desk=U.keyboard.firstChild;
    U.progressbar=U.keyboard.childNodes.item(1);
    var i=U.keyboard.childNodes.item(2);
    EM.addEventListener(i,'change',function(e){
        I.switchLayout(this.value)
        });
    U.langbox=i;
    var i=i.nextSibling,ii="";
    V=DocumentCookie.get('vk_mapping');
    if(!x.hasOwnProperty(V))V='QWERTY Standard';
    for(var iI in x){
        var il=x[iI].split("").map(function(e){
            return e.charCodeAt(0)
            });
        il.splice(14,0,8,9);
        il.splice(28,0,13,20);
        il.splice(41,0,16);
        il.splice(52,0,16,46,17,18,32,18,17);
        var io=il;
        il=[];
        for(var iO=0,iQ=io.length;iO<iQ;iO++){
            il[io[iO]]=iO
            }
            x[iI]=il;
        io=iI.split(" ",2);
        if(ii.indexOf(ii=io[0])!=0){
            i.appendChild(document.createElement('optgroup'));
            i.lastChild.label=ii
            }
            il=document.createElement('option');
        i.lastChild.appendChild(il);
        il.value=iI;
        il.innerHTML=io[1];
        il.selected=(iI==V);
    }
    V=x[V];
    EM.addEventListener(i,'change',f);
    EM.addEventListener(U.desk,'mousedown',d);
    EM.addEventListener(U.desk,'mouseup',A);
    EM.addEventListener(U.desk,'mouseover',D);
    EM.addEventListener(U.desk,'mouseout',D);
    EM.addEventListener(U.desk,'click',EM.preventDefaultAction);
    var i_;
    var ic;
    var iC;
    try{
        i_=window.opener.location.search
        }catch(e){};
    
    try{
        ic=window.dialogArguments.location.search
        }catch(e){};
    
    try{
        iC=window.top.location.search
        }catch(e){};
    
    var ie=getScriptQuery('vk_loader.js'),iv=parseQuery((i_||ic||iC||window.location.search).slice(1));
    O.layout=iv.vk_layout||ie.vk_layout||DocumentCookie.get('vk_layout')||O.layout;
    O.skin=iv.vk_skin||ie.vk_skin||O.skin;
    G(true);
})();
};

VirtualKeyboard.Langs={};
    
VirtualKeyboard.IME=new function(){
    var i=this;
    var I="<div id=\"VirtualKeyboardIME\"><table><tr><td class=\"IMEControl\"><div class=\"left\"><!-- --></div></td>"+"<td class=\"IMEControl IMEContent\"></td>"+"<td class=\"IMEControl\"><div class=\"right\"><!-- --></div></td></tr>"+"<tr><td class=\"IMEControl IMEInfo\" colspan=\"3\"><div class=\"showAll\"><div class=\"IMEPageCounter\"></div><div class=\"arrow\"></div></div></td></tr></div>";
    var l=null;
    var o="";
    var O=0;
    var Q=false;
    var _=[];
    var c=null;
    var C=null;
    i.show=function(x){
        c=VirtualKeyboard.getAttachedInput();
        var X=DOM.getWindow(c);
        if(C!=X){
            if(l&&l.parentNode){
                l.parentNode.removeChild(l);
            }
            C=X;
            V();
            C.document.body.appendChild(l);
        }
        l.className=i.css;
        if(x)i.setSuggestions(x);
        if(c&&l&&_.length>0){
            EM.addEventListener(c,'blur',i.blurHandler);
            l.style.display="block";
            i.updatePosition(c);
        }else if('none'!=l.style.display){
            i.hide();
        }
    };
    
i.hide=function(x){
    if(l&&'none'!=l.style.display){
        l.style.display="none";
        EM.removeEventListener(c,'blur',i.blurHandler);
        if(c&&DocumentSelection.getSelection(c)&&!x)DocumentSelection.deleteSelection(c);
        c=null;
        _=[]
        }
    };

i.updatePosition=function(){
    var x=DOM.getOffset(c);
    l.style.left=x.x+'px';
    var X=DocumentSelection.getSelectionOffset(c);
    l.style.top=x.y+X.y+X.h-c.scrollTop+'px'
    };
    
i.setSuggestions=function(x){
    if(!isArray(x))return false;
    _=x;
    O=0;
    e();
    i.updatePosition(c);
};

i.getSuggestions=function(x){
    return isNumber(x)?_[x]:_
    };
    
i.nextPage=function(x){
    O=Math.max(Math.min(O+1,(Math.ceil(_.length/10))-1),0);
    e();
};

i.prevPage=function(x){
    O=Math.max(O-1,0);
    e();
};

i.getPage=function(){
    return O
    };
    
i.getChar=function(x){
    x=--x<0?9:x;
    return _[i.getPage()*10+x]
    };
    
i.isOpen=function(){
    return l&&'block'==l.style.display
    };
    
i.blurHandler=function(x){
    i.hide();
};

i.toggleShowAll=function(x){
    var X=l.firstChild.rows[1].cells[0].lastChild;
    if(Q=!Q){
        X.className='showPage'
        }else{
        X.className='showAll'
        }
        e();
};

i.showAllPages=function(){
    if(!Q){
        i.toggleShowAll();
        return true
        }
        return false
    };
    
i.showPaged=function(){
    if(Q){
        i.toggleShowAll();
        return true
        }
        return false
    };
    
var e=function(){
    var x=['<table>'];
    for(var X=0,z=Math.ceil(_.length/10);X<z;X++){
        if(Q||X==O){
            x.push('<tr>');
            for(var Z=0,w=X*10;Z<10&&!isUndefined(_[w+Z]);Z++){
                x.push("<td><a href=''>");
                if(X==O){
                    x.push("<b>&nbsp;"+((Z+1)%10)+": </b>");
                }else{
                    x.push("<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>");
                }
                x.push(_[w+Z]+"</a></td>");
            }
            x.push('</tr>');
        }
    }
    x.push('</table>');
l.firstChild.rows[0].cells[1].innerHTML=x.join("");
l.firstChild.rows[1].cells[0].firstChild.firstChild.innerHTML=(O+1)+"/"+(0+Q||Math.ceil(_.length/10));
var W=l.getElementsByTagName("*");
for(var Z=0,s=W.length;Z<s;Z++){
    W[Z].unselectable="on"
    }
};

var v=function(x){
    var X=DOM.getParent(x.target,'a');
    if(X){
        DocumentSelection.insertAtCursor(c,X.lastChild.nodeValue);
        i.hide();
    }
    x.preventDefault();
    x.stopPropagation()
    };
    
var V=function(){
    var x=C.document.createElement('div');
    x.innerHTML=I;
    l=x.firstChild;
    l.style.display='none';
    var X=l.firstChild.rows[0].cells[0],z=l.firstChild.rows[0].cells[2],Z=l.firstChild.rows[1].cells[0].lastChild;
    EM.addEventListener(X,'mousedown',i.prevPage);
    EM.addEventListener(X,'mousedown',EM.preventDefaultAction);
    EM.addEventListener(X,'mousedown',EM.stopPropagationAction);
    EM.addEventListener(z,'mousedown',i.nextPage);
    EM.addEventListener(z,'mousedown',EM.preventDefaultAction);
    EM.addEventListener(z,'mousedown',EM.stopPropagationAction);
    EM.addEventListener(Z,'mousedown',i.toggleShowAll);
    EM.addEventListener(Z,'mousedown',EM.preventDefaultAction);
    EM.addEventListener(Z,'mousedown',EM.stopPropagationAction);
    l.unselectable="on";
    var w=l.getElementsByTagName("*");
    for(var W=0,s=w.length;W<s;W++){
        w[W].unselectable="on"
        }
        EM.addEventListener(l,'mousedown',v);
    EM.addEventListener(l,'mouseup',EM.preventDefaultAction);
    EM.addEventListener(l,'click',EM.preventDefaultAction);
}
};

VirtualKeyboard.Layout=function(){};

