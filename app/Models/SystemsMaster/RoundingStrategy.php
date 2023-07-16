<?php

namespace App\Models\SystemsMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoundingStrategy extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't00905l01';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'RSRSHRoundingId',
        'RSRSHDesc1',
    ];
}
