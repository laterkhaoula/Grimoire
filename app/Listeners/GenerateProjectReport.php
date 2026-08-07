<?php

namespace App\Listeners;

use App\Events\ProjectClosed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class GenerateProjectReport implements ShouldQueue
{
    public function handle(ProjectClosed $event): void
    {
        $project = $event->project;

        $content = "
Rapport du projet
=================

Titre : {$project->title}

Description :
{$project->description}

Statut :
{$project->status}

Avancement :
{$project->avancement} %

Nombre de membres :
".$project->users()->count()."
";

        Storage::put(
            'reports/project_'.$project->id.'.txt',
            $content
        );
    }
}