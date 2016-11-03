
function getCookieValue(name) { 
	var start=document.cookie.indexOf(name+"=");
	var len=start+name.length+1;
	if (start == -1) return "";
	var end=document.cookie.indexOf(";",len);
	if (end==-1) end=document.cookie.length;
	return unescape(document.cookie.substring(len,end));
}
function setTimeLeft(str){
	if(document.all)window.document.all.TimeLeft.innerHTML=str;
		else window.document.getElementById("TimeLeft").innerHTML=str;
}
function setNick(str){
	if(document.all)window.document.all.Nickname.innerHTML=str;
		else window.document.getElementById("Nickname").innerHTML=str;
}
function setVisit(str){
	if(document.all)window.document.all.Visit.innerHTML=str;
		else window.document.getElementById("Visit").innerHTML=str;
}
function setCalifPercentage(str){
	if(document.all)window.document.all.CalifPercentage.innerHTML=str;
		else window.document.getElementById("CalifPercentage").innerHTML=str;
}
function wOpen(pURL, pName, w, h, scroll, text, specialSettings){
	xLeft=(screen.width)?(screen.width-w)/2:0;
	xTop=(screen.height)?(screen.height-h)/2:0;
	xSettings = 'height='+h+',width='+w+',top='+xTop+',left='+xLeft+',scrollbars='+scroll+specialSettings
	hwnd = window.open(pURL,pName,xSettings);
	if(hwnd.window.focus){hwnd.window.focus();}
	if(text != "") {
		hwnd.document.write(text);
		hwnd.document.close();
	}
	return hwnd;
}
var autoSwapping = false;
function swpImg(val, auto){
	if (auto){
		for (j=0; j < imgCount; j++){
			if (!images[j].complete) return;
		}
	}
	if (!auto && autoSwapping) autoSwapping = false;
	imgNow+=val;
        if (imgNow == imgCount) imgNow = 0; 
        	else if (imgNow < 0) imgNow = imgCount-1;

	document.imgProd.src = images[imgNow].src;
	document.imgProd.alt = images[imgNow].alt;
}
function autoSwap(){
	if(autoSwapping){
		swpImg(1, true);
		setTimeout("autoSwap()", 2000);
	}
}
function addRow(text, isFirst){
	var tbody = document.getElementById("bigQues").getElementsByTagName("TBODY")[0];
	var row = document.createElement("TR");
	var td1 = document.createElement("TD");
	td1.innerHTML=text;
	row.appendChild(td1);
	
	if(isFirst == 'Y'){
		firstRow=tbody.firstChild;
		tbody.insertBefore(row, firstRow);
	}else{
		tbody.appendChild(row);
	}
}
function mli(){
	wOpen("http://www.mercadolivre.com.br/brasil/ml/p_html?as_html_id=POP_UPMERCADOLIDER", "", 400, 400, "no", "");
}
function mligold(){
	wOpen("http://www.mercadolivre.com.br/brasil/ml/p_html?as_html_id=POP_UPMERCADOLIDERG", "", 400, 400, "no", "");
}
function mliplat(){
	wOpen("http://www.mercadolivre.com.br/brasil/ml/p_html?as_html_id=POP_UPMERCADOLIDERP", "", 400, 400, "no", "");
}
function certif(){
	wOpen("http://www.mercadolivre.com.br/brasil/ml/p_html?as_html_id=CERTIF", "", 450, 430, "no", "", "outerWidth=460,outerHeight=440");
}

function mostrar(id){
	if (document.getElementById(id)){
        //SETEAR EL TAB ACTUAL
        selectedTab = id;
			
		//MOSTRAR EL TAB DESEADO
		document.getElementById(id).style.display = 'block';
		document.getElementById('a' + id).style.display = 'block';

		//OCULTAR LO QUE NO CORRESPONDA
		if ('a' + id != 'atab1')document.getElementById('atab1').style.display = 'none';
		if ('a' + id != 'atab2')document.getElementById('atab2').style.display = 'none';
		if (id != 'tab1')document.getElementById('tab1').style.display = 'none';
		if (id != 'tab2')document.getElementById('tab2').style.display = 'none';
	}
	
}


<!--Gen:1-->
