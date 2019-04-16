<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Teacher;
use App\Student;
use App\Task;

class TeacherController extends Controller
{

	// protected function redirectTo()
 //    {
 //        return route('teacher.login');
 //    }

	// protected function guard()
	// {
	// 	return Auth::guard('teacher');
	// }

	public function __construct(){
		$this->middleware('auth:teacher');
	}
    

    public function show(){
    	$teacher = Teacher::find(\Auth::user()->id);
    	$project = $teacher->projects()->where('status',1)->latest()->get();
        $task = Task::where('teacher_id',auth()->guard('teacher')->user()->id)->get();
        $project_count = $teacher->projects()->where('finished',0)->where('status',1);
    	return view('frontend.teacher.index',compact('teacher','project','task','project_count'));
    }

    public function project_details($id){
      $project_details = Project::find($id);
      return view('frontend.teacher.project_details',compact('project_details'));
    }

    public function accept($id){
    	$status = 1;
    	$project = Project::find($id);
    	$project->status = $status;
    	$project->save();
    	return redirect('/teacher/home');
    }

    public function deny($id){
    	$project = Project::find($id);
    	$project->delete();
    	return redirect('/teacher/home');
    }

    public function vault(){
        $teacher = Teacher::find(\Auth::user()->id);
        $project = $teacher->projects()->where('status',1)->where('finished',1)->latest()->get();       
        return view('frontend.teacher.vault',compact('project'));
    }

    public function projectVault($id){
        $teacher = Teacher::find(\Auth::user()->id);
        // $project = $teacher->projects()
        //                     ->where('id',$id)
        //                     ->where('status',1)
        //                     ->where('finished',1)
        //                     ->latest()
        //                     ->get();
        $project = Project::find($id);
        // dd($project);
        // dd($project);
        return view('frontend.teacher.vaultproject',compact('project'));
    }


    public function projectGrade($id,$grade){

        $finished = 1;
        
        $a = Project::find(request('id'));

        $a->grade = request('grade');
        $a->finished = $finished;

        $a->save();
        
    }


    public function screenShare(){
        return view('frontend.teacher.screen');
    }

    public function updateProject(){

        $a =Project::where('teacher_id',auth()->guard('teacher')->user()->id)->get();
        dd($a);
        $total = $a->count();

        $teacher = Teacher::find(auth()->guard('teacher')->user()->id);

        $teacher->project_max = $total;

        $teacher->save();


    }
    
}
