<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('optimize:clear');
        $this->info('Project optimized successfully.');
        $this->call('migrate:fresh');
        $this->info('Fresh database migrated successfully.');
        $this->call('db:seed');
        $this->info('Data seeded successfully.');
    }
}
