<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InterviewScheduledForInterviewer extends Notification
{
    use Queueable;
    protected $interviewDetails;
    protected $candidateName;

    /**
     * Create a new notification instance.
     */
    public function __construct($interviewDetails, $candidateName)
    {
        $this->interviewDetails = $interviewDetails;
        $this->candidateName = $candidateName;
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
            ->subject('New Interview Scheduled with Candidate')
            ->view(
                'emails.interview-interviewer',
                [
                    'interviewDetails' => $this->interviewDetails,
                    'candidateName' => $this->candidateName,
                    'interviewer' => $notifiable
                ]
            );
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
