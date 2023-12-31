<?php

namespace App\Models\Config\BankingMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchName extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05902l02';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'BMBRHBranchId',
        'BMBRHBankId',
        'BMBRHIFSCId',
        'BMBRHDesc1',
        'BMBRHDesc2',
        'BMBRHBiDesc',
        'BMBRHMarkForDeletion',
        'BMBRHUser',
        'BMBRHLastCreated',
        'BMBRHLastUpdated',
        'BMBRHDeletedAt'
    ];
    protected $casts = [
        'BMBRHLastCreated' => 'datetime:d/m/Y',
        'BMBRHLastUpdated' => 'datetime:d/m/Y',
        'BMBRHDeletedAt' => 'datetime:d/m/Y'
    ];
    public function fnBankName()
    {
        return $this->hasOne(BankName::class, 'BMBNHBankId', 'BMBRHBankId');
    }
}

