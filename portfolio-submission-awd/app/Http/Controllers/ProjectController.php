<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

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

        $validated = $request->validate($this->rules(), $this->messages());
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        Inertia::flash('toast', ['type' => 'success', 'message' => 'Project created.']);

        return to_route('projects.index');
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
        $validated = $request->validate($this->rules($project), $this->messages());
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        } else {
            unset($validated['image']); // keep the existing image
        }

        $project->update($validated);

        Inertia::flash('toast', ['type' => 'success', 'message' => 'Project updated.']);

        return to_route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        Inertia::flash('toast', ['type' => 'success', 'message' => 'Project deleted.']);

        return to_route('projects.index');
    }

    private function rules(?Project $project = null): array
    {
        return [
            'title' => ['required', 'string', 'max:100', Rule::unique('projects', 'title')->ignore($project?->id)],
            'description' => ['required', 'min:20', 'max:500'],
            'tech_stack' => ['required', 'string', 'max:150'],
            'project_url' => ['nullable', 'url', 'max:255'],
            'repo_url' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'date_completed' => ['required', 'date', 'before_or_equal:today'],
        ];
    }

    private function messages(): array
    {
        return [
            'title.unique' => 'You already have a project with that title.',
            'date_completed.before_or_equal' => 'The completion date cannot be in the future.',
            'project_url.url' => 'Enter a full link, like https://example.com.',
            'repo_url.url' => 'Enter a full link, like https://github.com/you/repo.',
            'image.max' => 'The image must be 2 MB or smaller.',
            'image.uploaded' => 'The image must be 2 MB or smaller.',
        ];
    }
}
