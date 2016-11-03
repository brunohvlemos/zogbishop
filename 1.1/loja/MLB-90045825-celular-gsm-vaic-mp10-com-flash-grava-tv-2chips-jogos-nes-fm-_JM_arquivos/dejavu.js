var _d=document;
var _path=document.location.protocol+"//dejavu.mlapps.com/jm/ml.dejavu.web.NavPixel";
var _img= new Image(1,1);

function loadDejavu(siteId,	categId){
	_img.src = _path+"?"+"_siteId="+siteId+"&_categId="+categId+"&_Referer="+escape(_d.referrer)+"&_Cookies="+escape(_d.cookie);
}

function callDejavu(dejavuMap){	
	var temp=_path+"?";
	for (var key in	dejavuMap) {
		temp += key + "=" + dejavuMap[key] + "&";
	}
	
	temp += "_Referer="+escape(_d.referrer)+"&_Cookies="+escape(_d.cookie);
	
	try {
		var MLs=screen;
		temp +="&_Res="+MLs.width+"x"+MLs.height+"x"+MLs.colorDepth;
	} catch (e) {
		temp +="&_Res=na";
	}
	
	_img.src=temp;
}