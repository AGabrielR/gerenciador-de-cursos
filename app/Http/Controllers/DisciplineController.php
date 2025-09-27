<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index()
    {
        $disciplines = Discipline::with('teachers')
            ->get();

        return view('disciplines.list', [
            'disciplines' => $disciplines,
        ]);
    }

    public function form()
    {
        $id = request()->get('id');

        $discipline = Discipline::find($id);

        $teachers = Teacher::all();
        
        return view('disciplines.form', [
            'discipline' => $discipline,
            'teachers'   => $teachers,
        ]);
    }

    public function create()
    {
        $name        = request()->get('name');
        $workload = request()->get('workload');

        Discipline::create([
            'name'        => $name,
            'workload' => $workload
        ])->teachers()->sync(request()->get('teacher_id'));

        return redirect()->route('discipline.index');
    }

    public function delete()
    {
        $id = request()->get('id');

        $discipline = Discipline::find($id);
        
        $discipline->delete();

        return redirect()->route('discipline.index');
    }

    public function update()
    {
        $id = request()->get('id');

        $discipline = Discipline::find($id);

        $name     = request()->get('name');
        $workload = request()->get('workload');

        $discipline->update([
            'name'        => $name,
            'workload'    => $workload
        ]);

        $discipline->teachers()->sync(request()->get('teacher_id'));
        
        return redirect()->route('discipline.index');
    }
}
