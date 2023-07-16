<?php

namespace App\Models\Config\IncomeDeductionType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncDependentDed extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11906l0211';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'idH',
        'PMDTDDeductionId',
        'PMDTDDeductionIdK',
        'PMDTDIncomeId',
        'PMDTDIncomeIdK',
        'PMDTDIsSelect',
        'PMDTDDedPercent',
        'PMDTDMarkForDeletion',
        'PMDTDUser',
        'PMDTDLastCreated',
        'PMDTDLastUpdated'
    ];
    protected $casts = [
        'PMDTDLastCreated'  => 'datetime:d/m/Y',
        'PMDTDLastUpdated'  => 'datetime:d/m/Y',
        'PMDTDDeletedAt'    => 'datetime:d/m/Y'
    ];
    public function fnIncome()
    {
        return $this->hasOne(IncomeType::class, 'PMITHIncomeId', 'PMDTDIncomeId');
    }
}
