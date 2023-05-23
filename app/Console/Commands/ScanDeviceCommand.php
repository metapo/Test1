<?php

namespace App\Console\Commands;

use App\Repositories\DeviceRepository\DeviceRepositoryInterface;
use App\Services\DeviceScanner\DeviceScannerFactory;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;

class ScanDeviceCommand extends Command implements Isolatable
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

    public function __construct(protected DeviceRepositoryInterface $deviceRepository)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scannerFactory = new DeviceScannerFactory();
        $scanner = $scannerFactory->create();
        $devices = $scanner->scan();

        $this->deviceRepository->saveAll($devices);


    }
}
