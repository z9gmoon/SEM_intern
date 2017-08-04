<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Engineer;

class ShowTopEngineerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ShowTopEngineer(Request $_request){
    	$_data = $_request->all();
    	$_id = $_data['id'];
    	$_engineer = new Engineer();
    	$_topEngineer = $_engineer->join('History','Engineer.idEngineer','=','History.idEngineer')
                                  ->selectRaw('History.idEngineer, Engineer.engineerName, Engineer.TechSkill, Engineer.Experience,Engineer.avatar, COUNT(History.idEngineer) AS total')
                                  ->where('History.idEngineer','=',$_id)
                                  ->groupBy('History.idEngineer')
    						                  ->get();
    	// echo $_topEngineer;
      // dd($_topEngineer);	
   		return view('table.tableTopEngineer')->with('top',$_topEngineer);
    }
}
