 <div class="span2" style="width: 200px;height: 230px; margin-left: -25px;">
	<img src="{{asset('upload')}}/{{ $top[0]->avatar }}" alt="" style="">
</div>
<div class="span3" style="margin-left: 0px;margin-top: -15px;">
	<div class="widget-box">
			 <div class="widget-content nopadding">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td><h4>{{ $top[0]->engineerName }}</h4></td>
					</tr>
					<tr>
						<td><h6>{{ $top[0]->TechSkill }}</h6></td>
					</tr>
					<tr>
						<td><h6>{{ $top[0]->Experience }}</h6></td>
					</tr>
					<tr>
						<td><h6>Have {{ $top[0]->total }} projects</h6></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>		
</div>	