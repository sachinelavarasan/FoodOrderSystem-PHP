$(document).ready(function(){
	$('#firstbar #navbar1 #ul1 li button').click(function(){
		var page1=$(this).attr('value');
		$('#content').load(page1+'.php');
		
		return false;
	});
	
	$('#second #navbar2 #nav2 li a').click(function(){
		var page=$(this).attr('href');
		$('#content').load(page+'.php');
		
		return false;
	});
});