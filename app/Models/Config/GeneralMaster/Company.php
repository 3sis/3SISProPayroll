<?php

namespace App\Models\Config\GeneralMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Config\Geographic\City;
use App\Models\Config\Geographic\Country;
use App\Models\Config\BankingMaster\BranchName;

class Company extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't05901l01';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'id',
            'GMCOHCompanyId',
            'GMCOHDesc1',
            'GMCOHDesc2',
            'GMCOHNickName',
            'GMCOHTagLine',
            'GMCOHCurrencyId',
            'GMCOHAddress1',
            'GMCOHAddress2',
            'GMCOHAddress3',
            'GMCOHCityId',
            'GMCOHStateId',
            'GMCOHCountryId',
            'GMCOHPinCode',
            'GMCOHLandLine',
            'GMCOHMobileNo',
            'GMCOHEmail',
            'GMCOHWebsite',
            'GMCOHCINNo',
            'GMCOHPANNo',
            'GMCOHGSTNo',
            'GMCOHPFNo',
            'GMCOHPTNo',
            'GMCOHLWFNo',
            'GMCOHESICNo',
            'GMCOHTANNo',
            'GMCOHVATNo',
            'GMCOHESTNo',
            'GMCOHESTDate',
            'GMCOHBankId1',
            'GMCOHBranchId1',
            'GMCOHIFSId1',
            'GMCOHBankAccNo1',
            'GMCOHBankAcName1',
            'GMCOHBankId2',
            'GMCOHBranchId2',
            'GMCOHIFSId2',
            'GMCOHBankAccNo2',
            'GMCOHBankAcName2',
            'GMCOHField1',
            'GMCOHField2',
            'GMCOHField3',
            'GMCOHField4',
            'GMCOHField5',
            'GMCOHBiDesc',
            'GMCOHDecimalPositionQty',
            'GMCOHDecimalPositionValue',
            'GMCOHFolderName',
            'GMCOHImageFileName',
            'GMCOHMarkForDeletion',
            'GMCOHUser',
            'GMCOHLastCreated',
            'GMCOHLastUpdated',
            'GMCOHDeletedAt'
        ];
        protected $casts = [
            'GMCOHESTDate'    => 'datetime:d/m/Y',
            'GMCOHLastCreated'  => 'datetime:d/m/Y',
            'GMCOHLastUpdated'  => 'datetime:d/m/Y',
            'GMCOHDeletedAt'    => 'datetime:d/m/Y'
        ];
        public function fnCity()
        {
            return $this->hasOne(City::class, 'GMCTHCityId', 'GMCOHCityId');
        }
        public function fnBranch1()
        {
            return $this->hasOne(BranchName::class, 'BMBRHBranchId', 'GMCOHBranchId1');
        }
        public function fnCountry()
        {
            return $this->hasOne(Country::class, 'GMCMHCountryId', 'GMCOHCountryId');
        }
        public function fnCurrency()
        {
            return $this->hasOne(Currency::class, 'GMCRHCurrencyId', 'GMCOHCurrencyId');
        }
}
