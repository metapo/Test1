<?php

namespace App\Console\Commands;

use App\Services\DeviceScanner\DeviceScannerFactory;
use Illuminate\Console\Command;

class ScanDeviceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:devices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scanning devices in local network and storing data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scannerFactory = new DeviceScannerFactory();
        $scanner = $scannerFactory->create();
        $scanner->scan();

    }
}
