<script>
    $(document).ready(function(){
        $(".table-engi-old").DataTable({
            "bJQueryUI": true,//reUI style for entries field
            "sPaginationType": "full_numbers",//show number in pagination
            "sDom": '<""l>t<"F"fp>'//restyle,pos for pagination
        });
        $('select').select2();
    });
</script>
@if(count($oldMember)>0)
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <label class="label label-info">OLD MEMBER</label>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped table-engi-old">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Date left</th>
                        <th>View detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($oldMember as $member)
                        <tr class="gradeX">
                            <td>{{$member->idEngineer}}</td>
                            <td>{{$member->engineerName}}</td>
                            <td>{{$member->role}}</td>
                            <td><span class="label label-important">has left Team</span></td>
                            <td>{{$member->expire}}</td>
                            <td style="text-align: center"> <a onclick="infoEngiInTeam({{$member->idEngineer}})" ><i class="icon-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif