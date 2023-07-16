<?php

namespace App\Models\Payroll\LoanBook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payroll\EmployeeMaster\GeneralInfo;
use App\Models\Config\Geographic\Location;
use App\Models\Config\IncomeDeductionType\DeductionType;
class LoanBookHeader extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11130l01';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'LALBHLoanId',
        'LALBHCompanyId',
        'LALBHLocationId',
        'LALBHEmployeeId',
        'LALBHDeductionId',
        'LALBHLoanAmount',
        'LALBHInterestAmount',
        'LALBHRecoveryAmount',
        'LALBHNoOfEMI',
        'LALBHEMIAmount',
        'LALBHTotalDeduction',
        'LALBHStartDateEMI',
        'LALBHEndDateEMI',
        'LALBHPaidEMI',
        'LALBHBalanceEMI',
        'LALBHPaidAmount',
        'LALBHBalanceAmount',
        'LALBHLoanPaidFully',
        'LALBHMarkForDeletion',
        'LALBHUser',
        'LALBHStatusId',
        'LALBHLastCreated',
        'LALBHLastUpdated',
        'LALBHDeletedAt',
    ];
    protected $casts = [
        'LALBHStartDateEMI' => 'datetime:d/m/Y',
        'LALBHEndDateEMI'   => 'datetime:d/m/Y',
        'LALBHLastCreated'  => 'datetime:d/m/Y',
        'LALBHLastUpdated'  => 'datetime:d/m/Y',
        'LALBHDeletedAt'    => 'datetime:d/m/Y'
    ];

    public function fnEmployee()
    {
        return $this->hasOne(GeneralInfo::class, 'EMGIHEmployeeId', 'LALBHEmployeeId');
    }
    public function fnLocation()
    {
        return $this->hasOne(Location::class, 'GMLMHLocationId', 'LALBHLocationId');
    }
    public function fnDeduction()
    {
        return $this->hasOne(DeductionType::class, 'PMDTHDeductionId', 'LALBHDeductionId');
    }
}
