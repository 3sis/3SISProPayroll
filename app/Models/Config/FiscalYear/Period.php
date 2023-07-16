<?php

namespace App\Models\Config\FiscalYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't00901l01';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'FYPMHPeriodId',
            'FYPMHMonth',
            'FYPMHNMonth',
            'FYPMHDesc2',
            'FYPMHNAddInt',
            'FYPMHBiDesc',
            'FYPMHMarkForDeletion',
            'FYPMHUser',
            'FYPMHLastCreated',
            'FYPMHLastUpdated',
            'FYPMHDeletedAt'
        ];
        protected $casts = [
            'FYPMHLastCreated' => 'datetime:d/m/Y',
            'FYPMHLastUpdated' => 'datetime:d/m/Y',
            'FYPMHDeletedAt' => 'datetime:d/m/Y'
        ];
}
