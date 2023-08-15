<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveGroup extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'T13908L01';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'LMLGHCompanyId',
            'LMLGHGroupId',
            'LMLGHDesc1',
            'LMLGHDesc2',
            'LMLGHBiDesc',
            'LMLGHMarkForDeletion',
            'LMLGHUser',
            'LMLGHLastCreated',
            'LMLGHLastUpdated',
            'LMLGHDeletedAt'
        ];
        protected $casts = [
            'LMLGHLastCreated' => 'datetime:d/m/Y',
            'LMLGHLastUpdated' => 'datetime:d/m/Y',
            'LMLGHDeletedAt' => 'datetime:d/m/Y'
        ];
}
