<?php

namespace App\Models\Config\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05901l04';
    protected $fillable = [
          'GMSMHStateId' ,
          'GMSMHCountryId' ,
          'GMSMHDesc1' ,
          'GMSMHDesc2' ,
          'GMSMHBiDesc' ,
          'GMSMHMarkForDeletion' ,
          'GMSMHUser' ,
          'GMSMHLastCreated' ,
          'GMSMHLastUpdated',
          'GMSMHDeletedAt'
        ];

    protected $casts = [
            'GMSMHLastCreated'  => 'datetime:d/m/Y',
            'GMSMHLastUpdated'  => 'datetime:d/m/Y',
            'GMSMHDeletedAt'    => 'datetime:d/m/Y'
    ];


    public function fnCountry(){
        return $this->hasOne(Country::class,'GMCMHCountryId','GMSMHCountryId');
    }


}
