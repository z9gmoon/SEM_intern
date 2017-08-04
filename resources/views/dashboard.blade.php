@extends('template.menubar')

@section('content')

	<div id="content">
		<div id="content-header">		
		      <div id="breadcrumb"> <a href="#" title="Go to Home" class="current"><i class="icon-home"></i> Home</a></div>
		    </div>  
			<!-- information -->
			  <div class="container-fluid">
		      <div class="widget-box" style="margin-left: -5px;">
		        <div class="widget-title bg_lg" onclick="load_AvailableEngineer()" style="cursor: pointer;"><span class="icon"><i class="icon-signal"></i></span>
		          <h5>Information</h5>
		        </div>
		        <div class="widget-content" >
		          <div class="row-fluid">
		            <div class="span10" id="changetable" onload="load_AvailableEngineer()" >
		     			<!-- content_table -->			
		            </div>
		            <div class="span2">
		             	<ul class="btGroup">
		             	 	<li>
 		 	            	 	<button onclick="load_TotalEngineer()" id="btTotal" class="btn-success">
 		 	            	 		<i class="icon-user"></i>
 		 	            	 		<strong>
 		 	            	 			{{ $totalEngineer }}										
 		 	            	 		</strong>
 		 	            	 	<br>Total Engineers</button>
		             	 	</li>
	             	 	 	<li>
	             	 	 		<button onclick="load_TotalTeam()" id="btTotal" class="btn-success">
	             	 	 			<i class="icon-group"></i>
	             	 	 			<strong>{{ $totalTeam }}</strong>
	             	 	 		<br>Total Teams</button>
	             	 	 	</li>
             	 	 	 	<li>
             	 	 	 		<button onclick="load_TotalProject()" id="btTotal" class="btn-success"	>
             	 	 	 			<i class="icon-book"></i>
             	 	 	 			<strong>{{ $totalProject }}</strong>
             	 	 	 		<br>Total Projects</button>
         	 	 	 		</li>
<!--              	 	 	 	<li>
             	 	 	 		<button onclick="load_AvailableEngineer()" id="btTotal" class="btn-success"	>
             	 	 	 			<i class="fa-user-circle-o "></i>
             	 	 	 			<strong>{{ $totalProject }}</strong>
             	 	 	 		<br>Available Engineers</button>
         	 	 	 		</li> -->
		             	</ul> 
		            </div>
		          </div>
		        </div>
		      </div>
		
			<!-- end-information -->
			<!-- top engineer -->
		
		<div class="span7" style="margin: -20px 0px 0px -5px;">
	        <div class="widget-box widget-chat">
	          <div class="widget-title bg_lb"> <span class="icon"> <i class="icon-star"></i> </span>
	            <h5>Top Engineers</h5>
	          </div>
	          <div class="widget-content nopadding collapse in" id="collapseG4">
	            <div class="chat-users panel-right2">
	              <div class="panel-content nopadding">
	                <ul class="contact-list">     
	                  <li id="user1" class="online">

	                  	<a id="one" onclick="load_TableTopEngineer({{ $topEngineer[0]->idEngineer }})"><img alt="" src="{{asset('img/demo/av2.jpg')}}" /> <span>{{ $topEngineer[0]->engineerName }}</span></a><span class="msg-count badge badge-info">1</span>
	                  </li>
	                  
	                  <li id="user2"  class="online">
	                  	<a id="one" onclick="load_TableTopEngineer({{ $topEngineer[1]->idEngineer }})"><img alt="" src="{{asset('img/demo/av4.jpg')}}" /> <span>{{ $topEngineer[1]->engineerName }}</span></a><span class="msg-count badge badge-info">2</span>
	                  </li>
	                  
	                  <li id="user3"  class="online">
	                  	<a id="one" onclick="load_TableTopEngineer({{ $topEngineer[2]->idEngineer }})"><img alt="" src="{{asset('img/demo/av4.jpg')}}" /> <span>{{ $topEngineer[2]->engineerName }}</span></a><span class="msg-count badge badge-info">3</span>
	                  </li>
	                  
	                  <li id="user4"  class="online">
	                  	<a id="one" onclick="load_TableTopEngineer({{ $topEngineer[3]->idEngineer }})"><img alt="" src="{{asset('img/demo/av1.jpg')}}" /> <span>{{ $topEngineer[3]->engineerName }}</span></a><span class="msg-count badge badge-info">4</span>
	                  </li>
	                  
	                  <li id="user5"  class="online">
	                  	<a id="one" onclick="load_TableTopEngineer({{ $topEngineer[4]->idEngineer }})"><img alt="" src="{{asset('img/demo/av1.jpg')}}" /> <span>{{ $topEngineer[4]->engineerName }}</span></a><span class="msg-count badge badge-info">5</span>


	                  </li>
	                  
	                </ul>
	              </div>
	            </div>
	            <div class="chat-content panel-left2">
	              <div class="chat-messages" id="chat-messages">
	                <div id="changeTopEngineer">
	                	<!-- content-topengineer -->
	                	<div class="span2" style="width: 200px;height: 230px; margin-left: -25px;">
								<img src="{{asset('upload')}}/{{ $topEngineer[0]->avatar }}" alt="" style="width: 200px;height: 230px;">
						</div>
						<div class="span3" style="margin-left: 0px;margin-top: -15px;">
							<div class="widget-box">
									 <div class="widget-content nopadding">
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td><h4>{{ $topEngineer[0]->engineerName }}</h4></td>
													</tr>
													<tr>
														<td><h6>{{ $topEngineer[0]->TechSkill }}</h6></td>
													</tr>
													<tr>
														<td><h6>{{ $topEngineer[0]->Experience }}</h6></td>
													</tr>
													<tr>
														<td><h6>Have joined {{ $topEngineer[0]->total }} projects</h6></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>		
								</div>	
	              		  	</div>
	             		 </div>
	            	</div>
	          	</div>
	        </div>
	        </div>
	        <!-- end- top engineer -->
	        <!-- new project -->
	        <div class="span3" style="margin: -20px 0px 0px 5px;">
	        <div class="widget-box">
	          <div class="widget-title"> <span class="icon"><i class="icon-tasks"></i></span>
	            <h5>New Projects</h5>
	          </div>
	          <div class="widget-content">
	            <div class="todo">
	              <ul>
	              	@foreach($newProject as $_pro)
	                <li class="clearfix">
	                  <div class="txt"><a href="#myDetailProject" data-toggle="modal" onclick="showDetailProject('{{$_pro->idProject}}')"> {{ $_pro->projectName }} </a><span class="date badge badge-important">New</span> </div>
	                </li>
	                @endforeach
	              </ul>
	            </div>
	          </div>
	        </div>
	     </div>   
        <!-- end-new project <--></-->
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
	</div>
	</div>
  <div id="myModal" class="modal fade">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3></h3>
        </div>
        <div class="modal-body">
        </div>
  </div>
	@if((isset($birthday[0])!=NULL)||(isset($newEngineerNoti[0])!=NULL)||(isset($newProjectNoti[0])!=NULL)||(isset($newTeamNoti[0])!=NULL)))
		<link rel="stylesheet" href="{{asset('css/jquery.gritter.css')}}"/>  
	    <script src="{{asset('js/jquery.peity.min.js')}}"></script>
	    <script src="{{asset('js/jquery.gritter.min.js')}}"></script>
		<script type="text/javascript">
			birthday = "{{ $birthday }}";console.log(birthday);
			newEngi = "{{ $newEngineerNoti }}";console.log(newEngi);
			newPro = "{{ $newProjectNoti }}";console.log(newPro);
			newTeam = "{{ $newTeamNoti }}";console.log(newTeam);
		</script>
		<script src='{{asset("js/matrix.interface.js")}}'></script> 
	@endif
@stop