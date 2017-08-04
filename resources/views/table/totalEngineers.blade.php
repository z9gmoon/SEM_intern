<script  src="js/matrix.tables.js" sycn></script>
<div class="span12">
	<div class="widget-box">
	 <div class="widget-content nopadding">
		<table class="table table-bordered data-table">
			<h4 style="margin-left: 20px;">Total Engineers</h4>	
			<hr/>
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>Name</th>
		      <th>Email</th>
		      <th>Status</th>
		      <th>Technical Skill</th>
		      <th>Experience</th>
		    </tr>
		  </thead>
		  <tbody>
  		    @foreach ($list as $list)
		    <tr class="gradeX">
		      <td><a href="#product_view" data-toggle="modal" onclick="showDetailEngi('{{$list->idEngineer}}')">{{ $controller->idName($list->idEngineer) }}</a></td>
		      <td><a href="#product_view" data-toggle="modal" onclick="showDetailEngi('{{$list->idEngineer}}')">{{ $list->engineerName }}</a></td>
		      <td>{{ $list->Email }}</td>
		      <td>
		      	@if ($list->busy==0)
		    		<span id="lb-config" class="{{$controllerColor->changeColorStatusEngi($list->busy)}}">Available</span>
		    	@else
		    		<span id="lb-config" class="{{$controllerColor->changeColorStatusEngi($list->busy)}}">Active</span>
		    	@endif
		      </td>
		      <td>{{ $list->TechSkill }}</td>
		      <td>{{ $list->Experience }}</td>
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
