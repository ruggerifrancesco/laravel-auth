<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DEBUG RUN (DEV ONLY) -> Uncomment this for testing
        // dd($request->all());
        // die;

        $dataProject = $request->validate([
            'title' => ['required', 'unique:projects','min:5', 'max:255'],
            'goals' => ['required', 'array', 'min:1'],
            'budget' => ['required'],
            'nPartecipants' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'min:30'],
        ]);

        $dataProject['goals'] = json_encode($dataProject['goals']);

        $newProject = Project::create($dataProject);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        $dataProject = $request->validate([
            'title' => ['required','min:5', 'max:255', Rule::unique('projects')->ignore($project->id)],
            'goals' => ['required', 'array', 'min:1'],
            'budget' => ['required'],
            'nPartecipants' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'min:30'],
        ]);


        $project->update($dataProject);

        return redirect()->route('admin.projects.index', compact('project'))->with('success', 'Project edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display a listing of the deleted resources.
     */
    public function deletedIndex()
    {
        $projects = Project::onlyTrashed()->paginate(10);

        return view('admin.projects.deleted', compact('projects'));
    }

    /**
     * Restoring the specified resource from deleted storage.
     */
    public function restore(string $id)
    {
        $post = Post::onlyTrashed()->findOrFail($slug);
        $post->restore();

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Delete permantently the specified resource from storage.
     */

    public function obliterate(string $id)
    {
        $post = Post::onlyTrashed()->findOrFail($slug);
        $post->forceDelete();

        return redirect()->route('admin.posts.index');
    }
}
