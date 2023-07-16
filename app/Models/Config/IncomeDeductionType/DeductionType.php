<?php

namespace App\Models\Config\IncomeDeductionType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SystemsMaster\PaymentMaster\RuleDefinition;
use App\Models\SystemsMaster\PaymentMaster\PaymentCycle;
use App\Models\SystemsMaster\RoundingStrategy;

class DeductionType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11906l02';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'PMDTHDeductionId',
            'PMDTHDeductionIdK',
            'PMDTHDesc1',
            'PMDTHDesc2',
            'PMDTHApplicableFor',
            'PMDTHIsTaxExempted',
            'PMDTHIsThisLoanLine',
            'PMDTHShowInTaxList',
            'PMDTHIsIncomeDependent',
            'PMDTHIncDependentDed',
            'PMDTHDedStrategy',
            'PMDTHDedStrategyDesc',
            'PMDTHDeductionCycle',
            'PMDTHPeriodId',
            'PMDTHDedPercent',
            'PMDTHRuleId',
            'PMDTHPrintingSeq',
            'PMDTHRoundingStrategy',
            'PMDTHBiElementId',
            'PMDTHMarkForDeletion',
            'PMDTHUser',
            'PMDTHLastCreated',
            'PMDTHLastUpdated'
        ];
        protected $casts = [
            'PMDTHLastCreated' => 'datetime:d/m/Y',
            'PMDTHLastUpdated' => 'datetime:d/m/Y',
            'PMDTHDeletedAt' => 'datetime:d/m/Y'
        ];
        public function fnRule()
        {
            return $this->hasOne(RuleDefinition::class, 'PMRDHRuleId', 'PMDTHRuleId');
        }
        public function fnRounding()
        {
            return $this->hasOne(RoundingStrategy::class, 'RSRSHRoundingId', 'PMDTHRoundingStrategy');
        }
        public function fnCycle()
        {
            return $this->hasOne(PaymentCycle::class, 'PMPCHCycleId', 'PMDTHDeductionCycle');
        }
}
