<script  src="js/matrix.tables.js"></script>

 <div class="span12">
	<div class="widget-box">
	 <div class="widget-content nopadding">
		<table class="table table-bordered data-table">
			<h4 style="margin-left: 20px;">Available Engineers</h4>	
			<hr/>
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>Name</th>
		      <!-- <th>Email</th> -->
		      <th>Status</th>
		      <th>Technical Skill</th>
		      <th>Time Not Joining</th>
		    </tr>
		  </thead>
		  <tbody>
	    @foreach ($listEngineer as $Engineer)
	    <tr class="gradeX">

	      <td><a href="#product_view" data-toggle="modal" onclick="showDetailEngi('{{$Engineer->idEngineer}}')">{{ $controllerIDEngi->idName($Engineer->idEngineer) }}</a></td>

	      <td><a href="#product_view" data-toggle="modal" onclick="showDetailEngi('{{$Engineer->idEngineer}}')">{{ $Engineer->engineerName }}</a></td>
	      <!-- <td>{{ $Engineer->Email }}</td> -->
	      <td>
			<span id="lb-config" class="{{$controllerColor->changeColorStatusEngi($Engineer->busy)}}">Available</span> 
	      </td>
	      <td>{{ $Engineer->TechSkill }}</td>
	      <td>{{ $getTime->date($Engineer->timeNotJoining,$Engineer->DateOfJoining) }}</td>
	    </tr>
	    @endforeach
		  </tbody>
		</table>
	</div>   
	</div> 

</div> 
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

