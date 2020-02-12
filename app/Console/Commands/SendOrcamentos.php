<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Orcamento;
use Carbon\Carbon;
use App\Jobs\SendMailJob;
use App\Models\AdminUser;
use App\Mail\NewOrcamentos;

class SendOrcamentos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:orcamentos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to orcamentos';


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

        $orcamentos = Orcamento::where('agendamento', '<=', $now)->get();

        if ($orcamentos !== null) {
            //Get all orcamentos that their dispatch date is due
            foreach ($orcamentos as $orcamento) {
                if ($orcamento->envio === null) {
                    dispatch(new SendMailJob(
                            $orcamento->email,
                            new NewOrcamentos($orcamento))
                    );
                    $orcamento->enviado = true;
                    $orcamento->envio = Carbon::now();
                    $orcamento->save();
                }
            }
        }
    }
}
