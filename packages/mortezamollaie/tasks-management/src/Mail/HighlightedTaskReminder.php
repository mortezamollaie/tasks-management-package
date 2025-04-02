<?php

namespace Mortezamollaie\TasksManagement\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mortezamollaie\TasksManagement\Models\Task;

class HighlightedTaskReminder extends Mailable
{
    use Queueable, SerializesModels;

    public Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function build()
    {
        return $this->subject('task-reminder')
            ->view('tasks-management::emails.highlighted_task_reminder')
            ->with(['task' => $this->task]);
    }
}

