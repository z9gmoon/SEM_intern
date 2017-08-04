@extends('template.menubar')

@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="ProjectManagement" class="tip-bottom">Project Management</a> <a href="#" class="current">Insert Project</a> </div>
  <h1>Add Project</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Information</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="/AddProject" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
       
            <div class="control-group">
<!-- aa -->
<!--               <label class="control-label">Project ID:</label>

              <div class="controls">
                <input type="text" class="span11" placeholder="idProject" name="idProject" required="" />
              </div> -->
            </div>
            <div class="control-group">
              <label class="control-label">Project Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="projectName" name="projectName" required pattern="[a-zA-Z0-9 ]+" required="" />
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls" >
                <select name= "status" value="status">
                  <option value="0">New</option>
                  <option value="1">Assigned</option>
                  <option value="2">Feedback</option>
                  <option value="3">In progress</option>
                  <option value="4">Resolved</option>
                </select>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Technical Skill :</label>
              <div class="controls">

                <!-- <select name= "techSkill" value="techSkill">
                  <option value="PHP">PHP</option>
                  <option value="JAVA">JAVA</option>
                  <option value=".NET">.NET</option>
                  <option value="Ruby">Ruby</option>
                  <option value="Android">Android</option>
                  <option value="IOS">IOS</option>
                  <option value="C#">C#</option>
                  <option value="C++">C++</option>
                  <option value="Assembly">Assembly</option>
                </select> -->

                <select name= "TechSkill">

                  @if($Techni->count() > 0)
                  @foreach($Techni as $Tech)
                   <option value="{{ $Tech->Technical }}"> {{ $Tech -> Technical }} </option>
                  @endForeach
                  @else
                   No Record Found
                    @endif   
                  
                </select>
         
              </div>

            </div>


            <div class="control-group">

              <label class="control-label">Date Of Begin :</label>

              <div class="controls">
                <input type="text"  data-date-format="yyyy-mm-dd" placeholder ="2017-02-01" class="datepicker span11" name="dateOfBegin" required>
                <span class="help-block">Date with Formate of  (yyyy-mm-dd)</span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Date Of End</label>
              <div class="controls">
                <input type="text"  data-date-format="yyyy-mm-dd" placeholder="2017-02-01" class="datepicker span11" name="dateOfEnd" required>
                <span class="help-block">Date with Formate of  (yyyy-mm-dd</span> </div>
            </div>
            <div class="control-group">

              <label class="control-label">Customer :</label>

              <div class="controls">
                <input type="text" class="span11" placeholder="customer_code" name="customer_code" required="" />
              </div>
            </div>
              <!-- {{$getIdTeam}} -->
            <div class="control-group">

              <label class="control-label">Id Team :</label>

              <div class="controls">
                <select name= "idTeam" value="idTeam">

                  @if($getIdTeam->count() > 0)
                  @foreach($getIdTeam as $getId)
                   <option value="{{$getId->idTeam}}">{{$getId->teamName}}</option>
                  @endForeach
                  @else
                   No Record Found
                    @endif   
                  
                </select>

              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn-success">Submit</button>
              <button type="reset" class="btn-warning">Reset</button>
            </div>
          </form>

        </div>
      </div>
</div></div>
<script src="js/matrix.form_common.js"></script>

@stop