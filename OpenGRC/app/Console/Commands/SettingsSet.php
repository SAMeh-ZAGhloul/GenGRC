<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SettingsSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:set {key} {value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set a setting';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $key = $this->argument('key');
        $value = $this->argument('value');
        setting([$key => $value]);
    }
}
