<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Project;
use App\Engineer;
use App\Http\Controllers\TeamEngiController;
use App\lib\changeIDTeam;
use App\lib\changeColorStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{   protected $redirectTo = '/';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function IndexTm(){
        $controller = new changeIDTeam();
        $datas = DB::table('Team')->get();
        $_totalTeam = $this->totalTeam();
        $_totalProject = $this->totalProject();
        $_totalEngineer = $this->totalEngineer();
        $controllerColor = new changeColorStatus();
        return view('team.IndexTeamManager',['data'=>$datas,
                                             'totalEngineer' => $_totalEngineer,
                                             'totalTeam' => $_totalTeam,
                                             'totalProject' => $_totalProject,
                                             'controllerTeam' => $controller,
                                             'controllerColor' => $controllerColor]);
    }
    public function AddTm(){
        $_totalTeam = $this->totalTeam();
        $_totalProject = $this->totalProject();
        $_totalEngineer = $this->totalEngineer();
        $_listProject = DB::table('Project')->select('idProject','projectName')->where('idTeam','')->get();//get list project Name with no team
        $_techSkill = DB::table('Technical')->select('Technical')->get();
        return view('team.FormInsertTeam')->with(['totalEngineer' => $_totalEngineer,
                                                  'totalTeam' => $_totalTeam,
                                                  'totalProject' => $_totalProject,])->with(['projects'=>$_listProject,'listTech'=>$_techSkill]);
    }

    public function AddTeam(Request $request){
        $datas = $request->all();
        $team = new Team;
        // $team -> idTeam = $datas['idTeam'];
        $team -> teamName = $datas['teamName'];
//        $team -> techSkill = $datas['techSkill'];
        $team -> techSkill = (count($datas['techSkill'])<=1)?$datas['techSkill'][0]:implode(" - ",$datas['techSkill']);
        $team -> status = "New";//Assigned, In progress , Resolved
//        $project_select = $datas['project_choice'];
//        if(!empty($project_select)){
//            $project=DB::table("Project")->where('idProject',$project_select);
//            $project->update(['idTeam'=>$datas['idTeam']]);
//        }
        $team->save();
        //return $this->IndexTm();
        return redirect('TeamManagement')->with('notify','Add Successfully a new Team!');
    }
//    public function EditTm(){
        public function EditTm($id){
        $_totalTeam = $this->totalTeam();
        $_totalProject = $this->totalProject();
        $_totalEngineer = $this->totalEngineer();
        $controllerColor = new changeColorStatus();

        $controller = new changeIDTeam();//change id 1 to T001
        $team = DB::table('Team')->where('idTeam',$id)->first();


        $_current_project=DB::table('Project')->select('idProject','projectName')->where('idTeam',$id)->get();

        $_hasProject=false;$_listProject = "No project";
        if(count($_current_project)){//means 1 team has 1 project
            $_listProject = $_current_project;//name project has been received
            $_hasProject=true;
        }
//        else
//        $_listProject = DB::table('Project')->select('idProject','projectName')->where('idTeam','')->get();//get list project Name with no team

//            dd(($_listProject));
        $_techSkill = DB::table('Technical')->select('Technical')->get();
        $teamMember = DB::table('History')->select('History.idEngineer','Engineer.engineerName','History.role','History.DateOfJoining')->
                        join('Engineer','History.idEngineer','=','Engineer.idEngineer')->where('idTeam',$id)->whereNull('expire')->get();
            //SELECT History.idEngineer, Engineer.engineerName , History.role from History INNER JOIN Engineer on History.idEngineer=Engineer.idEngineer where History.`idTeam` = 'T01'
        $oldMember = (new TeamEngiController)->listOldEngineer($id);//show old member(not in Team now):result table
        $teamEngiCrl = new TeamEngiController;
        return view('team.FormEditTeam')->with(['totalEngineer' => $_totalEngineer,
                                                'totalTeam' => $_totalTeam,
                                                'totalProject' => $_totalProject,
                                                'controllerColor' => $controllerColor,
                                                'controllerTeam' => $controller,
                                                'team' =>$team,'member'=>$teamMember,'oldMember'=>$oldMember,'teamEngi'=>$teamEngiCrl])
                                                ->with(['projects'=>$_listProject,'hasProject'=>$_hasProject,'listTech'=>$_techSkill]);
    }

    public function EditTeam(Request $request,$id){
        $datas = $request->all();
//        dd($datas);
//        $_team = DB::table('Team')->where('idTeam',$id)->first();
        $team = DB::table('Team')->where('idTeam',$id);

//        $project_select = $datas['project_choice'];
//        if(!empty($project_select)){
//            $project=DB::table("Project")->where('idProject',$project_select);
////            $project->update(['idTeam'=>$datas['idTeam']]);
//            $project->update(['idTeam'=>$id]);
//        }

        $techSkill = (count($datas['techSkill'])<=1)?$datas['techSkill'][0]:implode(" - ",$datas['techSkill']);
        $team->update(['teamName'=>$datas['teamName'],'techSkill'=>$techSkill]);
//        return redirect("EditTeam/$id");
        return redirect('TeamManagement')->with('notify','Update Successfully the Team!');
    }

    public function DelTm(Request $request, $id){
//       DB::table('Team')->where('idTeam',$id)->delete();
//        return redirect('TeamManagement');//because using ajax
         $result =  DB::table('Team')->where('idTeam',$id)->delete();
          return $result;
    }

    public function showDetailTeam(Request $request){
        $id = $request->all()['idTeam'];
        $team = DB::table('Team')->where('idTeam',$id)->first();
        $_current_project=DB::table('Project')->select('idProject','projectName')->where('idTeam',$id)->get();
        $_hasProject=false;$_listProject = "No project";
        if(count($_current_project)){
            $_listProject = $_current_project;
            $_hasProject=true;
        }
        $_techSkill = DB::table('Technical')->select('Technical')->get();
        $teamMember = DB::table('History')->select('History.idEngineer','Engineer.engineerName','History.role')->
        join('Engineer','History.idEngineer','=','Engineer.idEngineer')->where('idTeam',$id)->whereNull('expire')->get();
        return view('team.showDetailTeam')->with(['team' =>$team,'member'=>$teamMember,'projects'=>$_listProject,'hasProject'=>$_hasProject,'listTech'=>$_techSkill]);
    }
    public function totalEngineer(){
      $_engineer = new Engineer();
      $_totalEngineer = $_engineer->count();
      return $_totalEngineer;
    }

    public function totalProject(){
      $_project = new Project();
      $_totalProject = $_project->count();
      return $_totalProject;
    }

    public function totalTeam(){
      $_team = new Team();
      $_totalTeam = $_team->count();
      return $_totalTeam;
    }
}
