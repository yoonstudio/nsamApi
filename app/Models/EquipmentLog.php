<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentLog extends Model
{
    use HasFactory;

    protected $table = 'equipment_log';

    public $timestamps = false;
}
