$(document).ready(function(){
	 var bd = getBirthday(birthday);
	 var ne = getNewEngi(newEngi);
	 var np = getNewPro(newPro);
	 var nt = getNewTeam(newTeam);
	if((birthday!="[]")||(newEngi!="[]")||(newPro!="[]")||(newTeam!="[]")){
		$.gritter.add({

			title:	'Notification!',
			text:	'You have a new notification.',
			image: 	'img/demo/envelope.png',
			sticky: false,		
		});
		$(".gritter-item").mousemove(function() {
			$(".gritter-title").css("margin-left","-50px");	
			$(".gritter-image").css('display', 'none');
			$(".gritter-item p").css('display', 'none');
			String1 = "<a href='#myModal' id='birthday' data-toggle='modal'><i class='icon-gift'></i>Today is the birthday of Engineers!</a>";
			String2 = "<a href='#myModal' id='newEngi' data-toggle='modal'><i class='icon-user'></i>The company has some new Employees!</a>";
			String3 = "<a href='#myModal' id='newPro' data-toggle='modal'><i class='icon-file'></i>The company has some new Projects!</a>";
			String4 = "<a href='#myModal' id='newTeam' data-toggle='modal'><i class='icon-group'></i>The company has some new Teams!</a>";
			// if((birthday!=null)||(newEngi!=null)){
				$(".gritter-title").html("");
				if (birthday!="[]") {
					$(".gritter-title").append(String1+"<br/>");
					$("#birthday").click(function(){
						$(".modal-header h3").html("Happy birthday!");
						$(".modal-body").html("<h4></h4>");
						for (var i = 0; i<bd.length; i++){
							var objBD = JSON.parse(bd[i]);
							$(".modal-body h4").append(objBD.engineerName+"<hr/>");				
						}
					});
				}
				if (newEngi!="[]") {
					$(".gritter-title").append(String2+"<br/>");
					$("#newEngi").click(function(){
						$(".modal-header h3").html("New Engineers!");
						$(".modal-body").html("<h4></h4>");
						for (var i = 0; i<ne.length; i++){
							var objNE = JSON.parse(ne[i]);
							$(".modal-body h4").append(objNE.engineerName+"<hr/>");	
						}
					});
				}
				if (newPro!="[]") {
					$(".gritter-title").append(String3+"<br/>");
					$("#newPro").click(function(){
						$(".modal-header h3").html("New Projects!");
						$(".modal-body").html("<table class='table table-hover' rules='group'></table>");
						$(".modal-body table").append("<tr>"
														+"<td><h4 style='color:#008000;'>Name</h4></td>"
														+"<td><h4 style='color:#008000;'>Date Of Begin</h4></td>"
														+"<td><h4 style='color:#008000;'>Date Of End</h4></td>"
													+"</tr>");
						for (var i = 0; i < np.length; i++){
							var objNP = JSON.parse(np[i]);				
							$(".modal-body table").append("<tr class='gradeX'>"
														// +"<td><h4>"+objNP.idProject+"</h4></td>"
														+"<td><h5>"+objNP.projectName+"</h5></td>"
														+"<td><h5>"+objNP.dateOfBegin+"</h5></td>"
														+"<td><h5>"+objNP.dateOfEnd+"</h5></td>"
													+"</tr>");
							
						}
					});
				}
				if (newTeam!="[]") {
					$(".gritter-title").append(String4+"<br/>");
					$("#newTeam").click(function(){
						$(".modal-header h3").html("New Teams!");
						$(".modal-body").html("<table class='table table-hover' rules='group'></table>");
						$(".modal-body table").append("<tr>"
														+"<td><h4 style='color:#008000;'>Name</h4></td>"
														+"<td><h4 style='color:#008000;'>Technical Skill</h4></td>"
														+"<td><h4 style='color:#008000;'>Status</h4></td>"
													+"</tr>");
						for (var i = 0; i < nt.length; i++){
							var objNT = JSON.parse(nt[i]);				
							$(".modal-body table").append("<tr class='gradeX'>"
														// +"<td><h4>"+objNT.idTeam+"</h4></td>"
														+"<td><h5>"+objNT.teamName+"</h5></td>"
														+"<td><h5>"+objNT.techSkill+"</h5></td>"
														+"<td><h5>"+objNT.status+"</h5></td>"
														+"</tr>");	
						}
					});
				}
			// }
		});
	}
});
	function getBirthday(birthday){
		var bd = birthday.replace(/&quot;/g,'"').replace(/},/g,'};').replace("[","").replace("]","");
		bd = bd.split(";");
		return bd;
	}
	function getNewEngi(newEngi){
		var ne = newEngi.replace(/&quot;/g,'"').replace(/},/g,'};').replace("[","").replace("]","");
		ne = ne.split(";");
		return ne;
	}
	function getNewPro(newPro){
		var np = newPro.replace(/&quot;/g,'"').replace(/},/g,'};').replace("[","").replace("]","");
		np = np.split(";");
		return np;
	}
	function getNewTeam(newTeam){
		var nt = newTeam.replace(/&quot;/g,'"').replace(/},/g,'};').replace("[","").replace("]","");
		nt = nt.split(";");
		return nt;
	}

