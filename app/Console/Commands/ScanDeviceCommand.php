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
    public function handle(DeviceScannerFactory $scannerFactory)
    {
        $ipRange = config('device-scanner.ip_range');
        $timeout = config('device-scanner.timeout');

        $ipRange = $this->ask('Write IP Range (*.*.*.* or *.*.*.*/*  or *.*.*.*-*), Enter to use Default:', $ipRange);
        $timeout = $this->ask('Write timeout (in second), Enter to use Default:', $timeout);

        $this->line('Please wait for response : ');

        try {
            $scanner = $scannerFactory->create();
            $devices = $scanner->scan($ipRange, $timeout);

            if (!$devices) {
                $this->info('No device found!');
                $this->newLine();
                return;
            }
            $this->deviceRepository->saveAll($devices);

            $this->info(count($devices) . ' devices have been added successfully.');
            $this->newLine();

        } catch (\Throwable $e) {
            $this->error($e->getMessage());
            $this->newLine();
        }
    }
}
