@extends('template.menubar')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/TeamManagement" class="current">Teams Management</a> </div>
            <h1>Teams Management</h1>
        </div>
        <div class="container-fluid">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors -> all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('notify'))
                    <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>

                        <h4 class="alert-heading">Success!</h4>
                        {{session('notify')}}
                     </div>
            @endif
            <div id="alert_del_team"></div>
            <hr>
            {{--<div style="width: 150px;float: left; margin-bottom: 5px;">--}}
                {{--<label for="">Technical Skill</label>--}}
                {{--<select name="">--}}
                    {{--<option value="">PHP</option>--}}
                    {{--<option value="">Java</option>--}}
                    {{--<option value="">C++</option>--}}
                    {{--<option value="">.Net</option>--}}
                    {{--<option value="">Ruby</option>--}}
                    {{--<option value="">Android</option>--}}
                {{--</select>--}}
            {{--</div>--}}
            <!-- <div style="width: 150px;float: left; margin-bottom: 5px;">
                <label for="">Technical Skill</label>
                <select name="">
                    <option value="">PHP</option>
                    <option value="">Java</option>
                    <option value="">C++</option>
                    <option value="">.Net</option>
                    <option value="">Ruby</option>
                    <option value="">Android</option>
                </select>
            </div> -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <a href="/AddTeam"><button class="btn btn-info" style="margin: 3px 0px 0px 3px;">Add Team</button></a>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Team name</th>
                                    <th>Status</th>
                                    <th>Technical Skill</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $data)
                                <tr class="gradeX {{$data->idTeam}}" data-val="{{$data->idTeam}}">
                                    <td><a href="javascript:void(0)">{{$controllerTeam->idName($data->idTeam)}}</a></td>
                                    <td><a href="javascript:void(0)">{{$data->teamName}}</a></td>
                                    <td><span id="lb-config" class="{{$controllerColor->changeColor($data->status)}}">{{$data->status}}</span></td>
                                    <td>{{$data->techSkill}}</td>
                                    <td style="text-align: center;"> <a href="/EditTeam/{{$data->idTeam}}" ><i class="icon-edit"></i></a></td>
                                    {{--<td style="text-align: center;"> <a onclick="showDialog()" href="/DelTeam/{{$data}}" ><i class="icon-remove"></i></a></td>--}}
                                    {{--<td style="text-align: center;"> <a onclick="showDialog()" href="#" ><i class="icon-remove"></i></a></td>--}}
                                    {{--<td style="text-align: center;"> <a href="#myAlert" data-toggle="modal" class="btn btn-warning"><i class="icon-remove"></i></a></td>--}}
                                    <td style="text-align: center;"> <a href="#myAlert" data-toggle="modal" onclick="IdToModal('{{$data->idTeam}}',this)"><i class="icon-remove"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- <div id="white-background">
</div>
<div id="dlgbox">
  <div id="dlg-header">
    Delete Project
  </div>
  <div id="dlg-body">
    Are you sure that you want to delete this project?
  </div>
  <div id="dlg-footer">
    <button onclick="dlgDelPro()" >Yes</button>
    <button onclick="dlgCancelPro()">No</button>
  </div>
</div> -->
    <div id="myAlert" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Delete Team</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure that you want to delete this team?</p>
        </div>
        <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div>
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
    <div id="modalengiInfo" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Info Engineer</h3>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer"><a data-dismiss="modal" class="btn" href="#">Close</a> </div>
    </div>
@stop
