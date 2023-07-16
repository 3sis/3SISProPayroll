<?php

namespace App\Models\Config\FiscalYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicHolidayDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05903l0411';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'idH',
            'FYPHDCalendarId',
            'FYPHDFiscalYearId',
            'FYPHDHolidayType',
            'FYPHDHolidayDate',
            'FYPHDDesc1',
            'FYPHDDesc2',
            'FYPHDBiDesc',
            'FYPHDMarkForDeletion',
            'FYPHDUser',
            'FYPHDLastCreated',
            'FYPHDLastUpdated',
            'FYPHDDeletedAt'
        ];
        protected $casts = [
            'FYPHDHolidayDate'      => 'datetime:d/m/Y',
            'FYPHDLastCreated'      => 'datetime:d/m/Y',
            'FYPHDLastUpdated'      => 'datetime:d/m/Y',
            'FYPHDDeletedAt'        => 'datetime:d/m/Y'
        ];
}
