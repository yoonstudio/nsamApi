<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'ns_userinfo';
    protected $primaryKey = 'user_seq';

    public $timestamps = false;

    public function equipments(){
        return $this->hasMany(Equipment::class);
    }

}
