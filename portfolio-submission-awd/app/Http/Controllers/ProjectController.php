<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('projects/index', [
            'projects' => Project::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('projects/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100', 'unique:projects,title'],
            'description' => ['required', 'min:20', 'max:500'],
            'tech_stack' => ['required', 'string', 'max:150'],
            'date_completed' => ['required', 'date', 'before_or_equal:today'],
        ], [
            'title.unique' => 'You already have a project with that title.',
        ]);

        Project::create($validated);

        Inertia::flash('toast', ['type' => 'success', 'message' => 'Project created.']);

        return to_route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): Response
    {
        return Inertia::render('projects/edit', [
            'project' => $project,
        ]);
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100', Rule::unique('projects', 'title')->ignore($project->id)],
            'description' => ['required', 'min:20', 'max:500'],
            'tech_stack' => ['required', 'string', 'max:150'],
            'date_completed' => ['required', 'date', 'before_or_equal:today'],
        ], [
            'title.unique' => 'You already have a project with that title.',
            'date_completed.before_or_equal' => 'The completion date cannot be in the future.',
        ]);

        $project->update($validated);

        Inertia::flash('toast', ['type' => 'success', 'message' => 'Project updated.']);

        return to_route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        Inertia::flash('toast', ['type' => 'success', 'message' => 'Project deleted.']);

        return to_route('projects.index');
    }
}
