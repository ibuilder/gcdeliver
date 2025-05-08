<?php

namespace App\Notifications;

use App\Models\DailyReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DailyReportSubmittedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.     
     */
    public function __construct(DailyReport $dailyReport)
    {
        $this->dailyReport = $dailyReport;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Daily Report Submitted for Project: ' . $this->dailyReport->project->name)
                    ->line('A daily report for project ' . $this->dailyReport->project->name . ' on ' . $this->dailyReport->report_date . ' has been submitted.')
                    ->line('Weather conditions: ' . $this->dailyReport->weather_conditions)
                    ->line('Notes: ' . $this->dailyReport->notes)
                    ->line('Manpower information: ' . $this->dailyReport->manpower_information)
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
            'daily_report_id' => $this->dailyReport->id,
            'project_id' => $this->dailyReport->project_id,
            'message' => 'A daily report for project ' . $this->dailyReport->project->name . ' on ' . $this->dailyReport->report_date . ' has been submitted.',
      ];
    }
}
