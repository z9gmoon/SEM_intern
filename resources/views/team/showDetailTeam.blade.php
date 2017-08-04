<form class="form-horizontal">
    <div class="control-group">
        <label class="control-label">ID :</label>
        <div class="controls">
            {{$team->idTeam}}
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Team Name :</label>
        <div class="controls">
            {{$team->teamName}}
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Total member :</label>

        <div class="controls count_member">
            {{count($member)}}
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="project_choice">Name of Project :</label>
        <div class="controls" id="project_name">
            @if($hasProject==true)
                <input type="text" disabled data-val="{{$projects[0]->idProject}}" value="{{$projects[0]->projectName}}"/>
            @else
                <label for="" data-val="0">{{$projects}}</label>
            @endif
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Technical Skill :</label>
        <div class="controls" id="tech">
            <?php
               $techs= $team->techSkill;$techs = (strpos($techs," - ")!=false)
                    ?explode(" - ",$techs):str_split($techs,strlen($techs));//explode not allowed ""
            ?>
                @foreach($techs as $tech)
                    <span class="label label-info">{{$tech}}</span>
                @endforeach
        </div>
    </div>
</form>
<br>
<div class="control-group">
    <label class="control-label">Current Engineer List</label>
</div>

<div class="row-fluid" id="current-member">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped data-table-showDetail">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member name</th>
                        <th>Role</th>
                        <th>View detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($member as $member)
                        <tr class="gradeX">
                            <td>{{$member->idEngineer}}</td>
                            <td>{{$member->engineerName}}</td>
                            <td>{{$member->role}}</td>
                            <td style="text-align: center"> <a onclick="infoEngiInTeam({{$member->idEngineer}})" ><i class="icon-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".data-table-showDetail").DataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "sDom": '<""l>t<"F"fp>'
        });

        $('select').select2();
    });
</script>