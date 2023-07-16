<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11901l08';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMPSHPhysicalStatusId',
            'GMPSHDesc1',
            'GMPSHDesc2',
            'GMPSHBiDesc',
            'GMPSHMarkForDeletion',
            'GMPSHUser',
            'GMPSHLastCreated',
            'GMPSHLastUpdated',
            'GMPSHDeletedAt'
        ];
        protected $casts = [
            'GMPSHLastCreated' => 'datetime:d/m/Y',
            'GMPSHLastUpdated' => 'datetime:d/m/Y',
            'GMPSHDeletedAt' => 'datetime:d/m/Y'
        ];
}
