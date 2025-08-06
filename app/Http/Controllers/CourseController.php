<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $request->validate([
            'module' => 'required',
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        $path = $request->file('image')->store('courses', 'public');

        Course::create([
            'module' => $request->module,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'user_id' => $user->id
        ]);

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function toEnroll(Request $request){
        $user = User::find(Auth::user()->id);

        $request->validate([
            'course_id' => 'required'
        ]);
      

        $user->userCourses()->attach($request->course_id);
       
        
        
        return back();
    }
}
