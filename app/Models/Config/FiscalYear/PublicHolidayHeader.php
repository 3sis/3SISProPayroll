<?php

namespace App\Models\Config\FiscalYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicHolidayHeader extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05903l04';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'FYPHHCalendarId',
            'FYPHHFiscalYearId',
            'FYPHHMarkForDeletion',
            'FYPHHUser',
            'FYPHHLastCreated',
            'FYPHHLastUpdated',
            'FYPHHDeletedAt'
        ];
        protected $casts = [
            'FYPHHLastCreated'      => 'datetime:d/m/Y',
            'FYPHHLastUpdated'      => 'datetime:d/m/Y',
            'FYPHHDeletedAt'        => 'datetime:d/m/Y'
        ];
        public function fnCalendar()
        {
            return $this->hasOne(Calendar::class, 'FYCAHCalendarId', 'FYPHHCalendarId');
        }
        public function fnFy()
        {
            return $this->hasOne(FiscalYear::class, 'FYFYHFiscalYearId', 'FYPHHFiscalYearId');
        }
}
