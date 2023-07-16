<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceGroup extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11901l05';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMRAHRaceId',
            'GMRAHDesc1',
            'GMRAHDesc2',
            'GMRAHBiDesc',
            'GMRAHMarkForDeletion',
            'GMRAHUser',
            'GMRAHLastCreated',
            'GMRAHLastUpdated',
            'GMRAHDeletedAt'
        ];
        protected $casts = [
            'GMRAHLastCreated' => 'datetime:d/m/Y',
            'GMRAHLastUpdated' => 'datetime:d/m/Y',
            'GMRAHDeletedAt' => 'datetime:d/m/Y'
        ];
}
