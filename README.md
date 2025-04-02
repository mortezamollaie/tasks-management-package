# Task-Management Package for Laravel

This is a simple task management package for Laravel. Its features include adding, updating, deleting, and viewing tasks. Additionally, it has the capability to send reminder emails for tasks with less than 24 hours remaining until their deadline.

The package also includes a role and permission system, allowing you to restrict access for different users. Initially, there is a super admin user with full access. The email for this super admin is **admin@gmail.com**, and the password is **12345678**. You can log in with this account to assign different permissions to your users. The list of available permissions is provided below.


## Installation & Setup:

To install and set up the package, first, place the **mortezamollaie** folder inside the **packages** directory of your Laravel project. (This folder is currently located in the **packages** directory.)

Next, add the following configurations to your project's **config.json** file:
```
"require": { 
	"mortezamollaie/tasks-management": "1.0.0"
}

"repositories": [  
    {  
        "type": "path",  
        "url": "packages/mortezamollaie/tasks-management",  
        "options": {  
            "symlink": true  
  }  
    }  
]
```
and then run the following command:
 ```
 composer update
```

After applying these changes, run the following command to create the necessary tables in your database:
```
php artisan migrate
```
Then, run the following command to seed the database with roles and permissions:
```
php artisan db:seed
```
Note that all required permissions are automatically stored in the database, so you don’t need to modify them. However, roles are dynamically configurable, allowing you to customize them with different permissions as needed for user access management.
Please note that all incoming requests must include **authentication token**. This package uses **Sanctum** to handle user authentication.

## Using Reminder Emails:
If you want to enable reminder email notifications for users, add the following code snippet to **app/Console/Kernel.php**:
```
protected function schedule(Schedule $schedule)
{
    $schedule->command('tasks:send-reminders')->dailyAt('08:00');
}

```

Also, run the following command on your server to create the required **cron job**:
```
php /path-to-project/artisan schedule:run >> /dev/null 2>&1
```

The Postman configuration file is provided in **tasks-management-package.postman_collection.json**.

Additionally, the sample project includes an authentication system to track user activities.
