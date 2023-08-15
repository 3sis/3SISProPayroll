<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveMaster extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'T13908L03';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'LMLMHCompanyId',
            'LMLMHGroupId',
            'LMLMHLeaveTypeId',
            'LMLMHDesc1',
            'LMLMHDesc2',
            'LMLMHPaidRule',
            'LMLMHFixedVariable',
            'LMLMHNoOfDays',
            'LMLMHCarryFwdAllowed',
            'LMLMHCarryFwdPercent',
            'LMLMHBiDesc',
            'LMLMHMarkForDeletion',
            'LMLMHUser',
            'LMLMHLastCreated',
            'LMLMHLastUpdated',
            'LMLMHDeletedAt'
        ];
        protected $casts = [
            'LMLMHLastCreated' => 'datetime:d/m/Y',
            'LMLMHLastUpdated' => 'datetime:d/m/Y',
            'LMLMHDeletedAt' => 'datetime:d/m/Y'
        ];
        public function fnLeaveGroup()
        {
            return $this->hasOne(State::class, 'LMLGHGroupId', 'LMLMHGroupId');
        }
        public function fnLeaveType()
        {
            return $this->hasOne(Country::class, 'LMLTHLeaveTypeId', 'LMLMHLeaveTypeId');
        }
}
