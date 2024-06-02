<?php

namespace App\Http\Controllers;

use App\Models\Swms;
use App\Models\Project;
use Illuminate\Http\Request;

class SwmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Swms/Index', [
            'swmss' => Swms::with('project')->get(),
            'projects' => Project::all(),
        ]
       
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Swms/Create',
        [
            'projects' => Project::all(),
        ]
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'swms_name' => 'required|string',
            'version' => 'required|string',
            'project_id' => 'required',
        ]);
        
        Swms::create($validatedData);

        return redirect()->route('swms.index')->with('success', 'SWMS was created!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Swms $swm)
    {
        return inertia('Swms/Show', 
       [
        'swms' => $swm
       ]
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
