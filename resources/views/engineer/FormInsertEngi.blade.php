@extends('template.menubar')

@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/EngineerManagement" class="tip-bottom">Engineer Management</a> <a href="#" class="current">Insert Engineer</a> </div>
  <h1>Add Engineer</h1>
</div>
<div class="container-fluid">
@if(session('notify'))
      <div class="alert alert-danger alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>

        <h4 class="alert-heading">Warning!</h4>
        {{session('notify')}}
      </div>
      @endif
  <hr>
  <div class="row-fluid">
    <form action="/AddEngineerController" method="POST" class="form-horizontal" enctype='multipart/form-data'>
     <!-- right -->
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
                    <h5>Information</h5>
                </div>
                <div class="widget-content nopadding">
                    <div class="span5">
                        <div class="img">
                          <img id="output" src="" alt="">  
                        </div>
                        <div class=""  >
                          <input type="file" name="photo" accept="image/*" onchange="loadFile(event)">      
                        </div>
                       

                    <script>
                      var loadFile = function(event) {
                        var output = document.getElementById('output');
                         output.src = URL.createObjectURL(event.target.files[0]);
                       };
                    </script>
                    </div>
      
                    <div class=""  style="margin-bottom: 8px;">
                        <div class="control-group">
                          <div class="controls">
   
                          </div>
                          <div class="controls">
                            <input type="text" name="fullname" class="span11" placeholder="Full Name"  required pattern="[a-zA-Z ]+" required/>
                          </div>
                          <div class="controls">
                            <input type="text" data-date="01-02-2017" data-date-format="dd-mm-yyyy" placeholder="Date of Birth" name="birthday" class="datepicker span11" required>
                          </div>
                          <div class="controls">
                            <select class="span11" name="experience">
                              <option value="0"><a href="/EngineerManagement">No experience </a></option>
                              <option value="1">1 year</option>
                              <option value="2">More 2 years</option>
                              <option value="3">More 5 years</option>
                              <option value="4">More 10 years</option>
                            </select>
                          </div>
                        </div>
                    </div>

                </div>
              <div class="widget-title" style="margin-bottom: 10px;"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Status</h5>
              </div>
              <div class="widget-content nopadding">
               <div class="control-group">
                  <label class="control-label">Date Of Join</label>
                  <div class="controls">
                    <input type="text" placeholder="Date Of Join" data-date-format="dd-mm-yyyy" value="01-02-2017" name="datejoin" class="datepicker span11" required>
                  </div>
                </div>

              </div>
            </div> 
        </div>
        <!-- end-right -->
      <!-- left -->
    <div class="span6">
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-phone"></i> </span>
          <h5>Contact</h5>
        </div>

        <div class="widget-content nopadding">

          <div id="control" class="control-group">
            <label id="label" class="control-label">Address :</label>
            <div class="controls">
              <input id="input" type="text" name="address" class="span11" placeholder="Address"  required/>
            </div>
          </div>

          <div  id="control" class="control-group">
            <label id="label" class="control-label">Phone :</label>
            <div class="controls">
              <input id="input" type="number" name="phone" class="span11" placeholder="Phone" required/>
            </div>
          </div>

          <div id="control" class="control-group">
            <label id="label"  class="control-label">Email :</label>
            <div class="controls">
              <input id="input" type="email" name="email" class="span11" placeholder="Email" required/>
            </div>
          </div>
          
          <div class="widget-title" style="margin-bottom: 27px;"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Ability</h5>
           </div>
           <div  id="control" class="control-group" style="margin-bottom: 27px;">
            <label id="label" class="control-label">Technical Skill :</label>
            <div class="controls">
              <ul style="list-style-type: none; float: left; margin-left: -5px;">
                <li><input type="checkbox" name="techSkill[]" value="PHP"> PHP</li>
                <li><input type="checkbox" name="techSkill[]" value="JAVA"> JAVA</li>
                <li><input type="checkbox" name="techSkill[]" value=".NET"> .NET</li>
              </ul>
              <ul style="list-style-type: none; float: left;">
                <li><input type="checkbox" name="techSkill[]" value="Ruby"> Ruby</li>
                <li><input type="checkbox" name="techSkill[]" value="Android"> Android</li>
                <li><input type="checkbox" name="techSkill[]" value="IOS"> IOS</li>
              </ul> 
              <ul style="list-style-type: none; float: left;">
                <li><input type="checkbox" name="techSkill[]" value="HTML"> HTML</li>
                <li><input type="checkbox" name="techSkill[]" value="CSS"> CSS</li>
                <li><input type="checkbox" name="techSkill[]" value="JS"> JS</li>
              </ul>        
            </div>
          </div>
                   
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-actions">
            <button type="submit" name="submit" class="btn btn-success pull-right">Submit</button>
          </div>

        </div>
      </div>
      </div>
        <!-- end-left -->
       
   


     
    </form>
  </div>
  </div>
</div>
<script src="/js/matrix.form_common.js"></script>
@stop
