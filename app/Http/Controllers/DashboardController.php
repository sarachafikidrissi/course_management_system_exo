<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDash(){
        $users =  User::whereDoesntHave('roles', function($fun){
            $fun->where('name', 'admin');
        })->get();

        return view('admin.dashboard', compact('users'));
    }

    public function teacherDash(){
        $courses = Course::all();
        return view('teacher.dashboard', compact('courses'));
    }
}
