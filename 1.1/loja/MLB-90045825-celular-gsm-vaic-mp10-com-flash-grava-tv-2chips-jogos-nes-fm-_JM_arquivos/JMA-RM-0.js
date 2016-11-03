var Bgcolor = "#ffffff";
var Flash_OASALTTEXT="Haz Click";
var Flash_OASTARGET=TARGET;
var Flash_OASPROTOCOL="http://";
var Flash_OASDIM="WIDTH='" + width  + "' HEIGHT='" + height  + "'";
var Flash_OASADID="oas_ad_banner";
var Flash_VERSION=6;
var Flash_OASCLICK= adServer+"/RealMedia/ads/click_lx.ads/"+PAGE+"/"+RAND+"/"+POS+"/"+CAMP+"/"+IMAGE+"/"+USER;
var Flash_SWFCLICKVARIABLE="?"+clickTag+"="+adServer+"/RealMedia/ads/click_lx.ads/"+PAGE+"/"+RAND+"/"+POS+"/"+CAMP+"/"+IMAGE+"/"+USER+"?"+urlAuditClick;
var Flash_SWFFILE = urlBannerSWF +Flash_SWFCLICKVARIABLE;
var MM_contentVersion = Flash_VERSION;

var plugin = (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
	if ( plugin ) {
		var words = navigator.plugins["Shockwave Flash"].description.split(" ");
		    for (var i = 0; i < words.length; ++i)
		    {
			if (isNaN(parseInt(words[i])))
			continue;
			var MM_PluginVersion = words[i]; 
		    }
		var MM_FlashCanPlay = MM_PluginVersion >= MM_contentVersion;
	}
	else if (navigator.userAgent && navigator.userAgent.indexOf("MSIE")>=0 && (navigator.appVersion.indexOf("Win") != -1)) {
		document.write('<SCR' + 'IPT LANGUAGE=VBScript\> \n');
		document.write('on error resume next \n');
		document.write('MM_FlashCanPlay = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash." & MM_contentVersion)))\n');
		document.write('</SCR' + 'IPT\> \n');
	}

if ( MM_FlashCanPlay && urlBannerSWF )
{ 
	var contador ="1";	
	} 
	else 	
		{
		var contador ="0";
			Gif();
			}


if (contador =="1")
{
if (Flash =='x'){FlashF();}
else if (Flash_Exp =='x'){Flash_ExpF();}
else if (Flash_Multi =='x'){	Flash_MultiF();}
else if (Layer =='x'){	LayerF();}
else if (PopUp =="x"){	PopF();}
else if (PopUnder =="x"){ PopF();}

}

function FlashF()
{
document.write('<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="'+Flash_OASPROTOCOL+'download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version='+Flash_VERSION+',0,0,0" ID="'+Flash_OASADID+'" '+Flash_OASDIM+' ALIGN="">');
document.write('<PARAM NAME=movie VALUE="'+Flash_SWFFILE+'"><PARAM NAME=quality VALUE=high><PARAM NAME="wmode" VALUE="'+Flash_WMODE+'">'); 
document.write('<EMBED src="'+Flash_SWFFILE+'" quality=high wmode='+Flash_WMODE+' swLiveConnect=FALSE '+Flash_OASDIM+' NAME="'+Flash_OASADID+'" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="'+Flash_OASPROTOCOL+'www.macromedia.com/go/getflashplayer">');
document.write('</EMBED></OBJECT>');
}

if (urlAuditIMP){ document.write('<IMG SRC="'+urlAuditIMP+'" width="1" height="1" BORDER=0 ></a>');}
if (AuditCPA){ document.cookie = 'cpa='+AuditCPA+'; expires=Thu, 7 Aug 2009 20:47:11 UTC; path=/'; }

function Gif(){
document.write('<a href="'+Flash_OASCLICK+'" target="'+Flash_OASTARGET+'"><IMG SRC="'+ urlBannerGIF +'" '+Flash_OASDIM+' BORDER=0 alt="'+Flash_OASALTTEXT+'"></a>');
}
function Flash_ExpF(){
document.write("<scr" + "ipt src='http://www.mercadolibre.com/org-img/advertising/JMA-RM/Expand.js'>" + "</scr" + "ipt>");
}
function Flash_MultiF(){
document.write("<scr" + "ipt src='http://www.mercadolibre.com/org-img/advertising/JMA-RM/Flash_Multi.js'>" + "</scr" + "ipt>");
}
function PopF(){
document.write("<scr" + "ipt src='http://www.mercadolibre.com/org-img/advertising/JMA-RM/Pop.js'>" + "</scr" + "ipt>");
}
function LayerF(){
document.write("<scr" + "ipt src='http://www.mercadolibre.com/org-img/advertising/JMA-RM/Layer.js'>" + "</scr" + "ipt>");
}