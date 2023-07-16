<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationMaster extends Model
{
    use HasFactory;
    protected $table = 't00900l01';
    protected $fillable = [
        'AMAMHAppId',
        'AMAMHDesc1'
    ];
}
