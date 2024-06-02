<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Project/Index', 
       [
        'projects' => Project::all()
       ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Project/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_name' => 'required|string',
            'abbreviated_project_name' => 'required|string',
            'subsidiary' => 'required|string',
            'project_number' => 'required|integer|min:0|max:9999999',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'timezone' => 'required|string',
            'average_hourly_rate' => 'required|integer|min:20|max:200',
            'estimated_hours' => 'nullable|integer|min:0',
            'deadline' => 'required',
            'completed' => 'required|boolean',
            'daily_qr_code' => 'required|boolean',
            
        ]);
     
        Project::create($validatedData);

        return redirect()->route('project.index')->with('success', 'Listing was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
