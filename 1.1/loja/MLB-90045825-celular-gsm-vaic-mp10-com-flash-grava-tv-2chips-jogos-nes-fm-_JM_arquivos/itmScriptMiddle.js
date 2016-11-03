function midScript(){
	if (!document.layers){
		var timeLeft = getCurrentUrlBase()+"/jm/item?act=timeleft&site="+valItemSite+"&id="+valItemId+"";
		var showHits = getCurrentUrlBase()+"/jm/item?act=showhits&site="+valItemSite+"&id="+valItemId+"";
		var showNick = getCurrentUrlBase()+"/jm/item?act=eocsnick&cust="+valSellerId+"";
		var califPercentage = getCurrentUrlBase()+"/jm/item?act=eocscalif&cust="+valSellerId+"&site="+valItemSite+"&id="+valItemId+"";
		if (document.all){
			document.all.iframeShowNick.src=showNick;
			document.all.iframeCalifPercentage.src=califPercentage;
			document.all.iframeTimeLeft.src=timeLeft;
			document.all.iframeShowHits.src=showHits;
		}else{
			document.getElementById("iframeShowNick").src=showNick;
			document.getElementById("iframeCalifPercentage").src=califPercentage;
			document.getElementById("iframeTimeLeft").src=timeLeft;
			document.getElementById("iframeShowHits").src=showHits;
		}
	}
	//eval(preloadFotos);
	if(!document.layers) showHeader();
}
