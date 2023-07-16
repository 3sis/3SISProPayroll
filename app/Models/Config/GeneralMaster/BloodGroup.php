<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11901l03';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMBGHBloodGroupId',
            'GMBGHDesc1',
            'GMBGHDesc2',
            'GMBGHBiDesc',
            'GMBGHMarkForDeletion',
            'GMBGHUser',
            'GMBGHLastCreated',
            'GMBGHLastUpdated',
            'GMBGHDeletedAt'
        ];
        protected $casts = [
            'GMBGHLastCreated' => 'datetime:d/m/Y',
            'GMBGHLastUpdated' => 'datetime:d/m/Y',
            'GMBGHDeletedAt' => 'datetime:d/m/Y'
        ];
}
