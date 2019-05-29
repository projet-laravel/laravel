<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Message;

class codeWall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:wall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Afficher la liste des post sur le wall';

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

        $messages = Message::all();
        $nb_messages = count($messages);
        $this->info('The wall have'. $nb_messages .'messages');
    }
}
