<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    /**
     * Récupérer le rôle de l'utilisateur dans le projet.
     */
    private function role(User $user, Project $project): ?string
    {
        return $project->users()
            ->where('user_id', $user->id)
            ->first()?->pivot?->role;
    }

    /**
     * Voir la liste des projets.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Voir un projet.
     * Responsable + Chercheur + Étudiant assistant.
     */
    public function view(User $user, Project $project): bool
    {
        return $this->role($user, $project) !== null;
    }

    /**
     * Créer un projet.
     * Tout utilisateur authentifié peut créer un projet.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Modifier les informations générales du projet.
     * Responsable uniquement.
     */
    public function update(User $user, Project $project): bool
    {
        return $this->role($user, $project) === 'responsable';
    }

    /**
     * Archiver un projet.
     * Responsable uniquement.
     */
    public function delete(User $user, Project $project): bool
    {
        return $this->role($user, $project) === 'responsable';
    }

    /**
     * Restaurer un projet archivé.
     * Responsable uniquement.
     */
    public function restore(User $user, Project $project): bool
    {
        return $this->role($user, $project) === 'responsable';
    }

    /**
     * Suppression définitive.
     * Non utilisée dans Grimoire.
     */
    public function forceDelete(User $user, Project $project): bool
    {
        return false;
    }

    /**
     * Ajouter un membre.
     * Responsable uniquement.
     */
    public function addMember(User $user, Project $project): bool
    {
        return $this->role($user, $project) === 'responsable';
    }

    /**
     * Retirer un membre.
     * Responsable uniquement.
     */
    public function removeMember(User $user, Project $project): bool
    {
        return $this->role($user, $project) === 'responsable';
    }

    /**
     * Mettre à jour l'avancement.
     * Responsable et Chercheur.
     */
    public function updateProgress(User $user, Project $project): bool
    {
        return in_array(
            $this->role($user, $project),
            ['responsable', 'chercheur']
        );
    }
}