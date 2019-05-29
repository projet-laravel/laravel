<?php

namespace App\Console\Commands;

use App\Message;
use Illuminate\Console\Command;

class CodeWall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:wall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $message =  Message::all();
        $nb_message = count($message);
        $this->info("This wall actually display ". $nb_message ." messages");
    }
}
