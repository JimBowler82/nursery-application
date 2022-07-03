<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Centre;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->isAdmin) {
            abort(403, 'Access for administrators only');
        }

        return view('assessments.index', [
            'completed' => Assessment::completed()->get(),
            'inProgress' => Assessment::inProgress()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assessments.create', [
            'centres' => Centre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'centre_id' => 'required|numeric|exists:centres,id',
            'date' => 'required|date',
            'from_time' => 'required',
            'till_time' => 'required',
            'teachers_present' => 'required|string',
            'start_age' => 'required|numeric',
            'end_age' => 'required|numeric',
            'assessed_quantity' => 'required|numeric',
            'centre_setting_quantity' => 'required|numeric',
            'notes' => 'required|string'
        ]);

        $userId = auth()->user()->id;
        Assessment::create(array_merge([
            'user_id' => $userId
        ], $request->all()));

        return redirect()->back()->with('status', 'Assessment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Assessment $assessment)
    {
        return view('assessments.edit', [
            'assessment' => $assessment,
            'centres' => Centre::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroyed');
    }
}
