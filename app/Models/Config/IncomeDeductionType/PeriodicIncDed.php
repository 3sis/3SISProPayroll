<?php

namespace App\Models\Config\IncomeDeductionType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodicIncDed extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11906l010211';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'PMIDDIncDedId',
            'PMIDDIncDedIdK',
            'PMIDDIncOrDed',
            'PMIDDDesc',
            'PMIDDPeriodId',
            'PMIDDMarkForDeletion',
            'PMIDDUser',
            'PMIDDLastCreated',
            'PMIDDLastUpdated',
            'PMIDDDeletedAt'
        ];
        protected $casts = [
            'PMIDDLastCreated' => 'datetime:d/m/Y',
            'PMIDDLastUpdated' => 'datetime:d/m/Y',
            'PMIDDDeletedAt' => 'datetime:d/m/Y'
        ];
}
