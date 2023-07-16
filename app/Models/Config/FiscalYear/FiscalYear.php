<?php

namespace App\Models\Config\FiscalYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05903l01';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'FYFYHCompanyId',
        'FYFYHFiscalYearId',
        'FYFYHStartDate',
        'FYFYHEndDate',
        'FYFYHCurrentFY',
        'FYFYHCurrentPeriod',
        'FYFYHPeriodStartDate',
        'FYFYHPeriodEndDate',
        'FYFYHMarkForDeletion',
        'FYFYHUser',
        'FYFYHLastCreated',
        'FYFYHLastUpdated',
        'FYFYHDeletedAt'
    ];
    protected $casts = [
        'FYFYHStartDate'        => 'datetime:d/m/Y',
        'FYFYHEndDate'          => 'datetime:d/m/Y',
        'FYFYHPeriodStartDate'  => 'datetime:d/m/Y',
        'FYFYHPeriodEndDate'    => 'datetime:d/m/Y',
        'FYFYHLastCreated'      => 'datetime:d/m/Y',
        'FYFYHLastUpdated'      => 'datetime:d/m/Y',
        'FYFYHDeletedAt'        => 'datetime:d/m/Y'
    ];
    public function fnPeriod()
    {
        return $this->hasOne(Period::class, 'FYPMHPeriodId', 'FYFYHCurrentPeriod');
    }
}
