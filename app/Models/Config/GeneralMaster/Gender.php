<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11901l02';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMGDHGenderId',
            'GMGDHDesc1',
            'GMGDHDesc2',
            'GMGDHBiDesc',
            'GMGDHMarkForDeletion',
            'GMGDHUser',
            'GMGDHLastCreated',
            'GMGDHLastUpdated',
            'GMGDHDeletedAt'
        ];
        protected $casts = [
            'GMGDHLastCreated' => 'datetime:d/m/Y',
            'GMGDHLastUpdated' => 'datetime:d/m/Y',
            'GMGDHDeletedAt' => 'datetime:d/m/Y'
        ];
}
