<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'T13908L02';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'LMLTHCompanyId',
            'LMLTHLeaveTypeId',
            'LMLTHDesc1',
            'LMLTHDesc2',
            'LMLTHPaidRule',
            'LMLTHFixedVariable',
            'LMLTHNoOfDays',
            'LMLTHCarryFwdAllowed',
            'LMLTHCarryFwdPercent',
            'LMLTHBiDesc',
            'LMLTHMarkForDeletion',
            'LMLTHUser',
            'LMLTHLastCreated',
            'LMLTHLastUpdated',
            'LMLTHDeletedAt'
        ];
        protected $casts = [
            'LMLTHLastCreated' => 'datetime:d/m/Y',
            'LMLTHLastUpdated' => 'datetime:d/m/Y',
            'LMLTHDeletedAt' => 'datetime:d/m/Y'
        ];
}
