<?php

namespace App\Models\Config\IncomeDeductionType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SystemsMaster\PaymentMaster\RuleDefinition;
use App\Models\SystemsMaster\PaymentMaster\PaymentCycle;
use App\Models\SystemsMaster\RoundingStrategy;
class IncomeType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11906l01';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'PMITHIncomeId',
            'PMITHIncomeIdK',
            'PMITHDesc1',
            'PMITHDesc2',
            'PMITHIsTaxable',
            'PMITHRuleId',
            'PMITHRentExemptPercent',
            'PMITHRentCityPercent',
            'PMITHIncomeCycle',
            'PMITHPeriodId',
            'PMITHPrintingSeq',
            'PMITHRoundingStrategy',
            'PMITHBiElementId',
            'PMITHMarkForDeletion',
            'PMITHUser',
            'PMITHLastCreated',
            'PMITHLastUpdated'
        ];
        protected $casts = [
            'PMITHLastCreated' => 'datetime:d/m/Y',
            'PMITHLastUpdated' => 'datetime:d/m/Y',
            'PMITHDeletedAt' => 'datetime:d/m/Y'
        ];
        public function fnRule()
        {
            return $this->hasOne(RuleDefinition::class, 'PMRDHRuleId', 'PMITHRuleId');
        }
        public function fnRounding()
        {
            return $this->hasOne(RoundingStrategy::class, 'RSRSHRoundingId', 'PMITHRoundingStrategy');
        }
        public function fnCycle()
        {
            return $this->hasOne(PaymentCycle::class, 'PMPCHCycleId', 'PMITHIncomeCycle');
        }
}
