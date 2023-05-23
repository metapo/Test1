<?php

namespace Database\Factories;

use Faker\Core\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $deviceNames = [null ,'mobile-apple', 'mobile-samsung', 'laptop-asus', 'router-x'];
        $openPorts = [null, [80], [8000,8001], [80, 8000, 9000, 9001]];

        return [
            'ip_address' => fake()->ipv4,
            'mac' => fake()->macAddress,
            'device_name' => $deviceNames[mt_rand(0,count($deviceNames) - 1)],
            'open_ports' => $openPorts[mt_rand(0, count($openPorts) - 1)],
        ];
    }
}
