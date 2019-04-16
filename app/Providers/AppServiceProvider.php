<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Student;
use App\Teacher;
use App\Project;
use App\Friendship;
use App\Git;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('frontend.student.header', function ($view) {
            $photo = Student::find(auth()->guard('student')->user()->id);
            $view->with('photo',$photo);
        });
        view()->composer('frontend.teacher.header', function ($view) {
            $teacher= Teacher::find(auth()->guard('teacher')->user()->id);
            $project = Project::where('status',0)->where('teacher_id',auth()->guard('teacher')->user()->id)->get();
            $view->with(['teacher'=>$teacher,'project'=>$project]);
        });

        view()->composer('frontend.student.header', function ($view) {
            $student= Student::find(auth()->guard('student')->user()->id);
            $friend = Friendship::where('status',0)->where('recipient_id',auth()->guard('student')->user()->id)->get();
            $view->with(['student'=>$student,'friend'=>$friend]);
        });

        view()->composer('frontend.student.index', function ($view) {
            $git = Git::where('user_id',auth()->guard('student')->user()->id)->get();
            if($git == true){
                $view->with(['git'=>$git]);
            }else{
            $view->with('git','not connected');
        }

         });

          view()->composer('frontend.student.header', function ($view) {
            $git = Git::where('user_id',auth()->guard('student')->user()->id)->get();
            if($git == true){
                $view->with(['git'=>$git]);
            }else{
            $view->with('git','not connected');
        }

         });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
