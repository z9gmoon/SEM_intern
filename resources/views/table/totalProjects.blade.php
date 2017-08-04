<script  src="js/matrix.tables.js"></script>

<div class="span12">
	<div class="widget-box">
		 <div class="widget-content nopadding">
		 	<table class="table table-bordered data-table">
			 	<h4 style="margin-left: 20px;">Total Projects</h4>	
				<hr/>
				<thead>
				  <tr>
				    <th>ID</th>
				    <th>Project Name</th>
				    <th>Status</th>
				    <th>Technical Skill</th>
				    <th>Date Of Begin</th>
				    <th>Date Of End</th>
				  </tr>
				</thead>
				<tbody>
				@foreach ($list as $listPro)	
				 <tr class="gradeX">
				    <td><a href="#myDetailProject" data-toggle="modal" onclick="showDetailProject('{{$listPro->idProject}}')">{{ $controller->idName($listPro->idProject) }}</a></td>
				    <td><a href="#myDetailProject" data-toggle="modal" onclick="showDetailProject('{{$listPro->idProject}}')">{{ $listPro->projectName }}</a></td>
				    <td class="status"><span id="lb-config" class="{{ $controllerColor->changeColor($listPro->status) }}">{{ $controllerStt->getStatus($listPro->status) }}</span></td>

				    <td>{{ $listPro->techSkill }}</td>
				    <td>{{ $listPro->dateOfBegin }}</td>
				    <td>{{ $listPro->dateOfEnd }}</td>
				  </tr>
				 @endforeach
				</tbody>
			</table>
		</div>
	</div> 
</div>
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



