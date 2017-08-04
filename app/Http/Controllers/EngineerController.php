<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Team;
use App\Engineer;
use App\lib\changeColorStatus;
use Illuminate\Support\Facades\DB;
use Software_Engineer_Management;
use App\json;
use App\lib\changeIDName;

class EngineerController extends Controller
{	
  public function __construct()
  {
    $this->middleware('auth');
  }
    

    public function IndexEM(){ 
        $_changeIDName = new changeIDName();
        $_changeColor = new changeColorStatus();
        $_list = Engineer::all();
        $_changeIDName = new changeIDName();
        $_totalTeam = $this->totalTeam();
        $_totalProject = $this->totalProject();
        $_totalEngineer = $this->totalEngineer();
        return view('engineer.IndexEngiManage')->with(['list' => $_list,
								           	                'totalEngineer' => $_totalEngineer,
                                            'totalTeam' => $_totalTeam,
                                            'totalProject' => $_totalProject,
                                            'controller' => $_changeIDName,
                                            'controllerColor' => $_changeColor]);
    }
     public function Filtertable($id){
           
             $ex="";
             $tec="";
            $tech = substr($id, 0 ,-2);
            $exp= substr($id, 3,1);
           
          $list = new Engineer();  
         switch ($tech) {
              case '11':
              $tec="PHP";
               # code...
               break;
           case '12':
              $tec="JAVA";
               # code...
               break;
          case '13':
              $tec="C++";
               # code...
               break;   
                       
          case '14':
              $tec=".Net";
               # code...
               break;   
           case '15':
              $tec="Ruby";
               # code...
               break;               
          case '16':
              $tec="Android";
               # code...
               break;               
           
           default:
             # code...
             break;
         }

       switch ($exp) {
           case '1':
              $ex="No experience";
               
               break;
           case '2':
              $ex="1 year";
                            break;
           case '3':
              $ex="More 2 years";
                            break;  
           case '4':
              $ex="More 5 years";
               
               break;
           case '5':
              $ex="More 10 years";
               # code...
               break;
        
           default:
               # code...
               break;
     }
      echo $ex;
      echo $tec;
     $list = DB::table('Engineer')->where('TechSkill','like','%'.$tec.'%')->where('Experience','like','%'.$ex.'%')->get();

        // if($ex==null){
        
        // $list = DB::table('Engineer')->where('TechSkill','like','%'.$tec.'%')->where('Experience','like','%'.$ex.'%')->get();
        //   }
        //   else {
        //     $list = DB::table('Engineer')->where('Experience','like','%'.$ex.'%')->get();
        //   }
        $_changeIDName = new changeIDName();  

      return view('engineer.Fitertable')->with(['list' => $list,
                                                 'controller' => $_changeIDName
                                            ]);
  
      }
// public function DetailEn(){
//       $_totalTeam = $this->totalTeam();
//         $_totalProject = $this->totalProject();
//         $_totalEngineer = $this->totalEngineer();
//       return view('engineer.DetailEngi')->with(['totalEngineer' => $_totalEngineer,
//                                             'totalTeam' => $_totalTeam,
//                                             'totalProject' => $_totalProject,]);
//     }
 public function DetailEn($id){
        $list = DB::table('Engineer')->where('idEngineer',$id)->first();
      return view('engineer.DetailEngi')->with(['listEngi' => $list,
                                            ]);
  
      }

    public function AddEm(){
    	$_totalTeam = $this->totalTeam();
        $_totalProject = $this->totalProject();
        $_totalEngineer = $this->totalEngineer();
    	return view('engineer.FormInsertEngi')->with(['totalEngineer' => $_totalEngineer,
                                            'totalTeam' => $_totalTeam,
                                            'totalProject' => $_totalProject,]);
    }
    // public function EditEm(){
    // 	$_totalTeam = $this->totalTeam();
    //     $_totalProject = $this->totalProject();
    //     $_totalEngineer = $this->totalEngineer();
    // 	return view('engineer.FormEditEngi')->with(['totalEngineer' => $_totalEngineer,
    //                                         'totalTeam' => $_totalTeam,
    //                                         'totalProject' => $_totalProject,]);
    // }
    public function EditEm($id){
      $_totalTeam = $this->totalTeam();
        $_totalProject = $this->totalProject();
        $_totalEngineer = $this->totalEngineer();
        $list = DB::table('Engineer')->where('idEngineer',$id)->first();
      return view('engineer.FormEditEngi')->with(['totalEngineer' => $_totalEngineer,
                                            'totalTeam' => $_totalTeam,
                                            'totalProject' => $_totalProject,'list'=>$list]);
  
      }


     public function AddEngineer(Request $request){
 // Get date from request   
         $name = $request->input('fullname');
         $birth = $request->input('birthday');
         $exp = $request->input('experience');
         $address= $request->input('address');
         $phone= $request->input('phone');
         $email= $request->input('email');
         $dateout= $request->input('dateout');
         $datein = $request->input('datein'); 
       
  // Hadle multi Checkboxes Technical skill       
         $tech="";


      foreach ($request->input('techSkill') as $value => $key) {
            
             $t="";
            switch ($key) {
                        case 'PHP':
                          $t="- PHP";
                          break;
                        case 'JAVA':
                          $t="- JAVA";
                          break;
                        case '.NET':
                          $t="- .NET";
                          break;
                        case 'Ruby':
                          $t="- Ruby";
                          break;
                        case 'Android':
                          $t="- Android";
                          break;
                        case 'IOS':
                          $t="- IOS";
                          break;
                        case 'HTML':
                          $t="- HTML";
                          break;  
                        case 'CSS':
                          $t="- CSS";
                          break;  
                        case 'JS':

                          $t="- JS";
                          break;     
                        default:
                          # code...
                          break;
                      }
                      $tech = $tech." ".$t;          
 }


  // handle Experience       
             $ex="";
     	 switch ($exp) {
	         case '0':
	            $ex="No experience";
	             
	             break;
	         case '1':
	            $ex="1 year";
	                          break;
	         case '2':
	            $ex="More 2 years";
	                          break;  
	         case '3':
	            $ex="More 5 years";
	             
	             break;
	         case '4':
	            $ex="More 10 years";
	             # code...
	             break;        
	         default:
	             # code...
	             break;
     }
  
        
  // Convert date
        $newbirth = date("Y-m-d", strtotime($birth));
        $newdateout = date("Y-m-d", strtotime($dateout));
        $newdatein = date("Y-m-d", strtotime($datein));
 // Save data to DataBase                
        $engineer = new Engineer();  

        $photo  = $request->photo;
        if ($request->hasFile('photo')) {
        $namePhoto = $photo->getClientOriginalName();
        $photo->move('upload',$namePhoto);
        $engineer->avatar=$namePhoto; 

    }

        $engineer->engineerName="$name";
        $engineer->Address="$address";
        $engineer->Phone="$phone";
        $engineer->Email="$email";
        $engineer->TechSkill="2";
        $engineer->Experience="$ex";
        $engineer->TechSkill=$tech;
        $engineer->dateJoin=$newdatein;
        $engineer->outOfdate=$newdateout;
        $engineer->birthday=$newbirth;

      $en = DB::table('Engineer')->where('Email',$email)->first();
          
        if (is_null($en)) {
            $engineer->save();
            return redirect('EngineerManagement')->with('notify','Add Successfully a new engineer');
        } else {
        return redirect('AddEngineer')->with('notify', 'Email has existed. Please check again');;  

} 
      // if($en === null){
      //   echo "da ton tai";
      //  // $engineer->save();
      // } else echo"ok";
    // return redirect('EngineerManagement')->with('notify','Add Successfully a new engineer');

        $engineer->birthday_mail=0;
        $engineer->status=1;
        $engineer->busy=0;
       
      echo $tech;
       $engineer->save();

    return redirect('EngineerManagement')->with('notify','Add Successfully a new engineer');


    }

public function DelEng(Request $request, $id){
         $result =  DB::table('Engineer')->where('idEngineer',$id)->delete();
          return $result;
    }

public function EditEngineer(Request $request,$id){
      $name = $request->input('fullname');
      $birth = $request->input('birthday');
      $exp = $request->input('experience');
      $address= $request->input('address');
      $phone= $request->input('phone');
      $email= $request->input('email');
      $dateout= $request->input('dateout');
      $datein = $request->input('datejoin'); 
      $sta = $request->input('status');
      
           //Handle Experience
             $ex="";
       switch ($exp) {
           case '0':
              $ex="No experience";
               
               break;
           case '1':
              $ex="1 year";

              break;
           case '2':
              $ex="More 2 years";
              break;  

           case '3':
              $ex="More 5 years";
               
               break;
           case '4':
              $ex="More 10 years";
               # code...
               break;        
           default:
               # code...
               break;
     }
      //  Handle Technical
              $tech="";


      foreach ($request->input('techSkill') as $value => $key) {
            
             $t="";
            switch ($key) {
                        case 'PHP':
                          $t="- PHP";
                          break;
                        case 'JAVA':
                          $t="- JAVA";
                          break;
                        case '.NET':
                          $t="- .NET";
                          break;
                        case 'Ruby':
                          $t="- Ruby";
                          break;
                        case 'Android':
                          $t="- Android";
                          break;
                        case 'IOS':
                          $t="- IOS";
                          break;
                        case 'HTML':
                          $t="- HTML";
                          break;  
                        case 'CSS':
                          $t="- CSS";
                          break;  
                        case 'JS':

                          $t="- JS";
                          break;     
                        default:
                          # code...
                          break;
                      }
                      $tech = $tech." ".$t;          

      }


      // Get photo
        $Editname = "";
         $photo  = $request->photo;
       if($request->hasFile('photo')){
        $Editname = $photo->getClientOriginalName();
        $photo->move('upload',$Editname);   
    
      }
      //Update database    
     $engineer = DB::table('Engineer')->where('idEngineer',$id);


   
        $engineer->update(['engineerName'=>$name,'Address'=>$address,'Phone'=>$phone,'Email'=>$email,'Experience'=>$ex,'dateJoin'=>$datein,'outOfdate'=>$dateout,'TechSkill'=>$tech,'status'=>$sta,'avatar'=>$Editname,'birthday'=>$birth]);

        return redirect("EngineerManagement")->with('notify','Update Successfully the engineer!');

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

    public function idName($id){
      if($id<10){
        $_string = "EN00";  
      }
      else if($id<100){
        $_string = "EN0";
      }
      else if($id<1000){
        $_string = "EN";
      }
      return $_string.$id;
    }
}
// ...