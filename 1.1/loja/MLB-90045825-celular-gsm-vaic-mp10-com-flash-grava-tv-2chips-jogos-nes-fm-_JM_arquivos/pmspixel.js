function setSearchCookie(word){
	var searching = getCookieValue("ml_list");		
	if(searching !="searching")
		return;	
	if(word!=null && word != "")
		setContextCookie("S"+word);
	setCookie("ml_list","");
		
}
function pmsCtxCk(word,categ){
	if(word!=""){		
		var links = document.getElementsByTagName("a");
		for(i=0;i<links.length;i++){
			if(links[i].toString().indexOf("http://articulo.")!=-1 || links[i].toString().indexOf("http://produto.")!=-1 || links[i].toString().indexOf("/jm/item?")!=-1){			
				setSearchCookie(word);
				break;
			}
		}	
	}else{	
		if(categ!="" && categ!="##CATEG_L2##"){
			setContextCookie('V'+categ);
		}
	}	
}