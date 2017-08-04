<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Engineer;
use App\lib\changeIDName;
use App\lib\changeColorStatus;

class ShowEngiDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ShowEngineer(){
    	$_changeIDName = new changeIDName();
    	$_engineer = new Engineer();
        $_changeColor = new changeColorStatus();
    	$_list = $_engineer->get();
    	return view('table.totalEngineers')->with(['list' => $_list, 
    											   'controller' => $_changeIDName,
                                                   'controllerColor' => $_changeColor]);
    }

}
