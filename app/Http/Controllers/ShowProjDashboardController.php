<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\lib\changeIDProject;
use App\lib\getStatusProject;

use App\lib\changeColorStatus;


class ShowProjDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function ShowProject(){
		$_project = new Project();
		$_controller = new changeIDProject();
		$_controllerStt = new getStatusProject();

		$_changeColor = new changeColorStatus();
		$_list = $_project->get();
		return view('table.totalProjects')->with(['list' => $_list,
												  'controller' => $_controller,
												  'controllerStt' => $_controllerStt,
												  'controllerColor' => $_changeColor]);

		
	}
}
