<?php

namespace App\Models\Payroll\EmployeeStatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11903l02';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'ESGRHGradeId',
            'ESGRHDesc1',
            'ESGRHDesc2',
            'ESGRHBiDesc',
            'ESGRHMarkForDeletion',
            'ESGRHUser',
            'ESGRHLastCreated',
            'ESGRHLastUpdated',
            'ESGRHDeletedAt'
        ];
        protected $casts = [
            'ESGRHLastCreated' => 'datetime:d/m/Y',
            'ESGRHLastUpdated' => 'datetime:d/m/Y',
            'ESGRHDeletedAt' => 'datetime:d/m/Y'
        ];
}

