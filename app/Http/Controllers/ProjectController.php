<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
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
        $this->authorize('create', Project::class);

        return view('projects.create');
    }

    /**
     * Enregistrer un nouveau projet.
     */
    public function store(StoreProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $project = Project::create($request->validated());

        // Le créateur devient automatiquement responsable
        $project->users()->attach(auth()->id(), [
            'role' => 'responsable',
        ]);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Projet créé avec succès.');
    }

    /**
     * Afficher un projet.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        $project->load('users');

        return view('projects.show', compact('project'));
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', compact('project'));
    }

    /**
     * Mettre à jour un projet.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

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
        $this->authorize('delete', $project);

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

    // ==================================================
    // EPIC 3 : Gestion des membres & autorisations
    // ==================================================

    /**
     * US3 : Ajouter un membre au projet.
     */
    public function addMember(Request $request, Project $project)
    {
        $this->authorize('addMember', $project);

        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'role' => ['required', 'in:chercheur,etudiant_assistant'],
        ]);

        $project->users()->syncWithoutDetaching([
            $request->user_id => [
                'role' => $request->role,
            ],
        ]);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Membre ajouté avec succès.');
    }

    /**
     * US4 : Retirer un membre du projet.
     */
    public function removeMember(Project $project, User $user)
    {
        $this->authorize('removeMember', $project);

        $project->users()->detach($user->id);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Membre retiré avec succès.');
    }

    /**
     * US6 : Mettre à jour l'avancement.
     */
    public function updateProgress(Request $request, Project $project)
    {
        $this->authorize('updateProgress', $project);

        $request->validate([
            'avancement' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        $project->update([
            'avancement' => $request->avancement,
        ]);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Avancement mis à jour avec succès.');
    }
}