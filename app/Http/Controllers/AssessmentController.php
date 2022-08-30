<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Centre;
use App\Models\Subscale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use JavaScript;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
     */
    public function create()
    {
        return view('assessments.create', [
            'centres' => Centre::all(),
            'sidebarData' => Subscale::with('items.questions')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

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

        $assessment =  Assessment::create(array_merge([
            'user_id' => $userId
        ], $request->all()));

        if(!$assessment) {
            return redirect()->back()->with('status', 'Assessment creation failed');
        }

        return redirect()->route('assessments.perform', ['assessment' => $assessment->id]);

    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Request $request, Assessment $assessment)
    {

        return view('assessments.show', [
            'assessment' => $assessment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Request $request, Assessment $assessment)
    {
        return view('assessments.edit', [
            'assessment' => $assessment,
            'centres' => Centre::all(),
            'sidebarData' => Subscale::with('items.questions')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Assessment $assessment)
    {
        $assessment->update($request->all());
        $assessment->save();


        return redirect()->route('assessments.perform', ['assessment' => $assessment->id]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Assessment $assessment)
    {
        Log::info('here');
        $assessment->delete();

        return redirect()->route('home')->with('success', 'Assessment deleted successfully');
    }

    public function perform(Assessment $assessment)
    {
        JavaScript::put([
            'assessmentId' => $assessment->id
        ]);

        return view('assessments.perform', [
            'assessment' => $assessment
        ]);
    }
}
