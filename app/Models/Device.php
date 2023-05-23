<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address', 'mac', 'device_name', 'open_ports'];

    protected $casts = [
        'open_ports' => 'array',
    ];
}
