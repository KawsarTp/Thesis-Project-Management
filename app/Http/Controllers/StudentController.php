<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Project;
use App\Task;
use App\Category;
use App\Git;
use Auth;

class StudentController extends Controller
{

  public function __construct(){
    $this->middleware('auth:student');

  } 

	
    public function index(){
        $student_list = Student::all();
        $project_rel = Student::find(auth()->guard('student')->user()->id);
    	return view('frontend.student.index', compact('student_list','project_rel'));
    }



    public function project(){
      $task = Task::where('student_id',auth()->guard('student')->user()->id)->get();
      // dd($task);
    	return view('frontend.student.projectmanagement',compact('task'));
    }

    public function project_details($id){
      $project_details = Project::find($id);
      dd($project_details);
    }
  
    public function profile($id){
      
     if(Auth::id() == $id) {
          // valid user
          $id = Auth::user();
          return view('frontend.student.profile', compact('id'));
     } else {
          return redirect('/')->with('profile-err','You are not Allowed To see another Students Profile');
     }

    	// return view('frontend.student.profile',compact('id'));
    }

    public function update(Student $id){
        $id->name = request('name');
        $id->dept_id = request('dept_id');
        $id->email = request('email');
        $id->department = request('department');
        $id->save();
        return redirect()->back()->with('msg','Update Sucessfully');
    }


    public function accountSetting(){
        return view('frontend.student.accountSetting');
    }

    public function updatePassword(Student $id){

      $password = request('cpassword');
      // dd($password);

      // dd(auth()->guard('student')->user()->password);
      if(\Hash::check($password,auth()->guard('student')->user()->password )){
        
          $newpassword = bcrypt(request('npassword'));

          $id->password = $newpassword;

          $id->save();

      }else{
        return 'not ok';
      }

    }

    public function search(){
      
     if(request()->ajax())
     {

      $output = '';
      $query = request()->get('query');

      if($query != '')
      {
       $data = Student::where('id','!=',auth()->guard('student')->user()->id)->where('email','LIKE',"%$query%")->get();
      }
      else
      {
       $data = '';
      }

      $total_row = $data->count();

      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output = $row->email;
        $id = $row->id;
       }
      }
      else
      {
       $output = '';
       $id = '';
      }
      // dd($output);
      $data =[ 
       'output'  => $output,
       'id'    => $id
      ];

      return json_encode($data);
     }

    }

    public function sendRequest($id){
      $user = Auth()->guard()->user();
      $recipient = Student::find($id);
      $user->befriend($recipient);
      return redirect('/')->with('friend','Sucessfully send request');
    }

    public function acceptRequest($id){
      $user = Auth()->guard()->user();
      $sender = Student::find($id);
      $user->acceptFriendRequest($sender);
    }

    public function myform($id){
      $a = Category::find($id);
      $name= $a->name;
      $c= Teacher::where('speciality','LIKE','%'.$name.'%')->get();

      // dd($c);
      $f= [];
      foreach($c as $e){
        $f = explode(',',$e->speciality);
        for($i=0;$i<sizeof($f)-1;$i++){
        // $b = array_search($name,$a);
        if(array_search($name, $f)==$i){
          $ag[]= $e->name;
         
        }
        // continue;
        }
      }
      // print_r($ag);
      // $you=[];
      if($c->count()>0){
      $total_row = count($c);
      // dd($total_row);
      if($total_row > 0){
      foreach ($c as $value) {
       $you[] = ['name'=>$value->name,'id'=>$value->id];
        
    }
    }
  }else{
    $you[] = ['name'=>'No teacher Found In this Category','id'=>'-1'];
  }
    
    return json_encode($you);
    }


    public function gitstore(){
      Git::create([

      'token'=>request('token'),
      'user_id'=>auth()->guard('student')->user()->id,
      'email'=>request('email'),
      'username'=>request('username'),
      'password'=>request('password')

    ]);
      return redirect('/git');
    }
  }

