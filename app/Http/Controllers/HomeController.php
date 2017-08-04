<?php

namespace App\Http\Controllers;

use App\Mail\SendBirthdayMail;
use Illuminate\Http\Request;
use App\Engineer;
use App\Team;
use App\Project;
use App\lib\changeIDName;
use App\lib\changeIDProject;
use App\lib\changeIDTeam;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $engineer;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index(){
        $_engineer = new Engineer();
        $_team = new Team();
        $_project = new Project();

        $_changeIDName = new changeIDName();
        $_changeIDPro = new changeIDProject();
        $_changeIDTeam = new changeIDTeam();

        $_totalTeam = $this->totalTeam($_team);
        $_totalProject = $this->totalProject($_project);
        $_totalEngineer = $this->totalEngineer($_engineer);

        // $_listEngineer = $this->listEngineer($_engineer);
        // $_staticEngineer = $this->staticEngineer($_engineer);
        $_topEngineer = $this->topEngineer($_engineer);

        $_newProject = $this->newProject($_project);

        $_newEngineerNoti = $this->newEngineerNotification($_engineer);
        $_newProjectNoti = $this->newProjectNotification($_project);
        $_newTeamNoti = $this->newTeamNotification($_team);
        $_birthday = $this->birthdayNotification($_engineer);

      // dd($_newTeamNoti);



        return view('dashboard')->with([
            'totalEngineer' => $_totalEngineer,
            'totalTeam' => $_totalTeam,
            'totalProject' => $_totalProject,
            // 'listEngineer' => $_listEngineer,
            // 'listEngineer' => $_staticEngineer,
            'topEngineer' => $_topEngineer,
            'newProject' => $_newProject,
            'controllerEngi' => $_changeIDName,
            'controllerPro' => $_changeIDPro,
            'controllerTeam' => $_changeIDTeam,
            'birthday' => $_birthday,
            'newEngineerNoti' => $_newEngineerNoti,
            'newProjectNoti' => $_newProjectNoti,
            'newTeamNoti' => $_newTeamNoti

        ]);
    }
    
    public function topEngineer($_engineer){
      $_topEngineer = $_engineer->join('History','Engineer.idEngineer','=','History.idEngineer')
                                ->selectRaw('History.idEngineer, Engineer.engineerName, Engineer.TechSkill, Engineer.Experience, Engineer.avatar, COUNT(History.idEngineer) as total')
                                ->distinct('History.idEngineer')
                                ->groupBy('History.idEngineer')
                                ->orderBy('total','desc')
                                ->take(5)
                                ->get();
      return $_topEngineer;
    }
    // public function staticEngineer($_engineer){
    //   $_staticEngineer = $_engineer->where("busy","0")->get();
    //   return view("table.availableEngineer")->with(["$listEngineer"=>$_staticEngineer]);
    // }

    public function newProject($_project){
      $_newProject = $_project->selectRaw('idProject, projectName')
                              ->orderBy('dateOfBegin','desc')
                              ->take(6)
                              ->get();
      return $_newProject;
    }


    public function newProjectNotification($_project){
      $_newProjectNoti = $_project->selectRaw('idProject,projectName,dateOfBegin,dateOfEnd')
                                  ->whereRaw("DATEDIFF(NOW(),dateOfBegin) < 3")
                                  ->get();
      return $_newProjectNoti;
    }

    public function newEngineerNotification($_engineer){
      $_newEngineerNoti = $_engineer->selectRaw('engineerName')
                                ->whereRaw("DATEDIFF(NOW(),dateJoin) < 3")
                                ->get();
      return $_newEngineerNoti;
    }


    public function newTeamNotification($_team){
      $_newTeamNoti = $_team->selectRaw('idTeam,teamName,techSkill,status')
                            ->whereRaw("DATEDIFF(NOW(),Timestamp) < 3")
                            ->get();
      return $_newTeamNoti;
    }


    public function birthdayNotification($_engineer)
    {

        $_birthday = $_engineer->selectRaw('engineerName')->where('status', 1)
            ->whereDay('birthday', Carbon::NOW()->day)
            ->whereMonth('birthday', Carbon::NOW()->month)
            ->get();



        //config(['mail.driver' => 'smtp', 'mail.host' => 'smtp.gmail.com', 'mail.port' => 587, 'mail.username' => 'agent.enclave@gmail.com', 'mail.password' => 'enclave12345', 'mail.encryption' => 'tls']);


        $datas_email_db = DB::table('Engineer')->select('Email')->where('status', 1)->where('birthday_mail', 0)
            ->whereDay('birthday', Carbon::NOW()->day)
            ->whereMonth('birthday', Carbon::NOW()->month)->get();
        $data_email = [];
        foreach ($datas_email_db as $data_email_db) array_push($data_email, $data_email_db->Email);



        if ($data_email) {


            foreach ($data_email as $mail) {
                $idmail=$_engineer->select('engineerName')->where('Email',$mail)->where('birthday_mail',0)
                    ->whereDay('birthday', Carbon::NOW()->day)
                    ->whereMonth('birthday', Carbon::NOW()->month)
                    ->get();
                $mailable = new SendBirthdayMail($idmail);

                Mail::to($mail)->send($mailable);
                DB::table('Engineer')->where('status', 1)->where('Email',$mail)
                    ->whereDay('birthday', Carbon::NOW()->day)
                    ->whereMonth('birthday', Carbon::NOW()->month)->update(['birthday_mail' => 1]);
            }
            DB::table('Engineer')->update(['birthday_mail' => 0]);
            DB::table('Engineer')->where('status', 1)
                ->whereDay('birthday', Carbon::NOW()->day)
                ->whereMonth('birthday', Carbon::NOW()->month)->update(['birthday_mail' => 1]);

        }



            return $_birthday;

    }

    public function listEngineer($_engineer){
      $_listEngineer = $_engineer->get();
      return $_listEngineer;
    }

    public function totalEngineer($_engineer){
      $_totalEngineer = $_engineer->count();
      return $_totalEngineer;
    }

    public function totalProject($_project){
      $_totalProject = $_project->count();
      return $_totalProject;
    }

    public function totalTeam($_team){
      $_totalTeam = $_team->count();
      return $_totalTeam;
    }
}
