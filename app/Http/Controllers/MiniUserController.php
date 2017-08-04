<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Engineer;
class MiniUserController extends Controller
{
    
    public function DashBoard(){
        return view('dashboard');
    }
    // public function TotalEngineer(){
    //     return view('table.totalEngineers');
    // }
    // public function TotalTeam(){
    //     return view('table.totalTeams');
    // }
    // public function TotalProject(){
    //     return view('table.totalProjects');
    // }
    public function TableTopEngineer(){
        return view('table.tableTopEngineer');
    }

    public function IndexEM(){
    	$_engineer = new Engineer();
        $_list = $_engineer::all();
        return view('engineer.IndexEngiManage')->with('list',$_list);
    }
    public function AddEm(){
    	return view('engineer.FormInsertEngi');
    }
    public function EditEm(){
    	return view('engineer.FormEditEngi');
    }


    // public function IndexPro(){
    // 	return view('project.IndexProjectManagement');
    // }
    // public function AddPro(){
    // 	return view('project.FormAddPro');
    // }
    // public function EditPro(){
    // 	return view('project.FormEditPro');
    // }

    public function IndexTm(){
        return view('team.IndexTeamManager');
    }
    public function AddTm(){
        return view('team.FormInsertTeam');
    }
    public function EditTm(){
        return view('team.FormEditTeam');
    }


}
