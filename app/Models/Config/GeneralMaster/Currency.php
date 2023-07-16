<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05901l07';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMCRHCurrencyId ',
            'GMCRHDesc1',
            'GMCRHDesc2',
            'GMCRHBiDesc',
            'GMCRHMarkForDeletion',
            'GMCRHUser',
            'GMCRHLastCreated',
            'GMCRHLastUpdated',
            'GMCRHDeletedAt'
        ];
        protected $casts = [
            'GMCRHLastCreated' => 'datetime:d/m/Y',
            'GMCRHLastUpdated' => 'datetime:d/m/Y',
            'GMCRHDeletedAt' => 'datetime:d/m/Y'
        ];
}
