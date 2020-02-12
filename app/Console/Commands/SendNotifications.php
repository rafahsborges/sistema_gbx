<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Notification;
use Carbon\Carbon;
use App\Jobs\SendMailJob;
use App\Models\AdminUser;
use App\Mail\NewNotifications;

class SendNotifications extends Command
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
        $now = Carbon::now();

        $notifications = Notification::where('agendamento', '<=', $now)->get();

        if ($notifications !== null) {
            //Get all notifications that their dispatch date is due
            foreach ($notifications as $notification) {
                if ($notification->envio === null) {
                    $clientes = [];
                    foreach (json_decode($notification->id_cliente) as $cliente) {
                        $clientes[] = AdminUser::find($cliente);
                    }
                    foreach ($clientes as $cliente) {
                        dispatch(new SendMailJob(
                                $cliente->email,
                                new NewNotifications($cliente, $notification))
                        );
                    }
                    $notification->enviado = true;
                    $notification->envio = Carbon::now();
                    $notification->save();
                }
            }
        }
    }
}
