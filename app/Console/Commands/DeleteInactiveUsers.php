<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactive_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will Delete all Inactive users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::where('status',0)->restore();
       //$name = $this->ask('what is your name?');
       //dd($name);
       //$password = $this->secret('what is your password?');
       //if($this->confirm('are you want to delete this user?')){
       // dd("yes proceed");
       //}
      // $name = $this->anticipate('what is your name ?',['irfan','waseem']);
      // $this->info('this is a name');
      // $a = 10;
       //$b = 70;
      // $c = $a + $b;
      // $this ->info ($c);
       

       
    }
}
