<?php

namespace App\Models\Payroll\EmployeeStatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11903l01';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'ESDEHDesignationId',
            'ESDEHDesc1',
            'ESDEHDesc2',
            'ESDEHBiDesc',
            'ESDEHMarkForDeletion',
            'ESDEHUser',
            'ESDEHLastCreated',
            'ESDEHLastUpdated',
            'ESDEHDeletedAt'
        ];
        protected $casts = [
            'ESDEHLastCreated' => 'datetime:d/m/Y',
            'ESDEHLastUpdated' => 'datetime:d/m/Y',
            'ESDEHDeletedAt' => 'datetime:d/m/Y'
        ];
}
