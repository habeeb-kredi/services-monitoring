<?php

namespace App\Console\Commands;

use App\Services\NotificationService;
use Illuminate\Console\Command;

class MonitorServicesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all Kredi Bank Services';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(NotificationService $notification)
    {
        return $notification->notification();
    }
}
