@extends('template.menubar')

@section('content')


  <div id="content">
    <div id="content-header">

      <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/EngineerManagement" class="current">Engineers Management</a> </div>

      <h1>Engineers Management</h1>
    </div>
    <div class="container-fluid">
      @if(count($errors) > 0)
      <div class="alert alert-danger">
        @foreach($errors -> all() as $err)
        {{$err}}<br>
        @endforeach
      </div>
      @endif

      @if(session('notify'))
      <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>

        <h4 class="alert-heading">Success!</h4>
        {{session('notify')}}
      </div>
      @endif


<!--       <script src="{{asset('js/filter-datatable.js')}}"></script> -->


      <div id="alert_del_engineer"></div>
      <hr>
      <div style="width: 150px; float: left; margin-bottom: 5px;">
        <label for="">Experience</label>
        <select name="experience" id="filterex" onchange="jsFunction(this.value);">
          <option value="0">All</a></option>
          <option value="1">No experience</option>
          <option value="2">1 year</option>
          <option value="3">More 2 years</option>
          <option value="4">More 5 years</option>
          <option value="5">More 10 years</option>              
        </select>         
      </div> 
      <div style="width: 150px;float: left; margin-bottom: 5px;">
        <label for="">Technical Skill</label>


        <select name="experience" id="filtertec" onchange="jsFunction(this.value);">
          <option value="10">All</option>
          <option value="11">PHP</option>
          <option value="12">Java</option>
          <option value="13">C++</option>
          <option value="14">.Net</option>
          <option value="15">Ruby</option>
          <option value="16">Android</option>              


        </select>         
      </div>
    
      <div class="row-fluid">
      <div class="filterable" id="filterable"> 
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <button onclick="transferAddEngineer()" class="btn btn-info" style="margin: 3px 0px 0px 3px;">Add Engineer</button>

            </div>
            <div class="widget-content nopadding">
             
             

              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Technical Skills</th>
                    <th>Experience</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list as $list)
                  <tr class="gradeX {{$list->idEngineer}} bodyparts">
                    <td><a data-toggle="modal" onclick="showDetailEngi('{{$list->idEngineer}}')" class="hello" href="#product_view">{{ $controller->idName($list->idEngineer) }}</a></td>
                    <td><a data-toggle="modal" onclick="showDetailEngi('{{$list->idEngineer}}')" class="hello" href="#product_view">{{ $list->engineerName }}</a></td>


                    <td>{{ $list->Phone }}</td>
                    <td>{{ $list->Email }}</td>
                    <td>{{ $list->TechSkill }}</td>
                    <td>{{ $list->Experience }}</td>
                    <td>
                      @if ($list->busy==0)
                        <span id="lb-config" class="{{$controllerColor->changeColorStatusEngi($list->busy)}}">Available</span>
                      @else
                        <span id="lb-config" class="{{$controllerColor->changeColorStatusEngi($list->busy)}}">Active</span>
                      @endif
                    </td>
                    <td> <a href="EditEngineer/{{$list->idEngineer}}" ><i class="icon-edit" style="margin-left: 10px;"></i></a></td>

                    <td> <a href="#myAlertEngi" data-toggle="modal" onclick="IdToModalEngi('{{$list->idEngineer}}')"><i class="icon-remove" style="margin-left: 15px;"></i></a></td>

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

</div>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->

<!--  -->


<!--  -->
<div id="myAlertEngi" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Delete Team</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure that you want to delete this engineer?</p>
  </div>
  <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div>
</div>
<!--  -->
<div class="modal fade product_view" id="product_view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        <h3 class="modal-title">Engineer Detail</h3>
      </div>

      <div class="modal-body">
        


      </div>


    </div>
  </div>
</div>

</div>



<!--  -->
@stop
