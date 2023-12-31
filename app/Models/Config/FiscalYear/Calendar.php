<?php

namespace App\Models\Config\FiscalYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05903l02';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'FYCAHCalendarId',
            'FYCAHDesc1',
            'FYCAHDesc2',
            'FYCAHShiftStartTime',
            'FYCAHLateComingGraceTime',
            'FYCAHShiftEndTime',
            'FYCAHEarlyGoingGraceTime',
            'FYCAHShiftBreakTime',
            'FYCAHShiftWorkingTime',
            'FYCAHBiDesc',
            'FYCAHMarkForDeletion',
            'FYCAHUser',
            'FYCAHLastCreated',
            'FYCAHLastUpdated',
            'FYCAHDeletedAt'
        ];
        protected $casts = [
            'FYCAHLastCreated'      => 'datetime:d/m/Y',
            'FYCAHLastUpdated'      => 'datetime:d/m/Y',
            'FYCAHDeletedAt'        => 'datetime:d/m/Y'
        ];
}
