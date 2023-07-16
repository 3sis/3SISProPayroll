<?php

namespace App\Models\Payroll\LoanBook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanBookDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11130l0111';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'idH',
        'LALBDLoanId',
        'LALBDCompanyId',
        'LALBDLocationId',
        'LALBDEmployeeId',
        'LALBDDeductionId',
        'LALBDEMIAmount',
        'LALBDPaidAmount',
        'LALBDBalanceAmount',
        'LALBDEMIDate',
        'LALBDMarkForDeletion',
        'LALBDUser',
        'LALBDStatusId',
        'LALBDLastCreated',
        'LALBDLastUpdated',
        'LALBDDeletedAt',
    ];
    protected $casts = [
        'LALBDEMIDate' => 'datetime:d/m/Y',
        'LALBDLastCreated'  => 'datetime:d/m/Y',
        'LALBDLastUpdated'  => 'datetime:d/m/Y',
        'LALBDDeletedAt'    => 'datetime:d/m/Y'
    ];

}
