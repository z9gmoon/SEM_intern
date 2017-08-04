<!DOCTYPE html>
<html lang="en">
<head>

    <title>Engineers Management</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   
    <link rel="stylesheet" href="css/dash.css"/> --> 
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
     <link rel="stylesheet" href="css/matrix-media.css" />
         <link rel="stylesheet" href="css/uniform.css"/>
    <link rel="stylesheet" href="css/select2.css"/>
       <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
           <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/datepicker.css" />
</head>
<body>
    <div class="head">
    <div class="left">
        <table>
            <tr>
                <th> <div class="amount">
                        <a href="">
                            <img src={{asset("img/person.png")}}  style="width:40px;height:40px;">
                        </a>
                        <div class="esum">
                            <span>2,294</span>
                        </div>
                    </div></th>
                <th>  <div class="amount">
                        <a href="">
                            <img src={{asset("img/team.jpg")}}  style="width:40px;height:40px;">
                        </a>
                        <div class="esum">
                            <span>2,294</span>
                        </div>
                    </div></th>
                <th><div class="amount">
                        <a href="">
                            <img src={{asset("img/project.png")}}  style="width:40px;height:40px;">
                        </a>
                        <div class="esum">
                            <span>2,294</span>
                        </div>
                    </div></th>
            </tr>

        </table>
    </div>

<!-- sidebar-menu
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="/"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Teams</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="/TeamManagement">Manage Team</a></li>
        <li><a href="/AddTeam">Add Team</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Projects</span> <span class="label label-important">2</span></a>
      <ul>
         <li><a href="/ProjectManagement">Project Management</a></li>
         <li><a href="/AddProject">Add Project</a></li>
       
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Engineers</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="/EngineerManagement">Manage Engineer</a></li>
        <li><a href="/AddEngineer">Add Engineer</a></li>
      </ul>
    </li>
    
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Log out</span></a></li>

    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul>
</div> -->
    <div class="right">
        <div class="acount">
            <a href="#">
                <img src={{asset("img/account.jpg")}} style="width:70px;height:70px;">
            </a>
        </div>
    </div>
</div>

    <div class="shit">
        {{--<div class="flex-center position-ref full-height">--}}
        <div style="text-align: center; width: 100%; margin-top: 25%;">

            .
            <div class="title flex-center position-ref">Engineer Management</div>

            <div class="links">
                <a href="#">Engineer</a>
                <a href="#">Team</a>
                <a href="#">Project</a>
                <a href="#">About Us</a>
            </div>
        </div>
    </div>




    @include('template.footer')
    <script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.form_common.js"></script>
<script src="/js/bootstrap-colorpicker.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/jquery.toggle.buttons.js"></script> 
<!-- <script src="/js/masked.js"></script> -->
<!-- <script src="/js/wysihtml5-0.3.0.js"></script> -->
<!-- <script src="/js/jquery.peity.min.js"></script> -->

<script src="
/js/bootstrap-wysihtml5.js"></script>

<script src="/js/bootstrap-wysihtml5.js"></script>-->

<script src="
/js/bootstrap-wysihtml5.js"></script>

<script>
  $('.textarea_editor').wysihtml5();
</script> -->
<script>
  function transferAddEngineer(){
      window.location.href="/AddEngineer"    
  }
</script>
</body>
</html>