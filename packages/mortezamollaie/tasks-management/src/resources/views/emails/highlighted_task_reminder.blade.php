<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Important Task Reminder</title>
    </head>
    <body>
        <h2>Hello,</h2>
        <p>The following task is approaching its deadline and has less than 24 hours remaining:</p>

        <h3>{{ $task->title }}</h3>
        <p>Due Date: {{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d H:i') }}</p>

        <p>Please take action on it.</p>
    </body>
</html>
