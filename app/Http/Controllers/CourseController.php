<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('courses.list', [
            'courses' => $courses,
        ]);
    }

    public function form()
    {
        $id = request()->get('id');

        $course = Course::find($id);
        
        return view('courses.form', [
            'course' => $course,
        ]);
    }

    public function create()
    {
        $name        = request()->get('name');
        $description = request()->get('description');

        Course::create([
            'name'        => $name,
            'description' => $description
        ]);

        return redirect()->route('course.index');
    }

    public function delete()
    {
        $id = request()->get('id');

        $course = Course::find($id);
        
        $course->delete();

        return redirect()->route('course.index');
    }

    public function update()
    {
        $id = request()->get('id');

        $course = Course::find($id);

        $name        = request()->get('name');
        $description = request()->get('description');

        $course->update([
            'name'        => $name,
            'description' => $description
        ]);
        
        return redirect()->route('course.index');
    }
}
