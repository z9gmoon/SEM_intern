{{--<script>--}}
{{--//    if id="current-member" place in <div class="row-fluid" >, it must add 2 event((".data-table").Datatable && Addmember.click)--}}
{{--</script>--}}
<script>
    $(document).ready(function() {
        var data_table=$(".data-table").DataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "sDom": '<""l>t<"F"fp>'
        });
        $('.add-member').on('click',function(){
            $('#modaladdTeam div.modal-footer a:eq(0)').hide();//default is hide
            $.ajax({
                url : "/Team/ListAvailable",
                type : "get",
                //dataType:"text",
                success:function(result){
                    $('#modaladdTeam .modal-body').html(result);
                    $('#modaladdTeam').modal();

                }
            });
        });
    });
</script>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <button class="btn btn-info add-member" style="margin: 3px 0px 0px 3px;">Add Member</button>
            <div style="display: none;" class="count-member">{{count($member)}}</div>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped data-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Member name</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Date Of Joining</th>
                    <th>View detail</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($member as $member)
                    <tr class="gradeX">
                        <td>{{$member->idEngineer}}</td>
                        <td>{{$member->engineerName}}</td>
                        <td>
                            {{--{{$member->role}}--}}
                            <select style="width: 86px" onchange="changeRole('{{$member->idEngineer}}',this.value)">
                                {{$teamEngi->showOptionRole($member->role)}}
                            </select>
                        </td>
                        <td><span class="label label-success">In Team</span></td>
                        <td>{{$member->DateOfJoining}}</td>
                        <td style="text-align: center"> <a onclick="infoEngiInTeam({{$member->idEngineer}})" ><i class="icon-edit"></i></a></td>
                        <td style="text-align: center"> <a href="javascript:void(0)" ><i class="icon-remove"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>