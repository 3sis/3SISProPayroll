<?php

namespace App\Models\Config\FiscalYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostedPeriodHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05903l0111';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'FYPPDCompanyId',
        'FYPPDFiscalYearId',
        'FYPPDStartDate',
        'FYPPDEndDate',
        'FYPPDPeriod',
        'FYPPDPeriodStartDate',
        'FYPPDPeriodEndDate',
        'FYPPDMarkForDeletion',
        'FYPPDUser',
        'FYPPDLastCreated',
        'FYPPDLastUpdated',
        'FYPPDDeletedAt'
    ];
    protected $casts = [
        'FYPPDStartDate'        => 'datetime:d/m/Y',
        'FYPPDEndDate'          => 'datetime:d/m/Y',
        'FYPPDPeriodStartDate'  => 'datetime:d/m/Y',
        'FYPPDPeriodEndDate'    => 'datetime:d/m/Y',
        'FYPPDLastCreated'      => 'datetime:d/m/Y',
        'FYPPDLastUpdated'      => 'datetime:d/m/Y',
        'FYPPDDeletedAt'        => 'datetime:d/m/Y'
    ];
    public function fnPeriod()
    {
        return $this->hasOne(Period::class, 'FYPMHPeriodId', 'FYPPDCurrentPeriod');
    }
}
