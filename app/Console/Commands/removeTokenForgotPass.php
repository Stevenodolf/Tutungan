<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class removeTokenForgotPass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'removeTokenForgotPass:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Token when the created_at date more than 1 day';

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
     * @return int
     */
    public function handle()
    {
        DB::select("DELETE
                FROM
                tutungandb.password_resets
                WHERE created_at < NOW();");
        echo "Token more than 1 day removed!";
        return 0;
    }
}
