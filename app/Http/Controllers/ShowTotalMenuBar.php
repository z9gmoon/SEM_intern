<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Project;
use App\Engineer;
class ShowTotalMenuBar extends Controller
{  public function __construct()
{
    $this->middleware('auth');
}
    public function totalEngineer(){
    	
    }
    public function total(){
    	$_engineer = new Engineer();
    	$_team = new Team();
    	$_project =  new Project();

    	$_totalEngineer = $_engineer->count();
    	$_totalTeam = $_team->count();
    	$_totalProject = $_project->count();

    	$_total = array($_totalEngineer,$_totalTeam,$_totalProject);

    	return $_total;
    }
}
