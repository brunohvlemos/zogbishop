function performNaturalCheck(referrer, currentUrl){
	//document.write("<BR>Iniciando identificación para:["+referrer+"] ---> ["+currentUrl+"]<BR>");
	ind= getNaturalReferrerInd(referrer, currentUrl);
	if(ind == -1){
		//document.write("<BR><center>NN</center><BR>");
		return ;
	}
	//document.write("<BR><center>N</center><BR>");
	pageId= getPageIdentification(currentUrl);
	//document.write("<BR>Page Id="+pageId+" <BR>");
	
	naturalPmsSiteId= naturalPmsSiteIds[ind];
	naturalPmsId= naturalPmsIds[ind];
	//document.write("<BR>naturalPmsSiteId="+naturalPmsSiteId+"<BR>");
	//document.write("<BR>naturalPmsId="+naturalPmsId+"<BR>");
	
	key= "PMS"+naturalPmsId;
	setCookie("orgpms", naturalPmsSiteId, 30);
	setCookie("pmsword", pageId, 30);
	setCookie(key, key, 30);
	//document.write("<BR>Cookies seteadas<BR>");
}
function getPageIdentification(currentUrl){
	try{
		if ( oldUrl!=null){
			currentUrl= oldUrl;
		}
	}catch(e){}
	
	if(currentUrl.indexOf("jm/item") != -1)
		return "ITEM";
	if(currentUrl.indexOf("jm/search") != -1)
		return "SEARCH";
	if(currentUrl.indexOf("jm/themepage") != -1)
		return "THEMES";
	if(currentUrl.indexOf("/home")!= -1)
		return "HOME";
	if(currentUrl.indexOf("jm/guide")!= -1)
		return "GUIDES";
	if(currentUrl.indexOf("jm/catalog")!= -1)
		return "CATALOG";
	if(currentUrl.indexOf("jm/reviews")!= -1)
		return "REVIEWS";				
	if(currentUrl.length == 1 && currentUrl.lastIndexOf('/')==0)
		return "HOME";
	return "OTHER";	
}
function getNaturalReferrerInd(referrer, currentUrl){
	fromPms= getCookieValue("pmsonline");
	//document.write("<BR>pmsonline:"+fromPms+"<BR>");
	if(fromPms!=null){
		if(fromPms=="YES"){
			setCookie("pmsonline", currentUrl, null);
			return -1;
		}
		if(fromPms.toLowerCase()==currentUrl.toLowerCase())
			return -1;
	}
		
	iQueryIndex= referrer.indexOf("?");
	if(iQueryIndex != -1)
		referrer= referrer.substring(0, iQueryIndex);
	referrer= referrer.toLowerCase();
	finded= -1;
	for(var i= naturalSites.length-1; i>-1 && finded==-1; i--){
		if(referrer.indexOf(naturalSites[i])!=-1)
			finded = i;		
	}
	return finded;
}
function installListeners(){
	document.onclick= clickEvent;
	document.onkeypress= keyPressEvent;
}
function keyPressEvent(E){
	performPopPms();
}
function clickEvent(E){
	performPopPms();
}
function performPopPms(){
	var t_orgpms= getCookieValue("t_orgpms");
	if(t_orgpms){
		var t_cust_id = getCookieValue("t_cust_id");
		var t_pmsword= getCookieValue("t_pmsword");
		var key= "PMS"+t_cust_id;
		//Persistir cookies de PMS
		setCookie("orgpms", t_orgpms, 30);
		setCookie(key, key, 1);
		setCookie("pmsword", t_pmsword, 30);
		// Eliminar cookies temporales
		setCookie("t_orgpms", t_orgpms, -10);
		setCookie("t_pmsword", t_pmsword, -10);
		setCookie("t_cust_id", t_cust_id, -10);
	}
}

