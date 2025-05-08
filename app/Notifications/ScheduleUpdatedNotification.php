<?php

namespace App\Notifications;

use App\Models\Schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ScheduleUpdatedNotification extends Notification
{
    use Queueable;

    public $schedule;

    /**
     * Create a new notification instance.
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     * 
     * @param  mixed  $notifiable
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     * 
     * @param  mixed  $notifiable
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Schedule Updated for Project: ' . $this->schedule->project->name)
                    ->line('The schedule for project ' . $this->schedule->project->name . ' has been updated.')
                    ->line('Schedule Name: ' . $this->schedule->name)
                    ->line('Start Date: ' . $this->schedule->start_date)
                    ->line('End Date: ' . $this->schedule->end_date);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [            
            'schedule_id' => $this->schedule->id,
            'project_id' => $this->schedule->project_id,
            'message' => 'The schedule for project ' . $this->schedule->project->name . ' has been updated.',
        ];
    }
}
