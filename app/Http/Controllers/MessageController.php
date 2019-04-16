<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MessageController extends Controller
{
    public function create(){
    	return view('frontend.student.chat');
    }


    public function fetchMessages()
    {
    	return Message::with('student')->get();
    }

    public function sendMessage(Request $request)
    {
    	$user = Auth::guard('student')->user();

    	$message = $user->messages()->create([
    		'message' => $request->input('message')
    	]);

    	return ['status' => 'Message Sent!'];
    }
}
