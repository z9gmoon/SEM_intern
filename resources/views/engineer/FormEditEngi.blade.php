@extends('template.menubar')

@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/EngineerManagement" class="tip-bottom">Engineer Management</a> <a href="#" class="current">Edit Engineer</a> </div>
  <h1>Edit Engineer</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <form action="/EditEngineer/{{$list->idEngineer}}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
     <!-- right -->
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
                    <h5>Information</h5>
                </div>
                <div class="widget-content nopadding">
                    <div class="span5">
                        <div class="img">
                        @if(!($list->avatar))
                        <img id="output" src="" alt="">
                        @else
                        <img id="output" src="{{ asset('upload/' . $list->avatar) }}" alt="">  
                        @endif
                        </div>
                        <div class=""  >
                          <input type="file" name="photo" accept="image/*" placeholder="" accept="image/*" onchange="loadFile(event)">      
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
                        <!--     <input type="text" name="id" class="span11" placeholder="ID" required="" /> -->
                          </div>
                          <div class="controls">
                            <input type="text" name="fullname" class="span11" placeholder="Full Name" required pattern="[a-zA-Z ]+" value="{{$list->engineerName}}" />
                          </div>
                          <div class="controls">
                            <input type="text" data-date-format="yyyy-mm-dd" placeholder="Date of Birth" name="birthday" class="datepicker span11" value="{{$list->birthday}}" required>
                          </div>
                          <div class="controls">
                            <select class="span11" name="experience" id="experience">
                              <option value="0">No experience</option>
                              <option value="1">1 year</option>
                              <option value="2">More 2 years</option>
                              <option value="3">More 5 years</option>
                              <option value="4">More 10 years</option>
                            <script>
                              var exp = "{{$list->Experience}}";  
                              var val; 
                              switch (exp){
                                case "No experience": val = 0;
                                break;
                                case "1 year": val = 1;
                                break;
                                case "More 2 years": val = 2;
                                break;
                                case "More 5 years": val = 3;
                                break;
                                case "More 10 years": val = 4;
                                break;
                                default:
                                break;
                              }
                              $(document).ready(function(){
                                $("#experience").val(val);
                              });

                            </script>
                            </select>
                      
                          </div>
                           <div class="controls">
                            <select class="span11" name="status" id="status">
                              <option value="1">In Company</option>
                              <option value="0">Left</option>
                              
                            <script>
                              var exp = "{{$list->status}}";  
                              var val; 
                              switch (exp){
                                case "1": val = 1;
                                break;
                                case "0": val = 0;
                                break;
                                default:
                                break;
                              }
                              $(document).ready(function(){
                                $("#status").val(val);
                              });

                            </script>
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

                    <input type="text" placeholder="Date Of Join" data-date-format="yyyy-mm-dd" name="datejoin" class="datepicker span11" value="{{$list->dateJoin}}" required="">

                  </div>
                </div>
                <div class="control-group" style="margin-bottom: 10px;">
                  <label class="control-label">Date Of Out</label>
                  <div class="controls">
                    <input type="text" placeholder="Date Of Out" data-date-format="yyyy-mm-dd" name="dateout"   class="datepicker span11" value="{{$list->outOfDate}}">
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
              <input id="input" type="text" name="address" class="span11" placeholder="Address" value="{{$list->Address}}" required/>
            </div>
          </div>

          <div  id="control" class="control-group">
            <label id="label" class="control-label">Phone :</label>
            <div class="controls">
              <input id="input" type="number" name="phone" class="span11" placeholder="Phone" value="{{$list->Phone}}" required/>
            </div>
          </div>

          <div id="control" class="control-group">
            <label id="label"  class="control-label">Email :</label>
            <div class="controls">
              <input id="input" type="email" name="email" class="span11" placeholder="Email" value="{{$list->Email}}" required/>
            </div>
          </div>
          
          <div class="widget-title" style="margin-bottom: 27px;"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Ability</h5>
           </div>
           <div  id="control" class="control-group" style="margin-bottom: 27px;">
            <label id="label" class="control-label">Technical Skill :</label>
            <div class="controls" id="tech">
              <ul style="list-style-type: none; float: left; margin-left: -5px;">

                <li><input type="checkbox" name="techSkill[]" value="PHP"> PHP</li>
                <li><input type="checkbox" name="techSkill[]" value="JAVA"> Java</li>
                <li><input type="checkbox" name="techSkill[]" value=".NET"> .Net</li>

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
               <script>
                  var techs="{{$list->TechSkill}}";console.log(techs);
                  techs=(techs.indexOf(" - ")>-1)?techs.split(" - "):techs.split();
                  console.log(techs.length);
                  $(document).ready(function(){
                      for(techSkill=1;techSkill<techs.length;techSkill++){
                          $("#tech input[value='"+techs[techSkill]+"']")[0].click();//must have [0]
           
                      }
                  });
              </script>        
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
