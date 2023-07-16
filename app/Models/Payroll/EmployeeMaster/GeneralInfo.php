<?php

namespace App\Models\Payroll\EmployeeMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Config\Geographic\Location;
use App\Models\Config\Geographic\City;
use App\Models\Config\Geographic\Country;
use App\Models\Config\BankingMaster\BranchName;
use App\Models\Config\BankingMaster\PaymentMode;
use App\Models\Config\GeneralMaster\Salutation;
use App\Models\Config\GeneralMaster\Gender;
use App\Models\Config\GeneralMaster\BloodGroup;
use App\Models\Config\GeneralMaster\MaritalStatus;
use App\Models\Config\GeneralMaster\Nationality;
use App\Models\Config\GeneralMaster\PhysicalStatus;
use App\Models\Config\GeneralMaster\RaceGroup;
use App\Models\Config\GeneralMaster\ReligionMaster;
use App\Models\Payroll\EmployeeStatus\Department;
use App\Models\Payroll\EmployeeStatus\Designation;
use App\Models\Payroll\EmployeeStatus\Grade;
use App\Models\Payroll\EmployeeStatus\Type;
use App\Models\Config\FiscalYear\Calendar;

class GeneralInfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't11101l01';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'id',
        'EMGIHCompId',
        'EMGIHLocationId',
        'EMGIHEmployeeId',
        'EMGIHSalutationId',
        'EMGIHGenderId',
        'EMGIHFirstName',
        'EMGIHMiddleName',
        'EMGIHLastName',
        'EMGIHFullName',
        'EMGIHDateOfBirth',
        'EMGIHDateOfJoining',
        'EMGIHDateOfConfirmation',
        'EMGIHEmploymentTypeId',
        'EMGIHGradeId',
        'EMGIHDesignationId',
        'EMGIHDepartmentId',
        'EMGIHCalendarId',
        'EMGIHNationalityId',
        'EMGIHReligionId',
        'EMGIHRaceCastId',
        'EMGIHBloodGroupId',
        'EMGIHPhysicalStatusId',
        'EMGIHMaritalStatusId',
        'EMGIHDateOfMarriage',
        'EMGIHSpouseName',
        'EMGIHOfficeEmail',
        'EMGIHOfficeExtension',
        'EMGIHOfficeLandLineNo',
        'EMGIHOfficeMobileNo',
        'EMGIHPersonalEmail',
        'EMGIHPersonalPhoneNo',
        'EMGIHPANNo',
        'EMGIHAadharNo',
        'EMGIHDrivingLicenseNo',
        'EMGIHUANNo',
        'EMGIHPresentAddress1',
        'EMGIHPresentAddress2',
        'EMGIHPresentAddress3',
        'EMGIHPresentCityId',
        'EMGIHPresentStateId',
        'EMGIHPresentCountryId',
        'EMGIHPresentPinCode',
        'EMGIHPresentContactName',
        'EMGIHSameAsPresentAdd',
        'EMGIHPermanentAddress1',
        'EMGIHPermanentAddress2',
        'EMGIHPermanentAddress3',
        'EMGIHPermanentCityId',
        'EMGIHPermanentStateId',
        'EMGIHPermanentCountryId',
        'EMGIHPermanentPinCode',
        'EMGIHPermanentContactName',
        'EMGIHPermanentContactNo',
        'EMGIHReportingManager1Id',
        'EMGIHReportingManager2Id',
        'EMGIHReportingManager3Id',
        'EMGIHPaymentModeId',
        'EMGIHBranchId',
        'EMGIHBankId',
        'EMGIHIFSCId',
        'EMGIHAccountTypeId',
        'EMGIHBankAccountNo',
        'EMGIHOTApplicable',
        'EMGIHOTBasisId',
        'EMGIHIsDailyWages',
        'EMGIHDailyWagesId',
        'EMGIHPFApplicable',
        'EMGIHPFThreshold',
        'EMGIHPFAgreedByComp',
        'EMGIHPFCompLimit',
        'EMGIHPFAcctNo',
        'EMGIHRegimeId',
        'EMGIHIsResignation',
        'EMGIHDateOfLetterSubmission',
        'EMGIHDateOfResignation',
        'EMGIHDateOfLeaving',
        'EMGIHReason',
        'EMGIHRemarksForFnF',
        'EMGIHLeaveWithoutPayIndicator',
        'EMGIHLeaveWithoutPayFrom',
        'EMGIHOldEmployeeCode',
        'EMGIHGroup',
        'EMGIHLeaveGroupId',
        'EMGIHBiDesc',
        'EEGIHIncomeDefined',
        'EEGIHDeductionDefined',
        'EMGIHMarkForDeletion',
        'EMGIHUser',
        'EMGIHLastCreated',
        'EMGIHLastUpdated',
        'EMGIHDeletedAt'
    ];
    protected $casts = [
        'EMGIHDateOfBirth'              => 'datetime:d/m/Y',
        'EMGIHDateOfJoining'            => 'datetime:d/m/Y',
        'EMGIHDateOfConfirmation'       => 'datetime:d/m/Y',
        'EMGIHDateOfMarriage'           => 'datetime:d/m/Y',
        'EMGIHDateOfLetterSubmission'   => 'datetime:d/m/Y',
        'EMGIHDateOfResignation'        => 'datetime:d/m/Y',
        'EMGIHDateOfLeaving'            => 'datetime:d/m/Y',
        'EMGIHLeaveWithoutPayFrom'      => 'datetime:d/m/Y',
        'EMGIHLastCreated'              => 'datetime:d/m/Y',
        'EMGIHLastUpdated'              => 'datetime:d/m/Y',
        'EMGIHDeletedAt'                => 'datetime:d/m/Y'
    ];

    public function fnLocation()
    {
        return $this->hasOne(Location::class, 'GMLMHLocationId', 'EMGIHLocationId');
    }
    public function fnCity()
        {
            return $this->hasOne(City::class, 'GMCTHCityId', 'EMGIHPresentCityId');
        }
    public function fnSalutation()
    {
        return $this->hasOne(Salutation::class, 'GMSLHSalutationId', 'EMGIHSalutationId');
    }
    public function fnGender()
    {
        return $this->hasOne(Gender::class, 'GMGDHGenderId', 'EMGIHGenderId');
    }
    public function fnNationality()
    {
        return $this->hasOne(Nationality::class, 'GMNAHNationalityId', 'EMGIHNationalityId');
    }
    public function fnReligion()
    {
        return $this->hasOne(Religion::class, 'GMRLHReligionId', 'EMGIHReligionId');
    }
    public function fnRaceCast()
    {
        return $this->hasOne(RaceCast::class, 'GMRAHRaceId', 'EMGIHRaceCastId');
    }
    public function fnBloodGroup()
    {
        return $this->hasOne(BloodGroup::class, 'GMBGHBloodGroupId', 'EMGIHBloodGroupId');
    }
    public function fnPhysicalStatus()
    {
        return $this->hasOne(PhysicalStatus::class, 'GMPSHPhysicalStatusId', 'EMGIHPhysicalStatusId');
    }
    public function fnMaritalStatus()
    {
        return $this->hasOne(MaritalStatus::class, 'GMMSHMaritalStatusId', 'EMGIHMaritalStatusId');
    }
    public function fnPresentCity()
    {
        return $this->hasOne(PresentCity::class, 'GMCTHCityId', 'EMGIHPresentCityId');
    }
    public function fnPaymentMode()
    {
        return $this->hasOne(PaymentMode::class, 'BMPMHPaymentModeId', 'EMGIHPaymentModeId');
    }
    public function fnCalendar()
    {
        return $this->hasOne(Calendar::class, 'FYCAHCalendarId', 'EMGIHCalendarId');
    }
    public function fnBranch()
    {
        return $this->hasOne(BranchName::class, 'BMBRHBranchId', 'EMGIHBranchId');
    }
}
