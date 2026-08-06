<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Afficher tous les projets.
     */
    public function index()
    {
        $projects = Project::latest()->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Enregistrer un nouveau projet.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());

        return redirect()
            ->route('projects.index')
            ->with('success', 'Projet créé avec succès.');
    }

    /**
     * Afficher un projet.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Mettre à jour un projet.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()
            ->route('projects.index')
            ->with('success', 'Projet mis à jour avec succès.');
    }

    /**
     * Archiver un projet.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Projet archivé avec succès.');
    }

        /**
     * Afficher les projets archivés.
     */
    public function archived()
    {
        $projects = Project::onlyTrashed()->get();

        return view('projects.archived', compact('projects'));
    }

    /**
     * Restaurer un projet archivé.
     */
    public function restore($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);

        $project->restore();

        return redirect()
            ->route('projects.archived')
            ->with('success', 'Projet restauré avec succès.');
    }
}