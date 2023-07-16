<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technical_Error extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'technical_error';
    protected $fillable = [
        'error',
        'created_at'
    ];
}
