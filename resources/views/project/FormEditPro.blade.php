@extends('template.menubar')

@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/ProjectManagement" class="tip-bottom">Project Management</a> <a href="#" class="current">Edit Project</a> </div>
  <h1>Edit Project</h1>
</div>

<?php

  $listPro = DB::table('Project')->where('idProject', '=', $oneProject)
  ->get();
 // echo $listPro;

  //------JSON->PHP
echo '<hr>';
$decoded = json_decode($listPro, true);
//print_r($decoded);
//echo $decoded[0]['idProject'];

//-----------END JSON=>PHP

  // Dạng Mảng
// var_dump(json_decode($listPro, true));
// echo json_encode($listPro); 

 ?>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Information about the Project </h5>
        </div>
        <div class="widget-content nopadding">

          <form action="/EditProject/{{$decoded[0]['idProject']}}" method="post" class="form-horizontal">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
       
            <!-- ahihi -->
            <div class="control-group">
              <label class="control-label">Project ID :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="idProject" name="idProject" value= "{{ $controllerIDPro->idName($decoded[0]['idProject']) }}" disabled="disabled" />
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Project Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="projectName" name="projectName" required pattern="[a-zA-Z0-9 ]+" value= "{{ $decoded[0]['projectName'] }} " required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls" >
                    <select name= "status" id="sts_project">
                    {{--<option value="{{$decoded[0]['status']}}" >--}}
                      
                         <?php 
                      //    switch( {{ $decoded[0]['status'] }} ) {
                      //     case '0': echo 'New'; break;
                      //     case '1':  echo 'Assigned'; break;
                      //     case '2': echo 'Feedback'; break;
                      //     case '3':   echo 'In progress'; break;
                      //     case '4':   echo 'Resolve'; break;
                      // } 
                      ?>

                      {{--</option>--}}

                  
                  <option value="0">New</option>
                  <option value="1">Assigned</option>
                  <option value="2">Feedback</option>
                  <option value="3">In progress</option>
                  <option value="4">Resolved</option>

                  <?php
                    $status = $decoded[0]['status'];
                  ?>            
                  <script>
                    document.getElementById('sts_project').value={{$status}};
                  </script>
                </select>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Technical Skill :</label>
              <div class="controls">
                

              <select name= "techSkill">

                  @if($Techni->count() > 0)
                  @foreach($Techni as $Tech)
                   <option value="{{$Tech->Technical}}">{{$Tech->Technical}}</option>
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
                <input type="text"  data-date-format="yyyy-mm-dd" class="datepicker span11" name="dateOfBegin" value= "{{ $decoded[0]['dateOfBegin'] }}" required>
                <span class="help-block">Date with Formate of  (yyyy-mm-dd)</span> </div>
            </div>

            <div class="control-group">
             <label class="control-label">Date Of End :</label>
            <div class="controls">
                <input type="text"  data-date-format="yyyy-mm-dd" class="datepicker span11" name="dateOfEnd" value= "{{ $decoded[0]['dateOfEnd'] }}" required>
                <span class="help-block">Date with Formate of  (yyyy-mm-dd</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Customer :</label>
              <div class="controls">
                <input type="text" class="span11" name= "customer_code" value= "{{ $decoded[0]['customer_code'] }}" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">ID Team :</label>
              <div class="controls">
            
                  @if($decoded[0]['idTeam'] == NULL)
                    
                    <select name= "idTeam">

                      @foreach($getIdTeam as $getId)
                      
                        <option value="{{$getId->idTeam}}">{{ $getId->teamName }}</option>                      
                     
                      @endforeach
                     </select>
                  
                  @elseif ($decoded[0]['idTeam'] != NULL)


                  <!-- <input type="text" class="span11" name= "idTeam" readonly="readonly" value= "{{$controllerIDTeam->idName($decoded[0]['idTeam']) }}" /> -->
                        
                        <input type="text" class="span11" name= "idTeam" readonly="readonly" value= "{{$controllerIDTeam->idName($decoded[0]['idTeam']) }}" />

                  
                  @endif   
                  
                

              </div>
             <!--    <input type="text" class="span11" name= "idTeam" value= "{{ $decoded[0]['idTeam'] }}" /> -->
              </div>
            </div>
            <div class="form-actions">

                <div style="text-align: center">
                    <button type="submit" class="btn-success" >Submit</button>
                </div>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="{{asset('js/matrix.form_common.js')}}"></script>

@stop
