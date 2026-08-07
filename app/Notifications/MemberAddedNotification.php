<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MemberAddedNotification extends Notification
{
    use Queueable;

    public Project $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Ajout à un projet')
            ->greeting('Bonjour '.$notifiable->name)
            ->line('Vous avez été ajouté au projet : '.$this->project->title)
            ->action('Voir le projet', url('/projects/'.$this->project->id))
            ->line('Merci d’utiliser Grimoire.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'project_id' => $this->project->id,
            'project_title' => $this->project->title,
        ];
    }
}