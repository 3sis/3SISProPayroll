<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11901l04';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMNAHNationalityId',
            'GMNAHDesc1',
            'GMNAHDesc2',
            'GMNAHBiDesc',
            'GMNAHMarkForDeletion',
            'GMNAHUser',
            'GMNAHLastCreated',
            'GMNAHLastUpdated',
            'GMNAHDeletedAt'
        ];
        protected $casts = [
            'GMNAHLastCreated' => 'datetime:d/m/Y',
            'GMNAHLastUpdated' => 'datetime:d/m/Y',
            'GMNAHDeletedAt' => 'datetime:d/m/Y'
        ];
}
