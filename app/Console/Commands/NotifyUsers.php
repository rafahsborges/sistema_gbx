<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Notification;
use Carbon\Carbon;
use App\Jobs\SendMailJob;
use App\Models\AdminUser;
use App\Mail\NewArrivals;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to users';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //One hour is added to compensate for PHP being one hour faster
        $now = date("Y-m-d H:i", strtotime(Carbon::now()->addHour()));
        logger($now);

        $notifications = Notification::get();
        if ($notifications !== null) {
            //Get all notifications that their dispatch date is due
            $notifications->where('agendamento', $now)->each(function ($notification) {
                if ($notification->envio === false) {
                    $users = User::all();
                    foreach ($users as $user) {
                        dispatch(new SendMailJob(
                                $user->email,
                                new NewArrivals($user, $notification))
                        );
                    }
                    $notification->envio = true;
                    $notification->save();
                }
            });
        }
    }
}
