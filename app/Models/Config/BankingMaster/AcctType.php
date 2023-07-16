<?php

namespace App\Models\Config\BankingMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcctType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05902l03';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'BMATHAcctId',
            'BMATHDesc1',
            'BMATHDesc2',
            'BMATHBiDesc',
            'BMATHMarkForDeletion',
            'BMATHUser',
            'BMATHLastCreated',
            'BMATHLastUpdated',
            'BMATHDeletedAt'
        ];
        protected $casts = [
            'BMATHLastCreated' => 'datetime:d/m/Y',
            'BMATHLastUpdated' => 'datetime:d/m/Y',
            'BMATHDeletedAt' => 'datetime:d/m/Y'
        ];
}
