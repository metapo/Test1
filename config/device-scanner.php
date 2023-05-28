<?php

return [
    'driver' => env('DEVICE_SCANNER_DRIVER', 'nmap'),
    'ip_range' => env('NMAP_IP_RANGE', '192.168.1.1'),
    'timeout' => env('NMAP_TIMEOUT', 120)
];
