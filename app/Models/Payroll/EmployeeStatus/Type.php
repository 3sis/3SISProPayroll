<?php

namespace App\Models\Payroll\EmployeeStatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11903l04';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'ESTYHTypeId',
            'ESTYHDesc1',
            'ESTYHDesc2',
            'ESTYHBiDesc',
            'ESTYHMarkForDeletion',
            'ESTYHUser',
            'ESTYHLastCreated',
            'ESTYHLastUpdated',
            'ESTYHDeletedAt'
        ];
        protected $casts = [
            'ESTYHLastCreated' => 'datetime:d/m/Y',
            'ESTYHLastUpdated' => 'datetime:d/m/Y',
            'ESTYHDeletedAt' => 'datetime:d/m/Y'
        ];
}
