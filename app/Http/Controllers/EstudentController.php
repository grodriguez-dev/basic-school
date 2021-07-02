<?php

namespace App\Http\Controllers;

use App\Models\Estudent;
use App\Models\Teacher;
use App\Models\EstudentTeacher;
use App\Http\Requests\EstudentRequest;
use Illuminate\Http\Request;

class EstudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudents = Estudent::with('teachers')->get();
        return view('estudents.index', compact('estudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('estudents.form', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudentRequest $request)
    {
        $arg = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'semester' => $request->semester
        ];

        $estudent = Estudent::create($arg);

        EstudentTeacher::create([
            'estudent_id' => $estudent->id,
            'teacher_id' => $request->teacher_id
        ]);

        return redirect()->route('estudents.index')->with('status', 'Successfully Create Estudent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudent  $estudent
     * @return \Illuminate\Http\Response
     */
    public function show(Estudent $estudent)
    {
        $teachers = Teacher::all();
        return view('estudents.form', compact('teachers', 'estudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudent  $estudent
     * @return \Illuminate\Http\Response
     */
    public function update(EstudentRequest $request, Estudent $estudent)
    {
        $estudent->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'semester' => $request->semester
        ]);

        EstudentTeacher::where('estudent_id', $estudent->id)->update([
            'teacher_id' => $request->teacher_id
        ]);

        return redirect()->route('estudents.index')->with('status', 'Successfully Create Estudent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudent  $estudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudent $estudent)
    {
        $estudent->delete();
        return redirect()->route('estudents.index')->with('status', 'Successfully Delete Estudent');
    }
}
