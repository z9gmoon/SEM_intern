function load_TotalEngineer(){
	$.ajax({
		url : "/totalEngineer",
		type: "GET",
		success: function(html){
			$('#changetable').html(html);
		}
	});
}
function load_TotalTeam(){
	$.ajax({
		url : "/totalTeam",
		type: "GET",
		success: function(html){
			$('#changetable').html(html);
		}
	});
}
function load_TotalProject(){
	$.ajax({
		url : "/totalProject",
		type: "GET",
		success: function(html){
			$('#changetable').html(html);
		}
	});
}
function load_TableTopEngineer(id){
	$.ajax({
		url : "/tableTopEngineer",
		type: "GET",
		data: {"id" : ""+id},
		success: function(html){
			$('#changeTopEngineer').html(html);

		}
	});
}
function load_AvailableEngineer(){
	$.ajax({
		url : "/availableEngineer",
		type: "GET",
		success: function(html){
			$('#changetable').html(html);
		}
	});
}
$(document).ready(function(){
	$.ajax({
		url : "/availableEngineer",
		type: "GET",
		success: function(html){
			$('#changetable').html(html);
		}
	});
});