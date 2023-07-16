<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReligionMaster extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11901l06';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMRLHReligionId',
            'GMRLHDesc1',
            'GMRLHDesc2',
            'GMRLHBiDesc',
            'GMRLHMarkForDeletion',
            'GMRLHUser',
            'GMRLHLastCreated',
            'GMRLHLastUpdated',
            'GMRLHDeletedAt'
        ];
        protected $casts = [
            'GMRLHLastCreated' => 'datetime:d/m/Y',
            'GMRLHLastUpdated' => 'datetime:d/m/Y',
            'GMRLHDeletedAt' => 'datetime:d/m/Y'
        ];
}
