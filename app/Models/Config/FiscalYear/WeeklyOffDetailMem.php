<?php

namespace App\Models\Config\FiscalYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyOffDetailMem extends Model
{
    use HasFactory;
    protected $table = 't05903l0312';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'FYWOMDayId',
            'FYWOMDesc1',
            'FYWOMAll',
            'FYWOMFirst',
            'FYWOMSecond',
            'FYWOMThird',
            'FYWOMFourth',
            'FYWOMFifth'
        ];
}
