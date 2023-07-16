<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11901l07';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMMSHMaritalStatusId',
            'GMMSHDesc1',
            'GMMSHDesc2',
            'GMMSHBiDesc',
            'GMMSHMarkForDeletion',
            'GMMSHUser',
            'GMMSHLastCreated',
            'GMMSHLastUpdated',
            'GMMSHDeletedAt'
        ];
        protected $casts = [
            'GMMSHLastCreated' => 'datetime:d/m/Y',
            'GMMSHLastUpdated' => 'datetime:d/m/Y',
            'GMMSHDeletedAt' => 'datetime:d/m/Y'
        ];
}
