<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Project;
use App\Category;

class ProjectController extends Controller
{
	public function create(){
        $category = Category::all();
		$teacher_list = Teacher::all();
		return view('frontend.student.createProject',compact('teacher_list','category'));
	}
    public function store()
    {
    	$this->validate(request(),[
    		'projecttitle'=>'required',
    		'projectbody'=>'required',
    		'language' => 'required',
    		'teacherid'=>'required'
    	]);
    	$data = Project::create([
    		'project_title'=>request('projecttitle'),
    		'project_body'=>request('projectbody'),
            'student_id'=>auth()->guard('student')->user()->id,
    		'language'=>request('language'),
    		'teacher_id'=>request('teacherid'),
            'category_id'=>request('category')

    	]);
        return redirect('/');
    }
}
