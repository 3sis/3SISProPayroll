<?php

namespace App\Models\Config\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05901l06';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMLMHCompanyId',
            'GMLMHLocationId',
            'GMLMHCityId',
            'GMLMHStateId',
            'GMLMHCountryId',
            'GMLMHDesc1',
            'GMLMHDesc2',
            'GMLMHBiDesc',
            'GMLMHMarkForDeletion',
            'GMLMHUser',
            'GMLMHLastCreated',
            'GMLMHLastUpdated',
            'GMLMHDeletedAt'
        ];
        protected $casts = [
            'GMLMHLastCreated' => 'datetime:d/m/Y',
            'GMLMHLastUpdated' => 'datetime:d/m/Y',
            'GMLMHDeletedAt' => 'datetime:d/m/Y'
        ];
        public function fnCity()
        {
            return $this->hasOne(City::class, 'GMCTHCityId', 'GMLMHCityId');
        }
        public function fnState()
        {
            return $this->hasOne(State::class, 'GMSMHStateId', 'GMLMHStateId');
        }
        public function fnCountry()
        {
            return $this->hasOne(Country::class, 'GMCMHCountryId', 'GMLMHCountryId');
        }
}
