<?php

namespace App\Models\Config\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05901l03';
    protected $fillable = [
           'GMCMHCountryId',
           'GMCMHDesc1',
           'GMCMHDesc2',
           'GMCMHBiDesc',
           'GMCMHMarkForDeletion',
           'GMCMHUser',
           'GMCMHLastCreated',
           'GMCMHLastUpdated',
           'GMCMHDeletedAt'
        ];

    protected $casts = [
            'GMCMHLastCreated'  => 'datetime:d/m/Y',
            'GMCMHLastUpdated'  => 'datetime:d/m/Y',
            'GMCMHDeletedAt'    => 'datetime:d/m/Y'
    ];
}
