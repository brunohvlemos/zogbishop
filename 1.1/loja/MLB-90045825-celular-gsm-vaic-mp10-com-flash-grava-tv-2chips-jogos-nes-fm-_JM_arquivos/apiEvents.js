var tasksClick = new Array();
function addClickListener(task){
	if (task!=null)
		tasksClick[tasksClick.length]=task;	
	return;
}
document.onclick = clickFired;
function clickFired(E){
	for(var i =0 ; i <tasksClick.length; i++){
		tasksClick[i](E);
	}
	return;
}
var tasksKey=new Array();
function addKeyListener(task){
	if (task!=null)
		tasksKey[tasksKey.length]=task;	
	return;
}
document.onkeypress = keypressFired;
function keypressFired(E){
	for(var i =0 ; i <tasksKey.length; i++){
		tasksKey[i](E);
	}
	return;
}
		