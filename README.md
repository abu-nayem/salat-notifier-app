
## clone the project
 HTTPS : https://github.com/abu-nayem/salat-notifier-app.git
## In your Laravel project, add the package as a path repository in composer.json:
    "autoload": {
        "psr-4": {
            "SalatNotifier\\": "packages/SalatNotifier/src/"
        }
    },
    "repositories": {
        "salatnotifier": {
            "type": "path",
            "url": "packages/SalatNotifier",
            "options": {
                "symlink": false
            }
        }
        
    },
## Require the package
composer require hp/salat-notifier:dev-main
## Publish the package's configuration and run the migrations:
php artisan migrate
## CRUD Operation got this url
www.yourdomain.com/salat-times

## Or Use Laravel's Tinker to test CRUD operations:

php artisan tinker

// Create a Salat Time
SalatTime::create(['type' => 'faj0r', 'time' => '05:00:00']);

// Get All Salat Times
SalatTime::all();

// Update a Salat Time
SalatTime::find(1)->update(['time' => '05:15:00']);

// Delete a Salat Time
SalatTime::find(1)->delete();

## Add the webhook URL to your .env file.

SLACK_WEBHOOK_URL=https://hooks.slack.com/services/your/slack/webhook/url

## Manually trigger the notification command to test it:
 php artisan salat:notify

## video URL 

https://drive.google.com/file/d/1v_mfgNg0K3Se4iEimQE-DlWcO757S-q9/view?usp=sharing

