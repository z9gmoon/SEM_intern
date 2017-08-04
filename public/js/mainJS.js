// active one Item in left-sidebar
$(document).ready(function(){
    href_link=window.location.pathname;
        //href_link.indexOf('AddTeam')==1||href_link.indexOf('EditTeam')==1||href_link.indexOf('TeamManagement')==1 true
    href_link=href_link.substr(1);
    href_link=(href_link.indexOf("/")==-1)?href_link:href_link.substring(0,href_link.indexOf("/"));
    switch(href_link){
        case "AddTeam":
        case "EditTeam":
        case "TeamManagement":
            $('#sidebar li:eq(1)').addClass('active');
            break;
        case "AddProject":
        case "EditProject":
        case "ProjectManagement":
            $('#sidebar li:eq(2)').addClass('active');
            break;
        case "AddEngineer":
        case "EditEngineer":
        case "EngineerManagement":
            $('#sidebar li:eq(3)').addClass('active');
            break;
        default:
            $('#sidebar li:eq(0)').addClass('active');
    }
    $('#myAlert div.modal-footer a:eq(0)').click(function(){
        id=$(this).attr('title');
        //id=89;
        $.ajax({
            url : "/DelTeam/"+id,
            type : "get",
            dataType:"text",
            success : function (result){
                if(result==1) {
                    //console.log(result);
                    $("."+id+"").remove();
                    //console.log('Ok');
                    html='<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>\
                        <h4 class="alert-heading">Success!</h4>Delele team successfully </div>';
                    $("#alert_del_team").html(html);
                }
                else {
                    //console.log(result);
                    //console.log('failed');
                    html='<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>\
                        <h4 class="alert-heading">Error!</h4>Delele team failed </div>';
                    $("#alert_del_team").html(html);
                }
            }
        });
    });

    $('#myAlertPro div.modal-footer a:eq(0)').click(function(){
        id=$(this).attr('title');
        //id=89;
        $.ajax({
            url : "/DelProject/"+id,
            type : "get",
            dataType:"text",
            success : function (result){
              console.log(result);
                if(result==1) {
                    //console.log(result);
                    $("."+id+"").remove();
                    //console.log('Ok');
                    html='<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>\
                        <h4 class="alert-heading">Success!</h4>Delele project successfully </div>';
                    $("#alert_del_project").html(html);
                }
                else {
                    //console.log(result);
                    //console.log('failed');
                    html='<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>\
                        <h4 class="alert-heading">Error!</h4>Delele project failed </div>';
                    $("#alert_del_project").html(html);
                }
            }
        });
    });

    // ===== show detail project
  // $('.view-detail-project').click(function(){
  //       idProjectShow = $(this).attr('data-value');
  //       console.log(idProjectShow);

  //       $.ajax({
            
  //           url : "/DetailProject/"+idProjectShow,
  //           dataType : "json",
  //           success:function(d){

  //               //DETA1 = d['0'].idProject;
  //               // DETA2 = d['0'].projectName;
  //               DETA3 = d['0'].status;
  //                if( DETA3 == '0'){
  //                 DETA33 = " New";
  //                }
  //                if( DETA3 == '1'){
  //                 DETA33 = "Assigned";
  //                }
  //                if( DETA3 == '2'){
  //                 DETA33 = "Feedback";
  //                }
  //                 if( DETA3 == '3'){
  //                 DETA33 = "In progress";
  //                }
  //                else if( DETA3 == '4'){
  //                 DETA33 = "Resolved";
  //                }
         
  //              $('#myDetailProject').modal();

  //              //$('#trrr').html(DETA1);

  //               $('#trrr').html(d['0'].idProject);

  //              $('#name').html(d['0'].projectName);
  //              $('#status').html(DETA33);
  //              $('#tech').html(d['0'].techSkill);
  //              $('#begin').html(d['0'].dateOfBegin);
  //              $('#end').html(d['0'].dateOfEnd);
  //              $('#customer').html(d['0'].customer_code);
  //              $('#idtm').html(d['0'].idTeam);
  //            // alert(DETA1); 
               
  //           }
 
  //       })
  //   });

   

    $('#myAlertEngi div.modal-footer a:eq(0)').click(function(){
        id=$(this).attr('title');
        //id=89;
        $.ajax({
            url : "/DelEngineer/"+id,
            type : "get",
            dataType:"text",
            success : function (result){
              if(result==1) {
                    //console.log(result);
                    $("."+id+"").remove();
                    //console.log('Ok');
                    html='<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>\
                        <h4 class="alert-heading">Success!</h4>Delele engineer successfully </div>';
                    $("#alert_del_engineer").html(html);
                }
                else {
                    //console.log(result);
                    //console.log('failed');
                    html='<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>\
                        <h4 class="alert-heading">Error!</h4>Delele enginer failed </div>';
                    $("#alert_del_engineer").html(html);
                }
            }
        });
    });

    $('.add-member').on('click',function(){//click to show Engineer will be added in team
        $('#modaladdTeam div.modal-footer a:eq(0)').hide();//default is hide
        $.ajax({
            url : "/Team/ListAvailable",
            type : "get",
            //dataType:"text",
            success:function(result){
                $('#modaladdTeam .modal-body').html(result);
                $('#modaladdTeam').modal();

            }
        });
    });

    $('#modaladdTeam div.modal-footer a:eq(0)').click(function(){//click to add mem to team
        var engiToAdd = [],engiNameToAdd=[],engiEmailToAdd=[];
        $('.table-engi-available input[type="checkbox"]:checked').each(function(){
            engiToAdd.push($(this).attr('value'));
            engiNameToAdd.push($(this).attr('data-name'));
            engiEmailToAdd.push($(this).attr('data-email'));
        });
        //console.log(engiToAdd);
        $.ajax({
            url: "/Team/AddEngineer",
            type: "post",
            dataType: "text",
            data : {
                _token:$('meta[name="_token"]').attr('content'),//tokens in 1 page are same,use of post method
                idTeam: $('[name="idTeam"]').val(),
                idProject:$('#project_name input, #project_name label').attr('data-val'),
                listEngi: engiToAdd,
                listNameEngi: engiNameToAdd,
                listEmailEngi: engiEmailToAdd,
                nameTeam: $('[name="teamName"]').val(),
                nameProject: $('#project_name input, #project_name label').attr('value')
            },
            beforeSend:function(){
                $('#showStatus .modal-body').html('<i class="fa fa-refresh fa-spin"></i> Mails are being send......');
                $('#modaladdTeam').modal("hide");
                $('#showStatus').modal();
            },
            success:function(result){
                //console.log(result);
                $('#showStatus .modal-body').html("<label class='label label-success'>Success!</label> Add engineer Successfully!!");
                //$('#showStatus').modal("hide");
                setTimeout(function(){ $('#showStatus').modal("hide"); }, 1000);

                $.ajax({//change data current engis
                    url: "/Team/CurrentEngineer/"+$('[name="idTeam"]').val(),
                    type: "get",
                    dataType: "text",
                    success:function(res){
                        //console.log(res);
                        $('#current-member').html(res);
                        $('.count_member').html($('.count-member').html());//change num engi
                    }
                });
                $.ajax({//change data old engis
                    url: "/Team/OldEngineer/"+$('[name="idTeam"]').val(),
                    type: "get",
                    dataType: "text",
                    success:function(res){
                        console.log(res);
                        $('#oldmember').html(res);
                    }
                });
            }
        });
    });
    $('#current-member').on("click",".icon-remove",function(){//delegated events,remove mem from team
        _this = $(this);
        _idEngineer =_this.parents('tr').find('td:eq(0)').html();
        $.ajax({
            url: "/Team/RemoveEngineer",//warning url without /
            type: "get",
            dataType: "text",
            data : {
                idEngineer:_idEngineer,
                idTeam: $('[name="idTeam"]').val()
            },
            success:function(res){
                if(res)
                    //_this.parents('tr').remove();
                    $.ajax({
                        url: "/Team/CurrentEngineer/"+$('[name="idTeam"]').val(),
                        type: "get",
                        dataType: "text",
                        success:function(res){
                            //console.log(res);
                            $('#current-member').html(res);
                            $('.count_member').html($('.count-member').html());
                        }
                    });

                    $.ajax({//change data old engis
                        url: "/Team/OldEngineer/"+$('[name="idTeam"]').val(),
                        type: "get",
                        dataType: "text",
                        success:function(res){
                            console.log(res);
                           $('#oldmember').html(res);
                        }
                    });
            },
            error: function (data) {
                //something went wrong with the request
                alert("Error");
            }
        });
    });

    $('#modaladdTeam .modal-body').on('click','td input[name="engi"]',function(){//delegate event, innerHTML change,add btn show or no
        showAddButton = $("#modaladdTeam .modal-body td input[name='engi']").is(":checked");//select don't need delegate
        if(showAddButton) $('#modaladdTeam div.modal-footer a:eq(0)').show();
        else $('#modaladdTeam div.modal-footer a:eq(0)').hide();
    });

    $('.gradeX td:first-child,.gradeX td:nth-child(2)').click(function(){//click field id,or name in indexTeam to show detail
        //alert($(this).parent().attr('data-val'))    ;
        var id=$(this).parent().attr('data-val');
        $.ajax({
            url: "/Team/ShowDetail",
            type: "get",
            dataType: "text",
            data:{
                idTeam:id
            },
            success:function(res){
                $('#showDetail_Team .modal-body').html(res);
                $('#showDetail_Team').modal();
            }
        });
    });
});
// change color li tag
$(document).ready(function(){
  $("#user1").click(function(event) {
      $("#user1").css("background-color","#d9d9d9");
      $("#user2").css("background-color","#FFFFFF");
      $("#user3").css("background-color","#FFFFFF");
      $("#user4").css("background-color","#FFFFFF");
      $("#user5").css("background-color","#FFFFFF");
  });
  $("#user2").click(function(event) {
      $("#user2").css("background-color","#d9d9d9");
      $("#user1").css("background-color","#FFFFFF");
      $("#user3").css("background-color","#FFFFFF");
      $("#user4").css("background-color","#FFFFFF");
      $("#user5").css("background-color","#FFFFFF");
  });
  $("#user3").click(function(event) {
      $("#user3").css("background-color","#d9d9d9");
      $("#user2").css("background-color","#FFFFFF");
      $("#user1").css("background-color","#FFFFFF");
      $("#user4").css("background-color","#FFFFFF");
      $("#user5").css("background-color","#FFFFFF");
  });
  $("#user4").click(function(event) {
      $("#user4").css("background-color","#d9d9d9");
      $("#user2").css("background-color","#FFFFFF");
      $("#user3").css("background-color","#FFFFFF");
      $("#user1").css("background-color","#FFFFFF");
      $("#user5").css("background-color","#FFFFFF");
  });
  $("#user5").click(function(event) {
      $("#user5").css("background-color","#d9d9d9");
      $("#user2").css("background-color","#FFFFFF");
      $("#user3").css("background-color","#FFFFFF");
      $("#user4").css("background-color","#FFFFFF");
      $("#user1").css("background-color","#FFFFFF");
  });
});

function dlgDelPro(){
  var whitebg = document.getElementById("white-background");
  var dlg = document.getElementById("dlgbox");
  whitebg.style.display = "none";
  dlg.style.display = "none";

}
function dlgCancelPro(){
  var whitebg = document.getElementById("white-background");
  var dlg = document.getElementById("dlgbox");
  whitebg.style.display = "none";
  dlg.style.display = "none";

}

function showDialog(){
  var whitebg = document.getElementById("white-background");
  var dlg = document.getElementById("dlgbox");
  whitebg.style.display = "block";
  dlg.style.display = "block";

  var winWidth = window.innerWidth;
  var winHeight = window.innerHeight;
  dlg.style.left = (winWidth/2 - 480/2) + "px";
  dlg.style.top = "150px";
}

function IdToModal(id,selector){//must be a string
    //html = $('#myAlert div.modal-footer a:eq(0)').attr("href", "/DelTeam/"+id);
    html = $('#myAlert div.modal-footer a:eq(0)').attr("title", id);
    //console.log(selector);
}

function IdToModalPro(id){//must be a string
    
    html = $('#myAlertPro div.modal-footer a:eq(0)').attr("title", id);

}


function IdToModalEngi(id){//must be a string
    
    html = $('#myAlertEngi div.modal-footer a:eq(0)').attr("title", id);

}
function showDetailEngi(id){
  $.ajax({
    url: "/DetailEngineer/"+id,
    dataType: "text",
    type: "GET",
    success: function(result){
      $(".modal-body").html(result);
    }
  });

}
// function popupShow(){
//   var popup = document.getElementById("popuptext");
//   popup.classList.toggle("show");
// }
function showDetailProject(id){
  $.ajax({
    url : "/DetailEngineerailProject/"+id,
    dataType: "text",

    success: function(result){
      $(".modal-body").html(result);
    }
  });


//LOGOUT

}

function showDetailTeam(id){
    $.ajax({
        url: "/Team/ShowDetail",
        type: "get",
        dataType: "text",
        data:{
            idTeam:id
        },
        success:function(res){
            $('#showDetail_Team .modal-body').html(res);
            $('#showDetail_Team').modal();
        }
    });
}

function changeRole(id,value){
    $.ajax({
        url: "/Team/ChangeRole",
        type: "get",
        dataType: "text",
        data:{
            idEngineer:id,
            value:value
        },
        success:function(res){
            console.log(res);
        }
    });
}

function infoEngiInTeam(id){
    $.ajax({
        url: "/DetailEngineer/"+id,
        dataType: "text",
        type: "GET",
        success: function(result){
            $("#modalengiInfo .modal-body").html(result);
            $("#modalengiInfo").modal();
        }
    });
}
function jsFunction(id)
  
{ 
   var tech = $('#filtertec').val(); 
   
   var exp = $('#filterex').val();
      id = tech+'.'+exp; 
      $.ajax({
    url : "/Filter/"+id,
    data: {"exp": exp, "tech": tech},
    dataType : 'text',
    type: 'GET',
    success: function(html){

      $("#filterable").html(html);
    }
     });
   
   }
