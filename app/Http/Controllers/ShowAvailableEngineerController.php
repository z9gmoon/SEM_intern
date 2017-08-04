<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Engineer;
use App\lib\changeColorStatus;
use App\lib\changeIDName;
use App\lib\calDate;
class ShowAvailableEngineerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }	
    public function ShowAvailableEngineer(){
      $_changeColor = new changeColorStatus();
      $_changeIDEngi = new changeIDName();
      $_getTime = new calDate(); 
      $_engineer = new Engineer;
      // $_staticEngineer = $_engineer->where("busy","0")->get();
      $_staticEngineer = $_engineer->selectRaw("Engineer.idEngineer,Engineer.engineerName, Engineer.busy, Engineer.TechSkill, History.DateOfJoining, MAX(expire) AS expire, DATEDIFF(NOW(),MAX(expire)) AS timeNotJoining")
                                   ->leftJoin('History','Engineer.idEngineer','=','History.idEngineer')
                                   ->whereRaw("History.expire IS NOT NULL")
                                   ->orWhere("Engineer.busy","0")
                                   ->groupBy("idEngineer")
                                   ->having("Engineer.busy","0")
                                   ->get(); 
      // dd($_getTi);
      return view("table.availableEngineer")->with(["listEngineer"=>$_staticEngineer,
      												                      "controllerIDEngi"=>$_changeIDEngi,
                                                    "controllerColor"=>$_changeColor,
                                                    "getTime"=>$_getTime]);
    }
}
// SELECT Engineer.idEngineer, Engineer.engineerName, Engineer.busy, MAX(expire) AS expire, DATEDIFF(NOW(),MAX(expire)) FROM History RIGHT JOIN Engineer ON History.idEngineer = Engineer.idEngineer WHERE expire is not null OR Engineer.busy = 0 group by Engineer.idEngineer HAVING Engineer.busy = 0 