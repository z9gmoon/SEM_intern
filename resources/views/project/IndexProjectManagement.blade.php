@extends('template.menubar')

@section('content')
<div id="content">
            <!-- dialog box -->

            <div id="white-background">
                
            </div>
            <div id="dlgbox">
              <div id="dlg-header">
                Delete Project
              </div>
              <div id="dlg-body">
                Are you sure that you want to delete this project?
              </div>
              <div id="dlg-footer">
                <button onclick="dlgDelPro()" >Delete</button>
              </div>
            </div>

  <div id="content-header">
    <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="ProjectManagement" class="current">Project Management</a> </div>
    <h1>Projects Management</h1>
  </div>
  <div class="container-fluid">

  
        @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors -> all() as $err)
            {{$err}}<br>
            @endforeach
          </div>
        @endif

        @if(session('thbao'))
            <div class="alert alert-success">
            
            {{session('thbao')}}
          </div>
        @endif

        <!-- mess of the edit -->
        @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach ($errors -> all() as $err)
            {{$err}}<br>
            @endforeach
          </div>
        @endif

          @if(session('thbaoEdit'))

            <div class="alert alert-success">
                {{session('thbaoEdit')}}
            </div>
          @endif
    <hr>
          <!-- <div style="width: 150px;float: left; margin-bottom: 5px;">
          <label for="">Technical Skill</label>
            <select name="">
              <option value="">PHP</option>
              <option value="">Java</option>
              <option value="">C++</option>
              <option value="">.Net</option>
              <option value="">Ruby</option>
              <option value="">Android</option>              
            </select>         
          </div> -->

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <a href="../AddProject"><button class="btn btn-info" style="margin: 3px 0px 0px 3px;">Add Project</button></a>
            
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Project Name</th>
                  <th>Status</th>
                  <th>Technical Skill</th>
                  <th>Date Of Begin</th>
                  <th>Date Of End</th>
                  <th>Customer</th>
                  <th>Id Team</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              @foreach($Project as $pr)


                <tr class="gradeX {{$pr->idProject}}">
                 <!--  <td><a href="DetailProject/{{$pr -> idProject}}">{{$pr -> idProject}}</a></td> -->

                  <td><a href="#myDetailProject" data-toggle="modal" onclick="showDetailProject('{{$pr -> idProject}}')" id="detail">{{$controllerIDPro->idName($pr -> idProject)}}</a></td>

                  <td><a href="#myDetailProject" data-toggle="modal" onclick="showDetailProject('{{$pr -> idProject}}')" id="detail">{{$pr -> projectName}}</a></td>

                  <!-- switch case for status- -->

                  <td>
                      <span id="lb-config" class="{{$controllerColor->changeColor($pr->status)}}">
                      <?php
                      switch( $pr -> status ) {
                          case '0': echo 'New'; break;
                          case '1':  echo 'Assigned'; break;
                          case '2': echo 'Feedback'; break;
                          case '3':   echo 'In progress'; break;
                          case '4':   echo 'Resolve'; break;
                      }
                      ?>
                      </span>
                  </td>

                  <td>{{$pr -> techSkill}}</td>
                  <td>{{$pr -> dateOfBegin}}</td>
                  <td>{{$pr -> dateOfEnd}}</td>
                  <td>{{$pr -> customer_code}}</td> 
                  <td>
                  @if ($pr->idTeam!=NULL)
                  {{$controllerIDTeam->idName($pr -> idTeam)}}
                  @endif
                  </td>  
                  <td style="text-align: center;"> <a href="../EditProject/{{ $pr -> idProject}}" ><i class="icon-edit"></i></a></td>
                  <td style="text-align: center;"> <a href="#myAlertPro" data-toggle="modal" onclick="IdToModalPro('{{$pr->idProject}}')"><i class="icon-remove"></i></a></td>


               <!--    <td style="text-align: center;"><button type="button" class="btn btn-info btn-lg view-detail-project" data-toggle="modal" data-value="{{$pr -> idProject}}">Detail</button></td> -->

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- =============================================================== -->
  <!-- Modal -->
  <div class="modal fade" id="myDetailProject" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Project</h4>
        </div>
        <div class="modal-body">
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
<!-- ================= -->

<div id="myAlertPro" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Delete Project</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure that you want to delete this project?</p>
        </div>
        <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div>
    </div>
@stop

