<?php

namespace App\Models\Config\FiscalYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyOffHeader extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05903l03';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'weekday',
            'FYWOHCalendarId',
            'FYWOHFiscalYearId',
            'FYWOHDesc1',
            'FYWOHDesc2',
            'FYWOHSunday',
            'FYWOHMonday',
            'FYWOHTuesday',
            'FYWOHWednesday',
            'FYWOHThursday',
            'FYWOHFriday',
            'FYWOHSaturday',
            'FYWOHTotalWeeklyOff',
            'FYWOHBiDesc',
            'FYWOHMarkForDeletion',
            'FYWOHUser',
            'FYWOHLastCreated',
            'FYWOHLastUpdated',
            'FYWOHDeletedAt'
        ];
        protected $casts = [
            'FYWOHLastCreated'      => 'datetime:d/m/Y',
            'FYWOHLastUpdated'      => 'datetime:d/m/Y',
            'FYWOHDeletedAt'        => 'datetime:d/m/Y'
        ];
    public function fnCalendar()
    {
        return $this->hasOne(Calendar::class, 'FYCAHCalendarId', 'FYWOHCalendarId');
    }
    public function fnFy()
    {
        return $this->hasOne(FiscalYear::class, 'FYFYHFiscalYearId', 'FYWOHFiscalYearId');
    }
}
