<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\MalaDireta;
use Carbon\Carbon;
use App\Jobs\SendMailJob;
use App\Models\AdminUser;
use App\Mail\NewMalaDiretas;

class SendMalaDiretas extends Command
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

        $malaDiretas = MalaDireta::where('agendamento', '<=', $now)->get();

        if ($malaDiretas !== null) {
            //Get all malaDiretas that their dispatch date is due
            foreach ($malaDiretas as $malaDireta) {
                if ($malaDireta->envio === null) {
                    $clientes = [];
                    foreach (json_decode($malaDireta->id_cliente) as $cliente) {
                        $clientes[] = AdminUser::find($cliente);
                    }
                    foreach ($clientes as $cliente) {
                        dispatch(new SendMailJob(
                                $cliente->email,
                                new NewMalaDiretas($cliente, $malaDireta))
                        );
                    }
                    $malaDireta->enviado = true;
                    $malaDireta->envio = Carbon::now();
                    $malaDireta->save();
                }
            }
        }
    }
}
