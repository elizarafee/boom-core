/* (c) 2008 Add This, LLC */
if(typeof _atw===_atu){var _atw={rev:"$Rev: 60172 $",lang:function(m,i){var l=m||navigator.language,z=addthis_localize,o=window.addthis_translations||[];if(z){switch(i){case 1:z=z.share_caption;break;case 2:z=z.more;break;case 3:z=z.email_caption;break;case 4:z=z.email;break;case 5:z=z.favorites;break;case 6:z=z.email_instructions;break;case 7:z=z.email_to;break;case 8:z=z.email_from;break;case 9:z=z.email_message;break;case 10:z=z.email_privacy;break;case 11:z=z.email_send;break;case 12:z=z.email_valid;break;case 13:z=z.email_sent;break;case 14:z=z.rss_caption;break;case 15:z=z.rss_instructions;break;case 16:z=z.rss_remember;break;case 17:z=z.done;break;case 18:z=z.get_your_own;break;case 19:z=z.email_address;break;case 20:z=z.optional;break;case 21:z=z.max_characters;break;case 22:z=z.print;break;}}if(z){return z;}for(var q in o){for(var r in o[q][0]){if(o[q][0][r]===l&&o[q].length>i&&o[q][i]){return o[q][i];}}}return["Bookmark &amp; Share","More ...","Email a Friend","Email","Favorites","Multiple emails? Use commas.","To","From","Message","Privacy Policy: We never share your personal information.","Send","Please enter a valid email address.","Message sent!","Subscribe to Feed","Select from these web-based feed readers:","Please don't ask me again; send me directly to my favorite feed reader.","Done","Get your own button!","email address","optional","255 character limit","Print"][i-1];},rss:{"aol":"AOL","bloglines":"Bloglines","feedreader":"FeedReader","google":"Google Reader","mymsn":"My MSN","netvibes":"Netvibes","newsgator":"NewsGator","newsisfree":"Newsisfree","pageflakes":"Pageflakes","technorati":"Technorati","winlive":"Windows Live","yahoo":"Yahoo"},list:{"aim":"AIM","ask":"Ask","backflip":"Backflip","ballhype":"BallHype","bebo":"Bebo","blogmarks":"Blogmarks","buzz":"Buzz","delicious":"Delicious","digg":"Digg","diigo":"Diigo","email":"","facebook":"Facebook","favorites":"","fark":"Fark","faves":"Faves","feedmelinks":"FeedMeLinks","friendfeed":"FriendFeed","google":"Google","kaboodle":"Kaboodle","kirtsy":"kIRTSY","linkagogo":"Link-a-Gogo","linkedin":"LinkedIn","live":"Live","misterwong":"Mister Wong","mixx":"Mixx","multiply":"Multiply","myaol":"myAOL","myspace":"MySpace","netvouz":"Netvouz","netvibes":"Netvibes","newsvine":"Newsvine","propeller":"Propeller","print":"","reddit":"Reddit","segnalo":"Segnalo","simpy":"Simpy","slashdot":"Slashdot","spurl":"Spurl","stumbleupon":"StumbleUpon","stylehive":"Stylehive","tailrank":"Tailrank","technorati":"Technorati","thisnext":"ThisNext","twitter":"Twitter","yardbarker":"Yardbarker","yahoobkm":"Bookmarks"},div:null,get:function(id){return document.getElementById(id);},xwa:function(){if(_atw.cwa!==null){clearTimeout(_atw.cwa);}},cwa:null,xhwa:function(){if(_atw.hwa!==null){clearTimeout(_atw.hwa);}},hwa:null,ost:false,did:"at15s",ie6:function(){return _ate.bro.ie6?" style='cursor:hand'":"";},rsf:function(o,s){var ov=o.value;if(ov==s){o.value="";if(o.className.indexOf("at_ent")==-1){o.className+=" "+"at_ent";}}else{if(ov==""){o.value=s;o.className=(o.className=="at_ent")?"":o.className.replace(" at_ent","");}}},hov:function(o){o.className=(o.className.indexOf("athov")>-1)?o.className.replace(" athov",""):o.className+" athov";},rse:function(){var _d=_atw.get("at_from"),_e=_atw.get("at_to"),_f=_atw.get("at_head");_f.style.color=_d.style.borderColor=_e.style.borderColor=_d.style.outlineStyle=_d.style.outlineWidth=_e.style.outlineStyle=_e.style.outlineWidth="";_f.innerHTML=_atw.lang(addthis_language,6);},lml:function(o,l){if(o.value.length>l){o.value=o.value.substring(0,l);}},sli:function(_12){for(var i=0;i<_atw.sin.length;i++){var sio=_atw.sin[i];if(sio.pos>=sio.end){_atw.sin.splice(i,1);}else{sio.pos+=sio.inc;sio.obj.style.height=sio.pos+"px";if(sio.tp){sio.tp-=sio.inc;this.get(this.did).style.top=sio.tp+"px";}}}if(_atw.sin.length>0){_ate.sto("_atw.sli("+_12+")",_12);}},sla:function(obj,end,_17,inc,_19,tp){_atw.sin.push({"obj":obj,"pos":0,"end":end,"inc":inc,"tp":tp});_ate.sto("_atw.sli("+_17+")",_19);},sin:[],clo:function(){var a=_atw,_1c=a.get(_atw.did),v=_atc.ver,e=document.gn("embed");if(_1c){if(v<200){_atw.get("at_email15").style.display="none";}_1c.style.display="none";}if(e&&window.addthis_hide_embed){for(i=0;i<e.length;i++){if(e[i].addthis_hidden){e[i].style.visibility="visible";}}}return false;},clb:function(){if(addthis_popup_mode){window.close();}else{var a=_atw,h=function(n){o=(a.get(n));if(o){o.style.display="none";}};h("at_complete");h("at16lb");h("at_email");h("at16p");}return false;},cof:function(obj){obj.style.color="#000000";if(obj.value==" email address"){obj.value="";}},sho:function(_23){var a=_ate,w=_atw,v=_atc.ver,al=addthis_language,_28=w.get("at16lb"),_29=w.get(_atw.did),_2a=w.get("at_hover"),_2b=w.get("at16p"),_2c=w.get("at_feed"),_2d=w.get("at_share"),_2e=w.get("at_share"),_2f=_atw.get("at_email"+(v>=200?"":15)),_30=w.get("at_to"),_31=w.get("at"+(v>=200?16:15)+"ptc"),n="none",_33=false,h=function(o){if(o){o.style.display=n;}},s=function(o){if(o){o.style.display="block";}};h(_2e);h(_2c);h(_2b);h(_2f);_2d.style.display="block";h(_2a);if(v>=200){h(_29);}if(_23=="feed"){h(_2d);s(_2c);_31.innerHTML=addthis_caption_feed;_33=true;}else{if(_23=="share"||_23==""){_29.style.display=_2a.style.display="";_31.innerHTML=addthis_caption_share;_23="share";}else{if(_23!=="more"){_23="email";_2f.style.display="";if(v>=200){h(_2d);}_31.innerHTML=addthis_caption_email;}_33=true;}}if(_33&&v>=200){_28.style.display="block";var ws=w.area(true),vs=w.area(),sbw=w.sbw();_28.style.width=(ws[0]-sbw)+"px";_28.style.height=(ws[1]-sbw)+"px";_2b.style.marginTop=Math.max(0,(vs[1]/2-445/2))+"px";s(_2b);}if(a.show-->0){a.sev("40");a.cev("sho",_23);a.cev("mnv",v);a.img(_atc.ver+"sh","3");}},trim:function(s,e){try{s=s.replace(/^[\s\u3000]+|[\s\u3000]+$/g,"");if(e){s=_euc(s);}}catch(e){}return s;},uadd:function(svc,_3e){var t=this.trim,acs=addthis_custom_service;return"pub="+_ate.pub()+"&s="+svc+(_3e?"&h1="+addthis_feed+"&t1=":"&url="+t(addthis_url,1)+"&title=")+t(addthis_title,1)+"&logo="+t(addthis_logo,1)+"&logobg="+addthis_logo_background+"&logocolor="+addthis_logo_color+"&ate="+_ate.sta()+"&adt="+_atw.addt+"&content="+t(addthis_content,1)+(addthis_append_data?"&sms_ss=1":"")+((acs&&acs.url)?"&acn="+_euc(acs.name)+"&acc="+_euc(acs.code)+"&acu="+_euc(acs.url):"");},svcurl:function(){return(_atc.sec?_atd.replace("http:","https:"):_atd);},genurl:function(svc,_42){return _atw.svcurl()+(_42?"feed.php":"bookmark.php")+"?v="+(_atc.ver)+"&winname=addthis&"+_atw.uadd(svc,_42)+"&"+_ate.cst(4);},abpos:function(a){var e=document.documentElement,b=0,c=0,o=0,p=0,r=/fixed/;do{o=r.test(a.style.position);p|=o;b+=a.offsetTop||0;c+=a.offsetLeft||0;a=a.offsetParent;if(o&&a){b+=a.scrollTop;c+=a.scrollLeft;}}while(a);if(!_ate.bro.ie6&&e.scrollTop&&p){b+=e.scrollTop;c+=e.scrollLeft;}return[c,b];},area:function(cs){var w=window,d=document,de=d.documentElement,db=d.body,xs=0,ys=0,ww=0,wh=0;if(cs){if(w.innerHeight&&w.scrollMaxY){xs=db.scrollWidth;ys=w.innerHeight+w.scrollMaxY;}else{if(db.scrollHeight>db.offsetHeight){xs=db.scrollWidth;ys=db.scrollHeight;}else{xs=db.offsetWidth;ys=db.offsetHeight;}}}if(self.innerHeight){ww=self.innerWidth;wh=self.innerHeight;}else{if(de&&de.clientHeight){ww=de.clientWidth;wh=de.clientHeight;}else{if(db&&(db.clientWidth||db.clientHeight)){ww=db.clientWidth;wh=db.clientHeight;}else{if(db){ww=db.clientWidth;wh=db.clientHeight;}}}}return[(cs!==true||xs<ww?ww:xs),(cs!==true||ys<wh?wh:ys)];},sbw:function(){try{var a=d.createElement("div"),b=d.createElement("div"),y=(d.getElementsByTagName("body"))[0];with(a.style){width="50px";height="50px";overflow="hidden";position="absolute";top="-200px";left="-200px";}b.style="height:100px";y.appendChild(a);a.appendChild(b);var w1=b.innerWidth;a.style.overflow="scroll";var w2=b.innerWidth;a.removeChild(b);y.removeChild(a);return w1-w2;}catch(e){return 20;}},spos:function(){var w=window,d=document,de=d.documentElement,db=d.body;if(typeof(w.pageYOffset)=="number"){return[w.pageXOffset,w.pageYOffset];}else{if(db&&(db.scrollLeft||db.scrollTop)){return[db.scrollLeft,db.scrollTop];}else{if(de&&(de.scrollLeft||de.scrollTop)){return[de.scrollLeft,de.scrollTop];}else{return[0,0];}}}},evar:function(){try{var w=_atw;function x(v,n){return eval("("+v+"=(typeof "+v+" === '"+_atu+"' ? "+(typeof n==="string"?"'"+n+"'":n)+" : "+v+"))");}var a="addthis_",l=a+"logo",h=a+"header",c=a+"caption_",o=a+"offset_",al=x(a+"language","");x(a+"localize",0);x(a+"feed","");w.hf=(addthis_feed.length>0);x(c+"email",w.lang(al,3),true);x(a+"caption",w.lang(al,1));w.list["more"]=w.lang(al,2);w.list["email"]=w.lang(al,4);w.list["favorites"]=w.lang(al,5);w.list["print"]=w.lang(al,22);x(a+"popup",false);x(a+"popup_mode",false);x(a+"url","");x(a+"test0309",true);x(a+"omniture_collector","");x(a+"append_data",false);x(a+"brand","");x(a+"title","");x(a+"content","");x(a+"options","email,favorites,print,delicious,digg,google,myspace,live,facebook,stumbleupon,twitter,more");x(a+"exclude","");x(a+"custom_service");x(a+"custom_slot","stumbleupon");x(l,"");x(l+"_background","");x(l+"_color","");x(h+"_background","");x(h+"_color","");x(c+"share",addthis_caption);x(c+"feed",w.lang(al,14));x(o+"top",0);x(o+"left",0);x(a+"hide_embed",false);}catch(e){}}};_ate.ao=function(elt,_66,_67,_68){var a=_ate,w=_atw,d=document,lu=(_67||"").toLowerCase(),lt=(_68||"").toLowerCase(),p=a.pub(),_6f=window.addthis_hover_delay;if(_66=="feed"&&lu.length){addthis_feed=lu;}if(_6f){_6f=Math.min(500,Math.max(50,_6f));if(!w.hwa){w.hwe=elt;w.hwa=a.sto("_ate.ao(_atw.hwe,'"+_66+"','"+_67+"','"+_68+"')",_6f);return false;}else{w.xhwa();w.hwa=w.hwe=null;}}if(!w.ost){w.evar();for(i in addthis_conf){_atc[i]=addthis_conf[i];}w.addr=_atc.addr-Math.random();w.addt=_atc.addt>=0?_atc.addt:Math.floor(3*Math.random());if(p!==_atu){var mn=_ate.mun(decodeURIComponent(p)),ma=["6jb4","l33s","nlcv","edij","u9s7","ftho","u8l1","kcnv","ddjt","2oir","ja8b","2m6e","j7q8","eet4","u7rf","q093","q5go","6lee","rhqi","dnm7","8n9","7hs1","t1rr","73h4","5hk0","rii3","5vuh","fdv8","7n4p","ffru","96ad","slla","smrb"];for(var i in ma){if(ma[i]===mn){w.addr=-1;break;}}}try{if(location.href.toString().indexOf("http")!=0){w.addr=-1;}}catch(e){}try{var al=(_ate.bro.msi?navigator.userLanguage:navigator.language);if(al&&al.indexOf("en")==-1){w.addr=-1;}}catch(e){}if(addthis_test0309===false){w.addr=-1;}w.ti=1;var mdo=function(n,h,c,e){return"<div "+(c===true?"class":"id")+"=\""+n+"\""+(h===false?" style=\"display:none\"":"")+(e?e:"")+">";},msp=function(n,c){return"<span "+(c===true?"class":"id")+"=\""+n+"\">";},mlb=function(l,n){if(!n){n="";}return"<label for=\""+n+"\">"+l+":</label>";},min=function(i,e,v){return"<input id=\""+i+"\" name=\""+i+"\" type=\"text\" tabindex=\""+(_atw.ti++)+"\" "+(v!=_atu?"value=\""+v+"\" ":"")+"size=\"30\""+e+"/>";},al=addthis_language,_84=w.lang(al,20),_85=w.lang(al,19),_86=mdo("",1,true),cd="</div>",cs="</span>",cl="<div style=\"clear:both;\">"+cd,brc="<br clear=\"all\"/>",rsf=function(t){return"_atw.rsf(this,'"+t+"')";},_8d=function(t){return"onfocus=\"_atw.rse();"+rsf(t)+";\" onblur=\""+rsf(t)+"\"";},efr=function(i,l,v){return mlb(l,i)+min(i,_8d(_85),v)+brc;},rss=w.hf,hb=addthis_header_background,hbs=(hb!=""?" style=\"background-color:"+hb+"\"":""),hc=addthis_header_color,hcs=(hc!=""?" style=\"color:"+hc+"\"":""),cap=addthis_caption_share,s="<div id=\"at16lb\" onclick=\"return _atw.clb()\">"+cd;s+=mdo("at16pcc");s+=mdo("at16p",!rss);s+=mdo("at16pib");s+=mdo("at16pi");s+=mdo("at16pt",true,false,hbs);if(cap==w.lang(al,1)&&_66=="feed"){cap=w.lang(al,14);}s+="<h4 id=\"at16ptc\""+hcs+">"+cap+"</h4>";s+="<a href=\"#\" onclick=\"return _atw.clb()\" title=\"Close [X]\""+hcs+">X</a>";s+=cd;s+=mdo("at16pc");var _9a=w.rss,exc=addthis_exclude.replace(/\s/g,"").replace(/\*/,"");if(rss){s+=mdo("at_feed");s+="<span style=\"display:block\">"+w.lang(al,15)+cs+"<br/>";var i=1;for(var sv in _9a){s+="<div"+w.ie6()+(i%3==0?" class=\"at_litem\"":"")+(" onclick=\"return addthis_sendto('"+sv+"');\">")+"<a class=\"fbtn at_baa "+sv+"\">"+_9a[sv]+"</a>"+cd;i++;}s+=cd;}s+=mdo("at_share");_9a=w.list;for(var sv in _9a){if(exc.indexOf(sv)>-1){continue;}if(sv!=="more"&&!(sv==="email"&&a.pub()==="")){s+="<div"+w.ie6()+" class=\"at_item\""+" onmouseover=\"_atw.hov(this)\" onmouseout=\"_atw.hov(this)\" "+(sv=="favorites"&&a.bro.opr?" rel=\"sidebar\" href=\""+lu+"\"":"onclick=\"return addthis_sendto('"+sv+"');\">")+msp("at15t at15t_"+sv,true)+_9a[sv]+cs+cd;}i++;}s+=cl+cd;s+=mdo("at_complete",false);s+=mdo("at_s_msg")+w.lang(al,13)+cd;s+="<button onclick=\"_atw.clb()\">"+w.lang(al,17)+"</button>";s+=cd;if(_atc.ver>=200){s+=mdo("at_email",false);s+="<div id=\"at_head\" class=\"tmsg\">"+w.lang(al,6)+cd;s+="<form onsubmit=\"addthis_send();return false;\">";s+=efr("at_to",w.lang(al,7),_85);s+=efr("at_from",w.lang(al,8),_85);s+=mlb(w.lang(al,9),"at_msg");s+="<textarea id=\"at_msg\" style=\"resize:none\" cols=\"38\" rows=\"4\" tabindex=\"90\" onkeyup=\"return _atw.lml(this,250);\" "+_8d(_84)+"\">"+(_atc.enote==""?_84:_atc.enote)+"</textarea>";s+="<div class=\"form-char\"><small>"+w.lang(al,21)+"</small></div>";var pp=w.lang(al,10);var ppc=(pp.indexOf(":")),pps="";if(ppc>0){pps=pp.substr(ppc+1);pp=pp.substr(0,ppc);}var tb=" target=\"_blank\"";s+=mdo("form-button",1,true);s+="<button class=\"atbtn\" type=\"submit\" value=\"\" id=\"at_send\" tabindex=\"100\" onclick=\"return addthis_send();\">"+w.lang(al,11)+"</button><br clear=\"all\" />";s+=cd;s+=mdo("form-text",1,true);s+="<small><a tabindex=\"110\" href=\"http://www.addthis.com/privacy\""+tb+">"+pp+"</a>:"+pps+"</small>";s+=brc+cd;s+="</form>";s+=cd;}s+=cd;var ft0=mdo("at16pf");var f0=" class=\"at_baa\"";var ft1=ft0;ft0+="<a"+f0+" id=\"at-gyo\" href=\"http://www.addthis.com/web-button-select?utm_source=mm&utm_medium=img&utm_content=GetButton_orig&utm_campaign=AT_buttonpg\" title=\"Get your own button!\""+tb+">"+w.lang(al,18)+"</a>";var f1="<a"+f0+" id=\"at-logo\" href=\"http://www.addthis.com/?utm_source=mm&utm_medium=img&utm_content=ATLogo_orig&utm_campaign=AT_main\" title=\"AddThis\""+tb+">AddThis</a>"+cd;ft0+=f1;ft1+=f1;s+=ft0+cd+cd+cd+cd;var ai="at15a",af="<iframe class=\"at15a\" id=\""+ai+"Z\" src=\"\" scrolling=\"no\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\"></iframe>";s+="<div id=\""+w.did+"\" onmouseover=\"_atw.xwa()\" onmouseout=\"addthis_close()\" style=\"z-index:1000000;position:absolute;display:none;visibility:hidden;top:0px;left:0px\">";s+=mdo("at15s_head",true,false,hbs)+"<span id=\"at15ptc\""+hcs+">"+addthis_caption_share+"</span><span id=\"at15s_head_brand\""+hcs+">"+addthis_brand+"</span>"+cd;if(w.addr>=0){s+=af.replace("Z","1");}if(_atc.ver<200){var dc="<div class=\"at15e_row\"",e1=dc+"><label for=\"\">",e2="</label><input class=\"at15ti\" type=\"text\" size=\"20\" maxlength=\"80\" value=\" email address\" onfocus=\"_atw.cof(this)\" ";s+=mdo("at_email15",false);s+=e1+w.lang(al,7)+":"+e2+" id=\"at_to\" /></div>";s+=e1+w.lang(al,8)+":"+e2+" id=\"at_from\" /></div>";s+=dc+" style=\"height:60px;\"><label for=\"at_msg\">"+w.lang(al,9)+":</label><textarea id=\"at_msg\" name=\"\" cols=\"30\" rows=\"3\" style=\"width:150px;\">"+_atc.enote+"</textarea></div>";s+=e1+"&nbsp;</label><input id=\"at_send\" onclick=\"return addthis_send()\" type=\"button\" value=\""+w.lang(al,11)+"\"/></div>";s+=cl+"</div>";}s+=mdo("at_hover",false);var o=addthis_options.replace(/\s/g,"").replace(/\*/,""),map={aolfav:"myaol",skrt:"kirtsy",bluedot:"faves",su:"stumbleupon",goog:"google"},acs=addthis_custom_service;if(acs&&acs.name&&acs.icon&&acs.url){acs.code=acs.url.split(".").slice(-2).join(".").toLowerCase();if(acs.code.indexOf("http")===0){acs.code=acs.code.substr((acs.code.indexOf("https")===0?8:7));}w.list[acs.code]=acs.name;s+="<style type=\"text/css\">.at15t_"+acs.code+"{background:url("+acs.icon+") no-repeat left;}</style>";o=o.replace(addthis_custom_slot,acs.code);}o=o.split(",");for(var i=0;i<o.length;i++){var sv=o[i],_9a=w.list;if(sv in _9a){if(!(sv==="email"&&a.pub()=="")){s+="<div"+w.ie6()+" class=\"at_item\" onmouseover=\"_atw.hov(this)\" onmouseout=\"_atw.hov(this)\" onclick=\"return addthis_sendto('"+sv+"');\"><span class=\"at15t at15t_"+sv+"\">"+_9a[sv]+"</span></div>";}}}s+=cl+cd;if(w.addr>=0){s+=af.replace("Z","2");}s+=ft1.replace("mm","hm");w.div=d.ce("div");w.div.id="at20mc";w.div.innerHTML=s;d.body.appendChild(w.div);w.div.style.zIndex=1000000;w.div=null;}w.xwa();addthis_url=_67;addthis_title=_68;if(lu===""||lu==="[url]"||lu==="<data:post.url/>"){addthis_url=location.href;}if(lt===""||lt==="[title]"||lt==="<data:post.title/>"){addthis_title=d.title;}var _ad=16,_ae=elt.getElementsByTagName("img");if(_ae&&_ae[0]){elt=_ae[0];_ad=0;}else{if(a.bro.saf||a.bro.chr){if(elt.childNodes&&elt.childNodes.length==1&&elt.childNodes[0].nodeType==3){_ad=0;}}}w.sho(_66);if(_atc.ver<200||(_66!="email"&&_66!="feed"&&_66!="more")){var _af=w.abpos(elt),_b0=_af[0]+addthis_offset_left,_b1=_af[1]+_ad+1+addthis_offset_top,_b2=w.area(),_b3=w.spos(),_b4=w.get(w.did),_b5=_b4.style,dir=0;_b5.display="";var _b7=_b4.clientWidth,_b8=_b4.clientHeight;if(_b0-_b3[0]+_b7+20>_b2[0]){_b0=_b0-_b7+(elt.clientWidth||50);dir++;}if(_b1-_b3[1]+_b8+elt.clientHeight+20>_b2[1]){_b1=_b1-_b8-20;dir+=2;}if(a.show>=0){a.cev("dir",dir);}if(addthis_hide_embed){var _b9=_b0+_b7,_ba=_b1+_b8,e=d.gn("embed"),_bb=0,_bc=0,_bd=0;for(i=0;i<e.length;i++){_bb=w.abpos(e[i]);_bc=_bb[0];_bd=_bb[1];if(_b0<_bc+e[i].clientWidth&&_b1<_bd+e[i].clientHeight){if(_b9>_bc&&_ba>_bd){if(e[i].style.visibility!="hidden"){e[i].addthis_hidden=true;e[i].style.visibility="hidden";}}}}}_b1+=elt.clientHeight;if(!w.ost){if(w.addr>=0){a.ab=w.addt;var nl=(a.ab===3?65:1);var dn=dir&2,_c0=nl,pxl=_c0*23,atf=w.get(ai+(dn?1:2));if(_c0>3){pxl=_c0;}if(a.ab){atf.src=w.svcurl()+"ads-next.php?r="+a.ran()+"&url="+_euc(addthis_url)+"&ate="+a.sta()+"&adt="+w.addt+"&pub="+a.pub()+"&lnz="+_c0+"&key="+(_atc.skey||"");}var r=pxl/16,t=dn?_b1:false;switch(a.ab){case 1:w.sla(atf,pxl,5,r,1,t);break;case 2:w.sla(atf,pxl,5,r,1,t);break;}}else{a.ab="~";}}_b5.left=_b0+"px";_b5.top=_b1+"px";_b5.visibility="visible";}w.ost=true;return false;};_ate.ac=function(){_atw.xhwa();_atw.cwa=_ate.sto("_atw.clo()",_atc.cwait);};_ate.as=function(s){var w=window,d=document,a=_atw,e=_ate,au=addthis_url,at=addthis_title,v=_atc.ver;a.evar();if(s!=="more"&&addthis_omniture_collector){var i=d.ce("IFRAME");i.setAttribute("src",addthis_omniture_collector+"?sms_ss="+s+"&sms_sa="+_euc(at)+"&sms_st="+(s==="email"?"Email":"Social Web"));i.style.width=i.style.height="1px";d.body.appendChild(i);}if(s==="email"){a.sho(s);return false;}a.clo();if(s==="favorites"){if(addthis_append_data){if(au.indexOf("?")==-1){au+="?";}else{au+="&";}au+="sms_ss=favorites";}try{if(e.bro.saf||e.bro.chr){alert("Press <"+(e.bro.win?"Control":"Command")+">+D to bookmark in "+(e.bro.chr?"Chrome":"Safari"));}else{if(document.all){w.external.AddFavorite(au,at);}else{w.sidebar.addPanel(at,au,"");}}(new Image()).src=a.genurl(s);return false;}catch(e){}}if(addthis_popup!==true&&v>=200&&(!s||s==="more")){s="more";a.sho(s);return false;}if(v>=200){a.clb();}if(s==="print"){window.print();(new Image()).src=a.genurl(s);return false;}var fd=_atw.rss[s]?addthis_feed:null;if((v<200||addthis_popup)&&(!s||s==="more")){w.open(a.genurl(s,fd),"addthis","scrollbars=no,menubar=no,width="+(v>=200?"522,height=444":"625,height=495")+",resizable=no,toolbar=no,location=no,status=no");}else{w.open(a.genurl(s,fd),"addthis");}if(s){e.cev("sct",e.scnt++);}else{e.cev("clk",e.clck++);}};function addthis_send(){var v=_atc.ver,w=_atw,lb=v>=200,_d2=w.get("at_from"),_d3=w.get("at_to"),_d4=w.get("at_"+(lb?"complete":"send")),_d5=w.get("at_email"+(lb?"":"15")),_d6=w.get("at_msg"),fe=null,al=addthis_language,_d9=false,ert=function(m,o){var ec="#dd0000",a=w.get("at_head");a.innerHTML=m;a.style.color=ec;if(o!=_atu){o.style.borderColor=ec;}},err=function(m,o){if(fe===null){fe=o;o.focus();if(lb){o.style.outlineStyle="none";o.style.outlineWidth="0px";}else{alert(m);}}if(lb){setTimeout(function(){ert(m,o);},50);}};if(lb){w.rse();}var es=_d3.value.split(",");for(var i=0;i<es.length;i++){if(es[i].indexOf("@")<0||es[i].indexOf(".")<0){err(w.lang(al,12),_d3);_d9=true;break;}}if(_d2.value.indexOf("@")<0||_d2.value.indexOf(".")<0){err(w.lang(al,12),_d2);_d9=true;}if(_d6.value.length>250){err(w.lang(al,17),_d6);_d9=true;}if(!_d9){var msg=_d6.value;if(msg==w.lang(al,20)){msg="";}var _e5=w.svcurl()+"tellfriend.php?&fromname=aaa&fromemail="+_euc(_d2.value)+"&tofriend="+_euc(_d3.value)+"&note="+_euc(msg)+"&"+w.uadd("e");(new Image()).src=_e5;if(lb){_d4.style.height="200px";_d4.style.display="";_d5.style.display="none";}else{_d4.value=w.lang(al,13);}w.cwa=_ate.sto("_atw.clo()",1200);}return false;}while(_ate.plo.length>0){var v=_ate.plo.pop();if(v[0]==="open"){addthis_open(v[1],v[2],v[3],v[4]);}if(v[0]==="cout"){function addthis_click(a,b){if(window.addthis_clickout){return addthis_sendto("");}else{return addthis_open(a,b||"",window.addthis_url||"",window.addthis_title||"");}}}if(v[0]==="send"){addthis_sendto(v[1]);}if(v[0]==="span"){var s=_atw.get(v[1]);if(s){_atw.evar();s.innerHTML=("<a href=\""+_atw.genurl("")+"\" onmouseover=\"return addthis_open(this, 'share', '"+v[2]+"', '"+v[3].replace(/'/g,"\\'")+"')\" onmouseout=\"addthis_close()\" onclick=\"return addthis_to()\" class=\"snap_noshots\"><img src=\""+_atr+"button1-bm.gif\" width=\"125\" height=\"16\" style=\"border:none;padding:0px\" alt=\"AddThis\" /></a>");}}}}