<?php

namespace App\Http\Controllers;

use App\Mail\InformUser;
use Illuminate\Http\Request;
use App\Team;
use App\Project;
use App\Engineer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class TeamEngiController extends Controller
{
    //
    public function showEngineerAvailable(){
        $engi = DB::table('Engineer')->whereNull('busy')->orWhere('busy',0)->get();
        return view('team.listEngiAvailable',['engineers'=>$engi]);
    }

    public function addEngineerToTeam(Request $request){
//        print_r($request->all());
        $res = $request->all();
        $listidEngineer = $res['listEngi'];
        $listNameEngineer = $res['listNameEngi'];
        $listEmailEngineer = $res['listEmailEngi'];
        $teamName = $res['nameTeam'];
        $projectName = $res['nameProject'];

        $idProject = ($res['idProject']!='0')?$res['idProject']:"";//not be null(idProject in DB is not null)
        $idTeam = $res['idTeam'];
        $dataToInsert=[];
        foreach($listidEngineer as $engineer)
            array_push($dataToInsert,['idEngineer'=>$engineer,'idProject'=>$idProject,
                'idTeam'=>$idTeam,'role'=>'coder','DateOfJoining'=>Carbon::today()]);

        $mailable = new InformUser($teamName, $listNameEngineer, $idProject);
       Mail::to($listEmailEngineer)->send($mailable);
        if(count(Mail::failures()) <= 0) {
////        print_r($dataToInsert);
            DB::table('Engineer')->whereIn('idEngineer', $listidEngineer)->update(['busy' => 1]);
            DB::table('History')->insert($dataToInsert);
//        DB::table('History')->where('idHistory',30)->update(['expire'=>Carbon::today()]);
//        DB::table('History')->where('idHistory',30)->update(['expire'=>DB::raw('current_date')]);//ok


//        $list_mail = DB::table('Engineer')->select('Email')->whereIn('idEngineer',$listEngineer);
//        $mailable = new InformUser($dataToInsert);
//        Mail::to($list_mail)->send($mailable);


        }
    }

    public function removeEngineerFromTeam(Request $request){
        $res = $request->all();

        $result = DB::table("History")->where('idEngineer',$res['idEngineer'])->where('idTeam',$res['idTeam'])
            ->update(['expire'=>Carbon::today()]);
        if(!$result) return 0;
        $result = DB::table('Engineer')->where('idEngineer',$res['idEngineer'])->update(['busy'=>0]);
        if(!$result) return 0;
        return 1;

    }

    public function showCurrentEngineer($id){
        $teamMember = DB::table('History')->select('History.idEngineer','Engineer.engineerName','History.role','History.DateOfJoining')->
        join('Engineer','History.idEngineer','=','Engineer.idEngineer')->where('idTeam',$id)->whereNull('expire')->get();
        return view('team.listEngiCurrent')->with(['member'=>$teamMember,'teamEngi'=>$this]);
    }

    public function listOldEngineer($id){
        return DB::select( DB::raw("SELECT History.idEngineer,Engineer.engineerName,idTeam,role,DateOfJoining,MAX(expire) as expire FROM History
              INNER JOIN Engineer on History.idEngineer=Engineer.idEngineer WHERE expire is not Null and idTeam = '$id'
              AND History.idEngineer NOT IN (SELECT idEngineer FROM History WHERE expire IS NULL) GROUP BY idEngineer"));
        //condition:if 1 member in/out with 2 times up->choice bigger;if member in team->remove result in oldMember;get name
    }

    public function showOldEngineer($id){
        return view('team.listEngiOld')->with(['oldMember'=>$this->listOldEngineer($id)]);
    }

    public function changeRole(Request $request){
//        dd($request->all());
        $res = $request->all();echo "aa";
        DB::table('History')->where('idEngineer',$res['idEngineer'])->whereNull('expire')->update(['role'=>$res['value']]);
    }

    public static function showOptionRole($rol){
        $roles = ['coder','manager','tester'];

        foreach($roles as $role){
            if($role==$rol)
                echo "<option value='$role' selected>$role</option>";
            else echo "<option value='$role'>$role</option>";
        }
    }
}
