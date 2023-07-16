<?php

namespace App\Models\Payroll\Process;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdHocIncome extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11125l0411';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'PGAIDCompanyId',
        'PGAIDFiscalYear',
        'PGAIDPeriodId',
        'PGAIDLocationId',
        'PGAIDEmployeeId',
        'PGAIDIncDedId',
        'PGAIDDesc1',
        'PGAIDGrossAmount',
        'PGAIDGrossPayment',
        'PGAIDStatusId',
        'PGAIDMarkForDeletion',
        'PGAIDUser',
        'PGAIDLastCreated',
        'PGAIDLastUpdated',
        'PGAIDDeletedAt',
    ];
    protected $casts = [
        'PGAIDFromDate' => 'datetime:d/m/Y',
        'PGAIDToDate'   => 'datetime:d/m/Y',
        'PGAIDLastCreated'  => 'datetime:d/m/Y',
        'PGAIDLastUpdated'  => 'datetime:d/m/Y',
        'PGAIDDeletedAt'    => 'datetime:d/m/Y'
    ];
}
