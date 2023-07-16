<?php

namespace App\Models;

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
            'GMCOHLastCreated'  => 'datetime:d/m/Y',
            'GMCOHLastUpdated'  => 'datetime:d/m/Y',
            'GMCOHDeletedAt'    => 'datetime:d/m/Y'
    ];
}
