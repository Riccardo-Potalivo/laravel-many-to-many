<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();
        // dd($formData);

        $slug = Str::slug($formData['title'] . '-');
        $formData['slug'] = $slug;
        // dd($request);

        // associamo all'elemento l'utente che l'ha creato
        $userId = Auth::id();
        $formData['user_id'] = $userId;

        if ($request->hasFile('image')) {

            $img_path = Storage::put('img', $formData['image']);
            $formData['image'] = $img_path;
        }

        $project = Project::create($formData);

        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
            // dd($project->technologies());
        }

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();

        $slug = Str::slug($formData['title'] . '-');
        $formData['slug'] = $slug;

        //aggiungiamo l'id dell'utente proprietario del post
        $formData['user_id'] = $project->user_id;

        if ($request->hasFile('image')) {

            if ($project->image) {
                Storage::delete($project->image);
            }

            $img_path = Storage::put('img', $formData['image']);
            $formData['image'] = $img_path;
        }
        // dd($formData);

        $project->update($formData);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();

        $project->delete();

        return to_route('admin.projects.index')->with('message', "$project->title eliminato con successo");

    }
}
