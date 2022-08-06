<?php

namespace App\Http\Controllers;

use App\Http\Requests\CentreRequest;
use App\Models\Centre;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('centres.index', [
            'centres' => Centre::centre()->get(),
            'settings' => Centre::setting()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('centres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CentreRequest $request
     * @return RedirectResponse
     */
    public function store(CentreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $centre = Centre::create($validated);

        return redirect()->back()->with('status', ucwords($centre->type) . ' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Centre $centre
     * @return Application|Factory|View
     */
    public function show(Centre $centre)
    {
        return view('centres.edit', [
            'centre' => $centre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Centre $centre
     * @return Application|Factory|View
     */
    public function edit(Centre $centre)
    {
        return view('centres.edit', [
            'centre' => $centre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CentreRequest $request
     * @param Centre $centre
     * @return RedirectResponse
     */
    public function update(CentreRequest $request, Centre $centre): RedirectResponse
    {
        $validated = $request->validated();

        $centre->update($validated);

        return redirect()->back()->with('status', ucwords($centre->type) . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Centre $centre
     * @return RedirectResponse
     */
    public function destroy(Centre $centre): RedirectResponse
    {
        $centre->delete();

        return redirect(route('centres.index'))->with('status', ucwords($centre->type) . ' deleted successfully');
    }
}
