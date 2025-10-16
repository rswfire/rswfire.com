<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearEverything extends Command
{
    protected $signature = 'clear:everything';
    protected $description = 'Nuclear option: clear ALL Laravel caches';

    public function handle()
    {
        $this->info('🔥 Clearing all caches...');

        $commands = [
            'cache:clear' => 'Application cache',
            'config:clear' => 'Configuration cache',
            'route:clear' => 'Route cache',
            'view:clear' => 'Compiled views',
            'event:clear' => 'Cached events',
            'optimize:clear' => 'Optimization cache',
        ];

        foreach ($commands as $command => $description) {
            $this->info("  → {$description}");
            Artisan::call($command);
        }

        // Clear compiled files
        if (file_exists($compiledFile = base_path('bootstrap/cache/compiled.php'))) {
            unlink($compiledFile);
            $this->info('  → Removed compiled.php');
        }

        if (file_exists($servicesFile = base_path('bootstrap/cache/services.php'))) {
            unlink($servicesFile);
            $this->info('  → Removed services.php');
        }

        $this->info('✅ All caches cleared!');

        return Command::SUCCESS;
    }
}
