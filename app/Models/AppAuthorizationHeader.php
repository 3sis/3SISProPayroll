<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppAuthorizationHeader extends Model
{
    use HasFactory;
    protected $table = 't00900l06';
    protected $fillable = [
        'user_id',
        'AAAHHAppId',
        'AAAHHDesc1',
    ];
}
