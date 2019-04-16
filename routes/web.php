<?php

// Route for Admin

Route::group(['prefix'=>'admin'],function(){
Route::get('/','AdminController@index')->name('home');
Route::get('/addstudent','AdminController@addStudent')->name('admin.addstudent');
Route::get('/studentinfo','AdminController@studentinfo')->name('admin.studentinfo');
Route::get('/student/assign','AdminController@assignStudent')->name('admin.assign');
Route::get('/addteacher','AdminController@addTeacher')->name('admin.addteacher');
Route::post('/addteacher','AdminController@storeTeacherInfo')->name('admin.addteacher');
Route::get('teachers/list','AdminController@teachersList')->name('admin.teacherslist');
Route::get('query','AdminController@studentQuery')->name('admin.studentquery');
Route::get('projects','AdminController@projects')->name('admin.project');
Route::get('thesis','AdminController@thesis')->name('admin.thesis');
Route::get('active/{id}','AdminController@active')->name('activation');
Route::get('deactive/{id}','AdminController@deactive')->name('deactivation');
Route::get('category/find','AdminController@valid')->name('admin.valid');
Route::get('category','AdminController@category')->name('admin.category');
Route::post('category','AdminController@categoryStore')->name('admin.category');
});



// Student Section
Route::get('/','StudentController@index')->name('home');
Route::get('search','StudentController@search')->name('search');
Route::get('/profile/{id}','StudentController@profile')->name('profile');
Route::post('profile/{id}','StudentController@updatePassword');
Route::get('/project','StudentController@project')->name('project');


Route::get('/login','SessionController@login_form')->name('login');
Route::post('login','SessionController@login');

Route::get('/register','SessionController@show_register_form')->name('student.register');
Route::post('/register','SessionController@store');

Route::get('/forgot-Password','SessionController@forgot_Password')->name('student.password');

Route::get('/logout/{id}','SessionController@logout')->name('student.logout');

Route::post('/update/{id}','StudentController@update')->name('update');
Route::get('/create','ProjectController@create');
Route::post('create','ProjectController@store');
Route::get('search/{id}','StudentController@sendRequest')->name('request');
Route::get('myform/ajax/{id}','StudentController@myForm');


Route::get('/git', 'GitController@index');

Route::get('/finder','GitController@finder');

Route::get('/edit','GitController@edit');

Route::post('/update','GitController@update');

Route::get('/commits','GitController@commits');
Route::get('/git/repo','GitController@findRepository');

Route::get('/blob','GitController@createBlob');

// Route::get('/git/connect','GitController@gitConnection');
Route::post('/git/connect','GitController@gitstore');








// Route for teacher 

Route::group(['prefix'=>'teacher'],function(){
	Route::get('/login','SessionTeacherController@index')->name('teacher.login');
	Route::get('forgot','SessionTeacherController@showForgot')->name('teacher.forgot');
	Route::post('/send','SessionTeacherController@getEmail')->name('teacher.send');
	Route::post('/login','SessionTeacherController@login');
	Route::get('reset','SessionTeacherController@resetPassword')->name('teacher.reset');
	Route::get('/home','TeacherController@show')->name('teacher.home');
	Route::get('/register','SessionTeacherController@register')->name('teacher.register');
	Route::post('/register','SessionTeacherController@store')->name('teacher.store');
	Route::get('/logout/{id}','SessionTeacherController@logout')->name('teacher.logout');
	Route::get('accept/{id}','TeacherController@accept')->name('teacher.accept');
	Route::get('deny/{id}','TeacherController@deny')->name('teacher.deny');
	Route::post('/task','TaskController@store')->name('task');
	Route::get('/project/{id}','TaskController@show')->name('teacher.project');
	Route::get('/project/details/{id}','TeacherController@project_details')->name('teacher.project_details');
	Route::get('/task/update','TaskController@updateTask')->name('teacher.update');
	Route::get('/vault','TeacherController@vault')->name('teacher.vault');
	Route::get('/vault/project/{id}','TeacherController@projectVault')->name('teacher.project.vault');
	Route::get('/task/detail/{id}','TaskController@taskDetail')->name('teacher.taskdetail');

	Route::get('task/modify/{id}','TaskController@modifyTask')->name('teacher.modify');
	Route::post('task/update/{id}','TaskController@updateExistingTask')->name('task.update');
	Route::get('project/gpa/{id}/{grade}','TeacherController@projectGrade');
	Route::get('screen','TeacherController@screenShare')->name('teacher.screen');
	Route::get('project/ajax','TeacherController@updateProject')->name('teacher.project_max');
});

