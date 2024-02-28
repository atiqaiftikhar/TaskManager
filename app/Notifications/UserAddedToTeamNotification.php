<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserAddedToTeamNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('You have been added to a new project.')
            ->line('Project Name: ' . $this->project->name)
            ->line('Project Description: ' . $this->project->description)
            ->action('View Project', route('project.index', $this->project->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
