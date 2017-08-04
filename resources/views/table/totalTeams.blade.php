<script  src="js/matrix.tables.js" sycn></script>
<div class="span12">
	<div class="widget-box">
	 	<div class="widget-content nopadding">
	 		<table class="table table-bordered data-table">
		 		<h4 style="margin-left: 20px;">Total Teams</h4>	
				<hr/>
				<thead>
				    <tr>
				        <th>ID</th>
				        <th>Team name</th>
				        <th>Technical Skill</th>
				        <th>Status</th>
				    </tr>
				</thead>
				<tbody>
					@foreach ($list as $list)
				    <tr class="gradeX">
				        <td><a onclick="showDetailTeam('{{$list->idTeam}}')" href="javascript:void(0)">{{ $controller->idName($list->idTeam) }}</a></td>
				        <td><a onclick="showDetailTeam('{{$list->idTeam}}')" href="javascript:void(0)">{{ $list->teamName }}</a></td>
				        <td>{{ $list->techSkill }}</td>

				        <td><span id="lb-config" class="{{$controllerColor->changeColor($list->status)}}">{{ $list->status }}</span></td>

				    </tr>
				    @endforeach
				</tbody>
			</table>	
		</div>
	</div> 
</div> 
    <div id="showDetail_Team" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>INFO TEAM</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer"> <a data-dismiss="modal" class="btn" href="#">OK</a> </div>
    </div>