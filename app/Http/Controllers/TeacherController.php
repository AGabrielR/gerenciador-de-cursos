<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('course')
            ->get();

        return view('teachers.list', [
            'teachers' => $teachers,
        ]);
    }

    public function form()
    {
        $id = request()->get('id');

        $teacher = Teacher::find($id);

        $courses = Course::all();
        
        return view('teachers.form', [
            'teacher' => $teacher,
            'courses' => $courses,
        ]);
    }

    public function create()
    {
        $name   = request()->get('name');
        $email  = request()->get('email');
        $course = request()->get('course');

        Teacher::create([
            'name'      => $name,
            'email'     => $email,
            'course_id' => $course,
        ]);

        return redirect()->route('teacher.index');
    }

    public function delete()
    {
        $id = request()->get('id');

        $teacher = Teacher::find($id);
        
        $teacher->delete();

        return redirect()->route('teacher.index');
    }

    public function update()
    {
        $id = request()->get('id');

        $teacher = Teacher::find($id);

        $name        = request()->get('name');
        $email       = request()->get('email');
        $course      = request()->get('course');

        $teacher->update([
            'name'      => $name,
            'email'     => $email,
            'course_id' => $course,
        ]);
        
        return redirect()->route('teacher.index');
    }
}
