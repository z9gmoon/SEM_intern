<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\lib\changeIDTeam;
use App\lib\changeColorStatus;

class ShowTeamDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function ShowTeam(){
		$_team = new Team();
		$_controller = new changeIDTeam();
		$_changeColor = new changeColorStatus();
		$_list = $_team->get();
		return View('table.totalTeams')->with(['list'=>$_list,
											   'controller'=>$_controller,
											   'controllerColor'=>$_changeColor]);
	}
}
