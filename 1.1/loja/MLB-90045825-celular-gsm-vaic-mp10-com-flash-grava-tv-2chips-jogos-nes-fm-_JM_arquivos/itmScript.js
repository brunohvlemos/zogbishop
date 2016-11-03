function showHeader(){
  var bIsNotUser = ((getCookieValue("orgnickp")==''||getCookieValue("orgnickp")==null||getCookieValue("orgnickp")=='0')&&getCookieValue("member")!='1');
  if (!document.layers){
    var src1=""+scriptName+"org_prod2.reg_header?as_item_id=0&as_site_id="+valItemSite+"&as_categ=0&as_visual_object=HEADER_REG&as_object_type=L";
    var src2=""+scriptName+"org_prod2.reg_header?as_item_id=0&as_site_id="+valItemSite+"&as_categ="+valItemCateg+"&as_visual_object=HEADER_STD&as_object_type=L";
    if (document.all){
    	if( document.all.iframeBanner!=null){
      		if (bIsNotUser ) document.all.iframeBanner.src=src1;
      		else document.all.iframeBanner.src=src2;
	}
    }else{
    	if(document.getElementById("iframeBanner")!=null){
      		if (bIsNotUser) document.getElementById("iframeBanner").src=src1;
      		else document.getElementById("iframeBanner").src=src2;
      	}
    }
  }
}
var zoomHwnd;
function zoomImg(){
	if (zoomHwnd){
		zoomHwnd.close();
	}
	/*if(bigImages[imgNow].complete){
		zoomHwnd = wOpen("", "", bigImages[imgNow].width+20, bigImages[imgNow].height+5, "yes", 
			"<html><head><title>"+valItemTitle+"</title></head><body leftmargin=0 topmargin=0 rightmargin=0 bottommargin=0 marginheight=0 marginwidth=0><table cellpadding=0 cellspacing=0 border=0 width=100% height=100%><tr align=center valign=middle><td><img src="+bigImages[imgNow].src+"></td></tr></table></body></html>");
	}else{*/
		zoomHwnd = wOpen("", "", 530, 530, "yes", 
			"<html><head><title>"+valItemTitle+"</title></head><body leftmargin=0 topmargin=0 rightmargin=0 bottommargin=0 marginheight=0 marginwidth=0><table cellpadding=0 cellspacing=0 border=0 width=100% height=100%><tr align=center valign=middle><td><img src="+bigImgPath[imgNow]+"></td></tr></table></body></html>");
	/*}*/
}
function getBase(urlBase){
	pos = urlBase.indexOf("//");
	if (pos != -1){
		pos = pos+2;
		urlBasePart = urlBase.substring(pos);
	}else{
		alert("Error: URL Invalida");
	}
	
	pos2 = urlBasePart.indexOf("/");
	
	if (pos2 == -1)
		alert("Error: URL Invalida");
		
	return urlBase.substring(0,pos2+pos);	
}
var popUpHwnd;
function mailPopUp(){
	if(popUpHwnd && !popUpHwnd.closed){
		popUpHwnd.focus();
		return;
	}
	popUpHwnd = wOpen(getBase(document.getElementsByTagName('base')[0].href)+scriptName+"org_mail_friend_new.show_form?as_site_id="+valItemSite+"&as_item_id="+valItemId+"", 
		"", 550, 490, "no", "");
}
var enLaMiraHwnd;
function enLaMira(site_id,item_id){	
	if(enLaMiraHwnd && !enLaMiraHwnd.closed){
		enLaMiraHwnd.focus();
		return;
	}
	enLaMiraHwnd = wOpen(getBase(document.getElementsByTagName('base')[0].href)+scriptName+"org_lst_lib.add_watch?as_site_id="+valItemSite+"&as_item_id="+valItemId+"", "",680,500,"yes","");
}


var mpagoHwnd;
function mediosPago(monto,moneda){
	if(mpagoHwnd && !mpagoHwnd.closed){
		mpagoHwnd.focus();
		return;
	}
	var urlGo = "/jm/ml.mpago.PopUpMedios?amount=" + monto + "&mda=" + moneda;
	mpagoHwnd = wOpen(urlGo , "Costo",390,509,"no","");
}

function confData(frm){	
	var autoof;
	var price;
	if (frm.autoof.checked) autoof="Y";
		else autoof="N";
	if (frm.price.value.length == 0 ) {
		alert(""+msgItemNoData+"");
		return false;
	}
	var n = new String(frm.price.value);
	n=n.replace(",",".");
	if (isNaN(n)) {
		alert(""+msgPriceNotNum+"");
		return false;
	}else price=n;
	if (price < valItemBidMin) {
		alert(""+msgPriceNotValid+"");
		return false;
	}
	if (frm.qty.value.length <= 0 ) {
		alert(""+msgQtyNoData+"");
		return false;
	}
	for(i=0;i<frm.qty.value.length;i++){
		if(isNaN(frm.qty.value.charAt(i)) == true || frm.qty.value.charAt(i) == " "){
			alert (""+msgQtyTooLow+"");
			return false;
		}
	}
	if (frm.qty.value < 1) {
		alert(""+msgQtyTooLow+"");
		return false;
	}
	if (frm.qty.value > valItmQtyAvailable) {
		alert(""+msgQtyTooHigh+"");
		return false;
	} 
	
	window.location=getCurrentUrlBase()+"/jm/item?act=confirmbid&site="+valItemSite+"&id="+valItemId+"&qty="+
		frm.qty.value+"&price="+price+"&autoof="+autoof;
}
var makqQuesHwnd;
function makeQues(){
	if(makqQuesHwnd && !makqQuesHwnd.closed){
		makqQuesHwnd.focus();
		return;
	}
	makqQuesHwnd = wOpen(getCurrentUrlBase()+"/jm/item?act=showQuesForm&site="+valItemSite+"&id="+valItemId+"&visualId="+visualId+"", "", 640, 460, "no", "");
}

var helpHwnd;
function help(hCode){
	if(helpHwnd && !helpHwnd.closed){
		helpHwnd.focus();
		return;
	}
	helpHwnd = wOpen(getBase(document.getElementsByTagName('base')[0].href)+scriptName+"org_help.go2?as_site_id="+valItemSite+"&as_help_id="+hCode, "", 380, 250, "yes", "");
}