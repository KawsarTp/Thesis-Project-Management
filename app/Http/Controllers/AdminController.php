<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Category;
class AdminController extends Controller
{
    public function index()
    {
        $data = Student::all();
        $total = $data->count();
    	return view('admin.dashboard',compact('total'));
    }

    public function addStudent()
    {
    	return view('admin.add-student');
    }


    public function studentInfo()
    {
        $data = Student::all();
    	return view('admin.student-info', compact('data'));
    }
    
    public function assignStudent()
    {
    	return view('admin.assign-student-number');
    }

    public function active(Student $id){
        $id->active = 1;
        $id->save();
        return redirect()->back()->with('msg','Active Successfull');
    }
    public function deactive(Student $id){
        $id->active = 0;
        $id->save();
        return redirect()->back()->with('deactive','Deactive Successfull');
    }

    //...................Teacher's Part..............................
    
    public function addTeacher()
    {
        return view('admin.add-teacher');
    }
    
    public function storeTeacherInfo()
    {
       $data = request()->all();
       dd($data);
    }
    public function teachersList()
    {
        return view('admin.teachers-list');
    }

    public function studentQuery()
    {
        return view('admin.querypage');
    }

    public function projects()
    {
        return view('admin.Projects');
    }

     public function thesis()
    {
        return view('admin.thesis');
    }

    public function category(){
        return view('admin.category');
    }

    public function categoryStore(){

        // $this->validate(request(),[
        //     'name'=>'required|unique:categories'
        // ]);


        Category::create([

            'name' =>str_replace(' ','',request('category')) 
        ]);

        return redirect()->back()->with('category','Category added Successfully');
    }

    public function valid(){
        // if(request()->ajax()){
        //     $find = request()->get('query');
        //     $a = Category::where('category',$find);
        // }
    }
  
}
