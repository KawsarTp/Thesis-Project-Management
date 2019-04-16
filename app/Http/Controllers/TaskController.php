<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Teacher;
use App\Project;
use Carbon\Carbon;
 use DateTime;

class TaskController extends Controller
{
    public function store(){
    	$file = request()->file('file');
        if($file){
        $name = uniqid('file_').str_random(5).'.'.$file->getClientOriginalExtension();
         $file->move(public_path('images/files'),$name);
    	Task::create([
            'project_id'=>request('project'),
    		'student_id'=>request('team'),
    		'description'=>request('description'),
    		'date'=>request('date'),
    		'teacher_id'=>auth()->guard('teacher')->user()->id,
    		'file'=>$name,
    	]);
    	return redirect()->back();
    }else{
        Task::create([
            'project_id'=>request('project'),
            'student_id'=>request('team'),
            'description'=>request('description'),
            'date'=>request('date'),
            'teacher_id'=>auth()->guard('teacher')->user()->id,
        ]);
        return redirect()->back();
    }

    }

    public function show($id){
        // dd($id);

        $teacher = Teacher::find(auth()->guard('teacher')->user()->id);
        $project = $teacher->projects()->where('status',1)->where('id',$id)->latest()->get();
        $project_id= Project::find($id);
        $task = Task::where('teacher_id',auth()->guard('teacher')->user()->id)->where('project_id',$id)->latest()->get();
        $task_list = Task::where('teacher_id',auth()->guard('teacher')->user()->id)->where('available',0)->where('project_id',$id)->get();

        $task_complete = Task::where('project_id',$id)->where('status',1)->get();

        $task_incomplete = Task::where('project_id',$id)->where('status',0)->get();
        if($task->count()==0){
            $a = -1;
        }else{
        $a = ($task_complete->count()*100)/$task->count();
    }
        // $task_modify = Task::where('teacher_id',auth()->guard('teacher')->user()->id)->where('project_id',$id)->where('status',0)->get();
        // dd($task_modify);

        if($task_list->count()==0){
            $date = '';
            $month = '';
            $year = '';
        }else{
        foreach($task_list as $t){
            $time = strtotime($t->date);
            $date = date('d',$time);
            // dd($date);
            $month = date('m',$time);
            $year = date('Y',$time);

        }
    }

        return view('frontend.teacher.task',compact('teacher','project','task','project_id','date','month','year','task_list','task_complete','task_incomplete','a'));
    }

    public function updateTask(){
    $available = Task::where('available',0)->first();
    $available->available = 1;
    $available->save();
    }

    public function taskDetail($id){

        $task = Task::find($id);

        return view('frontend.teacher.taskdetails',compact('task'));

    }


    public function modifyTask($id){
        $task_a = Task::find($id);
        return view('frontend.teacher.task',compact('task_a'));
    }


    public function updateExistingTask($id){
        $update_task = Task::find($id);
        $file = request()->file('file');
        $date = request('date');
        if($file && $date){
        $name = uniqid('file_').str_random(5).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images/files'),$name);
        $update_task->description = request('description');
        $update_task->date = request('date');
        $update_task->file = $file;
        $update_task->available = 0;
        $update_task->save();
        return redirect()->back();
    }else{
         $update_task->description = request('description');
         $update_task->date = request('date');
         $update_task->available = 0;
         $update_task->save();
        return redirect()->back();
    }


    }
}
