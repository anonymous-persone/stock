<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Project';

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
        // shell_exec('composer update');
        
        // shell_exec('composer dump-autoload');

        Artisan::call('migrate:refresh' , ['--force' => true ,]);

        $this->info(Artisan::output());

        Artisan::call('db:seed' ,
            ['--force' => true , '--no-interaction' => true ,]);

        $this->info(Artisan::output());

        Artisan::call('passport:install' , ['--force' => true ,]);

        $this->info(Artisan::output());

        /*
        Artisan::call('voyager:install' , ['--force' => true ,]);

        $this->info(Artisan::output());

        Artisan::call('voyager:admin a@b.c' , ['--force' => true ,]); // --create

        $this->info(Artisan::output());
        */
    }
}
