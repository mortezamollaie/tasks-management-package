<?php

namespace Mortezamollaie\TasksManagement\Console\Commands;

use Illuminate\Console\Command;
use Mortezamollaie\TasksManagement\Models\Task;
use Mortezamollaie\TasksManagement\Mail\HighlightedTaskReminder;
use Illuminate\Support\Facades\Mail;

class SendHighlightedTasksReminderCommand extends Command
{
    protected $signature = 'tasks:send-reminders';
    protected $description = 'Send reminder emails for important tasks (is_highlighted = true)';

    public function handle()
    {
        $this->info('Checking for important tasks...');

        $tasks = Task::all()->filter(fn($task) => $task->is_highlighted);

        foreach ($tasks as $task) {
            if ($task->user) {
                Mail::to($task->user->email)->send(new HighlightedTaskReminder($task));
                $this->info("Email sent to: " . $task->user->email);
            }
        }

        $this->info('Reminder emails have been sent successfully.');
    }
}
