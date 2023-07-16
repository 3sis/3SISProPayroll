<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salutation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11901l01';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMSLHSalutationId',
            'GMSLHDesc1',
            'GMSLHDesc2',
            'GMSLHBiDesc',
            'GMSLHMarkForDeletion',
            'GMSLHUser',
            'GMSLHLastCreated',
            'GMSLHLastUpdated',
            'GMSLHDeletedAt'
        ];
        protected $casts = [
            'GMSLHLastCreated' => 'datetime:d/m/Y',
            'GMSLHLastUpdated' => 'datetime:d/m/Y',
            'GMSLHDeletedAt' => 'datetime:d/m/Y'
        ];
}
