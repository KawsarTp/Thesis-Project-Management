<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use App\Teacher;
use App\Password;
use App\Category;
class SessionTeacherController extends Controller
{
	

	public function __construct(){
		$this->middleware('guest:teacher')->except('logout');
	}
	public function index(){
		return view('frontend.teacher.login');
	}
	public function showForgot()
	{
		return view('frontend.teacher.forgotpassword');
	}
	public function register(){
		$category = Category::all();
		return view('frontend.teacher.register',compact('category'));
	}
	public function store(){
		// $a = implode(',',request('categories'));
		// $b = explode(',',$a);
		// $c = count($b);
		// for($i=0;$i<$c;$i++){	
		// 	echo($b[$i]);
		// }
		// dd($a);
		$this->validate(request(),[
			'name'=>'required',
			'email'=>'required|email|unique:teachers',
			'department'=>'required',
			'phone'=>'required',
			'address'=>'required',
			'designation'=>'required',
			'publication'=>'required',
			'password'=>'required|confirmed|min:6',
			'photo'=>'required|image|max:1024',
			'categories' => 'required'
		]);
		$a = implode(',',request('categories'));
		$photo = request()->file('photo');
		$name = uniqid('teacher_photo_').str_random(5).'.'.$photo->getClientOriginalExtension();
		$photo->move(public_path('images'),$name);
		$teacher_info = Teacher::create([
			'name'=>request('name'),
			'email'=>request('email'),
			'department'=>request('department'),
			'phone'=>request('phone'),
			'address'=>request('address'),
			'designation'=>request('designation'),
			'publication'=>request('publication'),
			'password'=>bcrypt(request('password')),
			'photo'=>$name,
			'speciality'=>$a

		]);
		return redirect('teacher/login')->with('success','Registration Successfull');
	}

	public function login(){
		if(Auth::guard('teacher')->attempt(['email'=>request('email'),'password'=>request('password')])){
			if (auth()->guard('teacher')->user()->active == 1) {
				return redirect('teacher/home')->with('login','Login Successfull');
			}else{
				auth()->guard('teacher')->logout();
				return redirect('teacher/login')->with('active','Account Not Active Yet!');
			}
	}else{
		return redirect('teacher/login')->with('wrong','Wrong Credential');
	}
	}


	public function logout($id){
		Auth::guard('teacher')->logout($id);
		return redirect('teacher/login');
	}

	public function getEmail(){
		$email = request('email');
		$c = Teacher::where('email',$email)->get();
		if($c->count() == 1){
			$token = str_random(50);
		$data = array("token" => $token ,'email'=>$email);

		\Mail::send('frontend.teacher.mail', $data, function($message){

			$to_email = request('email');
			$message->to($to_email)->subject('For Password Reset');
			$message->from('khossin227@gmail.com','Kawsar Hossain');
		});
		return redirect()->back()->with('success','Email sent');
	}else{
		return redirect()->back()->with('error','No Account is created with this email');
	}
		
		// $email = request('email');
		// $token = str_random(50);
		// Password::create([
		// 	'email' => $email,
		// 	'token' =>$token
		// ]);
	}

	public function resetPassword(){
		$token = \DB::table('password_resets')->where('token',request('token'))->get();
		if($token->count() <= 0){
	$a = \DB::table('password_resets')->insert(
			array( 'token' => request('token'),'email'=>request('email'),'created_at'=>Carbon::now())

		); 
			return view('frontend.teacher.reset');

		}else{
			echo 'Your Link is expired';
		}
		
		
	}
}
