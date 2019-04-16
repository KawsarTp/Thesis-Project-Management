<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Student;
use Auth;
class SessionController extends Controller
{
    protected $redirectTo = '/';

	public function __construct(){
         
		$this->middleware('guest:student')->except('logout');
	}

    public function login_form(){
    	return view('frontend.student.login');
    }
    
    public function show_register_form(){
    	return view('frontend.student.registration');
    }

    public function store(){

    	$this->validate(request(),[
    		'name'=>'required|min:2',
    		'dept_id'=>'required|min:4|unique:students',
    		'department'=>'required',
    		'address' => 'required|min:4',
    		'email' => 'required|email|unique:students',
    		'password'=>'required|min:6|confirmed',
            'photo'=>'required|image|max:1024'
    	]);

    	$photo = request()->file('photo');
    	
        $path = uniqid('photo_').str_random(5).'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('images'),$path);
    	$password = bcrypt(request('password'));

    	$data= Student::create([
    		'name' => request('name'),
    		'dept_id' => request('dept_id'),
    		'department' => request('department'),
    		'address' => request('address'),
    		'email' => request('email'),
    		'password' => $password,
    		'photo' => $path
    	]);
    	return redirect('/login')->with('msg','Registration Successfull');
        

    }
    public function login()
    {
        $this->validate(request(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        $email = request('email');
        $password = request('password');

        if(Auth::guard('student')->attempt(['email'=>$email,'password'=>$password])){
            if(auth()->guard('student')->user()->active == 1){

            return redirect('/')->with('success','Login Successfull');
            }else{
                auth()->guard('student')->logout();
                return redirect('/login')->with('active','Account Not Acctivate Yet');
            }
        }else{
            return redirect()->back()->with('wrong','False Credential! please Check Carefully');
        }
        }

    public function forgot_Password(){
    	return view('frontend.student.forgotPassword');
    } 
     
    public function logout($id){
        Auth::guard('student')->logout($id);
        return redirect()->guest('/login');
    }
}
