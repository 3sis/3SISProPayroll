<?php

namespace App\Http\Controllers\Payroll\EmployeeMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Payroll\EmployeeMaster\GeneralInfo;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;
class EmployeeActionController extends Controller
{
    use Error;
    protected  $gCompanyId = '1000';
    public function clone_oto(Request $request)
    {
        $employee_list = GeneralInfo::where('EMGIHMarkForDeletion', '!=', 1)->where('t11101l01.EMGIHCompId', $this->gCompanyId)->get();
        return view('payroll.employeeMaster.clone_oto', compact('employee_list'));
    }
    public function submit_emp_clone(Request $request)
    {
        // dd($request->all());
        try {
            $request->merge(['EMGIHCompId' => $this->gCompanyId]);

            $validator = Validator::make($request->all(), [
                'NewEmployeeId'         => 'required|min:2|max:10|unique:t11101l01,EMGIHEmployeeId,' . $request->NewEmployeeId,
                'EMGIHEmployeeId'       => 'required',
                'NewEmployeeFirstName'       => 'required|min:2|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $new_employee = new GeneralInfo();
            // if ($request->id != null) {
                //update
                // $old_employee = GeneralInfo::find($request->EMGIHEmployeeId);
                $old_employee = GeneralInfo::where('EMGIHEmployeeId',$request->EMGIHEmployeeId)->get()->first();

                // dd($old_employee);
            // }
            $new_employee->EMGIHCompId          =$request->EMGIHCompId;
            $new_employee->EMGIHLocationId      ="10";
            // $new_employee->EMGIHLocationId      =$old_employee->EMGIHLocationId;
            $new_employee->EMGIHEmployeeId      =$request->NewEmployeeId;
            $new_employee->EMGIHSalutationId    =$old_employee->EMGIHSalutationId;
            $new_employee->EMGIHGenderId        =$old_employee->EMGIHGenderId;
            $new_employee->EMGIHFirstName       =$request->NewEmployeeFirstName;
            $new_employee->EMGIHMiddleName      =$request->NewEmployeeMiddleName;
            $new_employee->EMGIHLastName        =$request->NewEmployeeLastName;
            $new_employee->EMGIHFullName        =$request->NewEmployeeFirstName.' '.$request->NewEmployeeMiddleName.' '.$request->NewEmployeeLastName;
            $new_employee->EMGIHDateOfBirth     =$old_employee->EMGIHDateOfBirth;
            $new_employee->EMGIHDateOfJoining   =$old_employee->EMGIHDateOfJoining;
            $new_employee->EMGIHDateOfConfirmation  =$old_employee->EMGIHDateOfConfirmation;
            $new_employee->EMGIHEmploymentTypeId    =$old_employee->EMGIHEmploymentTypeId;
            $new_employee->EMGIHGradeId             =$old_employee->EMGIHGradeId;
            $new_employee->EMGIHDesignationId       =$old_employee->EMGIHDesignationId;
            $new_employee->EMGIHDepartmentId        =$old_employee->EMGIHDepartmentId;
            $new_employee->EMGIHCalendarId          =$old_employee->EMGIHCalendarId;
            $new_employee->EMGIHNationalityId       =$old_employee->EMGIHNationalityId;
            $new_employee->EMGIHReligionId          =$old_employee->EMGIHReligionId;
            $new_employee->EMGIHRaceCastId          =$old_employee->EMGIHRaceCastId;
            $new_employee->EMGIHBloodGroupId        =$old_employee->EMGIHBloodGroupId;
            $new_employee->EMGIHPhysicalStatusId    =$old_employee->EMGIHPhysicalStatusId;
            $new_employee->EMGIHMaritalStatusId     =$old_employee->EMGIHMaritalStatusId;
            $new_employee->EMGIHDateOfMarriage      =$old_employee->EMGIHDateOfMarriage;
            $new_employee->EMGIHSpouseName          =$old_employee->EMGIHSpouseName;
            $new_employee->EMGIHOfficeEmail         =$old_employee->EMGIHOfficeEmail;
            $new_employee->EMGIHOfficeExtension     =$old_employee->EMGIHOfficeExtension;
            $new_employee->EMGIHOfficeLandLineNo    =$old_employee->EMGIHOfficeLandLineNo;
            $new_employee->EMGIHOfficeMobileNo      =$old_employee->EMGIHOfficeMobileNo;
            $new_employee->EMGIHPersonalEmail       =$old_employee->EMGIHPersonalEmail;
            $new_employee->EMGIHPersonalPhoneNo     =$old_employee->EMGIHPersonalPhoneNo;
            $new_employee->EMGIHPANNo               =$old_employee->EMGIHPANNo;
            $new_employee->EMGIHAadharNo            =$old_employee->EMGIHAadharNo;
            $new_employee->EMGIHDrivingLicenseNo    =$old_employee->EMGIHDrivingLicenseNo;
            $new_employee->EMGIHUANNo               =$old_employee->EMGIHUANNo;
            $new_employee->EMGIHPresentAddress1     =$old_employee->EMGIHPresentAddress1;
            $new_employee->EMGIHPresentAddress2     =$old_employee->EMGIHPresentAddress2;
            $new_employee->EMGIHPresentAddress3     =$old_employee->EMGIHPresentAddress3;
            $new_employee->EMGIHPresentCityId       =$old_employee->EMGIHPresentCityId;
            $new_employee->EMGIHPresentStateId      =$old_employee->EMGIHPresentStateId;
            $new_employee->EMGIHPresentCountryId    =$old_employee->EMGIHPresentCountryId;
            $new_employee->EMGIHPresentPinCode      =$old_employee->EMGIHPresentPinCode;
            $new_employee->EMGIHPresentContactName  =$old_employee->EMGIHPresentContactName;
            $new_employee->EMGIHSameAsPresentAdd    =$old_employee->EMGIHSameAsPresentAdd;
            $new_employee->EMGIHPermanentAddress1   =$old_employee->EMGIHPermanentAddress1;
            $new_employee->EMGIHPermanentAddress2   =$old_employee->EMGIHPermanentAddress2;
            $new_employee->EMGIHPermanentAddress3   =$old_employee->EMGIHPermanentAddress3;
            $new_employee->EMGIHPermanentCityId     =$old_employee->EMGIHPermanentCityId;
            $new_employee->EMGIHPermanentStateId    =$old_employee->EMGIHPermanentStateId;
            $new_employee->EMGIHPermanentCountryId  =$old_employee->EMGIHPermanentCountryId;
            $new_employee->EMGIHPermanentPinCode    =$old_employee->EMGIHPermanentPinCode;
            $new_employee->EMGIHPermanentContactName    =$old_employee->EMGIHPermanentContactName;
            $new_employee->EMGIHPermanentContactNo      =$old_employee->EMGIHPermanentContactNo;
            $new_employee->EMGIHReportingManager1Id     =$old_employee->EMGIHReportingManager1Id;
            $new_employee->EMGIHReportingManager2Id     =$old_employee->EMGIHReportingManager2Id;
            $new_employee->EMGIHReportingManager3Id     =$old_employee->EMGIHReportingManager3Id;
            $new_employee->EMGIHPaymentModeId           =$old_employee->EMGIHPaymentModeId;
            $new_employee->EMGIHBranchId                =$old_employee->EMGIHBranchId;
            $new_employee->EMGIHBankId                  =$old_employee->EMGIHBankId;
            $new_employee->EMGIHIFSCId                  =$old_employee->EMGIHIFSCId;
            $new_employee->EMGIHAccountTypeId           =$old_employee->EMGIHAccountTypeId;
            $new_employee->EMGIHBankAccountNo           =$old_employee->EMGIHBankAccountNo;
            $new_employee->EMGIHOTApplicable            =$old_employee->EMGIHOTApplicable;
            $new_employee->EMGIHOTBasisId               =$old_employee->EMGIHOTBasisId;
            $new_employee->EMGIHIsDailyWages            =$old_employee->EMGIHIsDailyWages;
            $new_employee->EMGIHDailyWagesId            =$old_employee->EMGIHDailyWagesId;
            $new_employee->EMGIHPFApplicable            =$old_employee->EMGIHPFApplicable;
            $new_employee->EMGIHPFThreshold             =$old_employee->EMGIHPFThreshold;
            $new_employee->EMGIHPFAgreedByComp          =$old_employee->EMGIHPFAgreedByComp;
            $new_employee->EMGIHPFCompLimit             =$old_employee->EMGIHPFCompLimit;
            $new_employee->EMGIHPFAcctNo                =$old_employee->EMGIHPFAcctNo;
            $new_employee->EMGIHRegimeId                =$old_employee->EMGIHRegimeId;
            $new_employee->EMGIHIsResignation           =$old_employee->EMGIHIsResignation;
            $new_employee->EMGIHDateOfLetterSubmission  =$old_employee->EMGIHDateOfLetterSubmission;
            $new_employee->EMGIHDateOfResignation       =$old_employee->EMGIHDateOfResignation;
            $new_employee->EMGIHDateOfLeaving           =$old_employee->EMGIHDateOfLeaving;
            $new_employee->EMGIHReason                  =$old_employee->EMGIHReason;
            $new_employee->EMGIHRemarksForFnF           =$old_employee->EMGIHRemarksForFnF;
            $new_employee->EMGIHLeaveWithoutPayIndicator    =$old_employee->EMGIHLeaveWithoutPayIndicator;
            $new_employee->EMGIHLeaveWithoutPayFrom         =$old_employee->EMGIHLeaveWithoutPayFrom;
            $new_employee->EMGIHOldEmployeeCode             =$old_employee->EMGIHOldEmployeeCode;
            $new_employee->EMGIHGroup                       =$old_employee->EMGIHGroup;
            $new_employee->EMGIHLeaveGroupId                =$old_employee->EMGIHLeaveGroupId;
            $new_employee->EMGIHBiDesc                      =$old_employee->EMGIHBiDesc;
            $new_employee->EEGIHIncomeDefined               =$old_employee->EEGIHIncomeDefined;
            $new_employee->EEGIHDeductionDefined            =$old_employee->EEGIHDeductionDefined;
            $new_employee->EMGIHUser                        =Auth::user()->name;
            $new_employee->EMGIHLastCreated                 =now();
            $new_employee->EMGIHLastUpdated                 =now();
            $new_employee->save();
            if ($new_employee) {
                return response()->json(['status' => 'success', 'data' => $new_employee, 'updateMode' => 'Updated']);
            } else {
                return response()->json(['status' => 'error']);
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'technical_error']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error_log($e);
            return response()->json(['status' => 'technical_error']);
        }
    }
    public function stope_pay(Request $request)
    {
        $employee_list = GeneralInfo::where('EMGIHMarkForDeletion', '!=', 1)->where('t11101l01.EMGIHCompId', $this->gCompanyId)->get();
        return view('payroll.employeeMaster.stop_payment', compact('employee_list'));
    }
    public function submit_emp_stop_pay(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'EMGIHEmployeeId'       => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $employee = GeneralInfo::where('EMGIHEmployeeId',$request->EMGIHEmployeeId)->get()->first();

            $employee->EMGIHLeaveWithoutPayIndicator    =1;
            $employee->EMGIHLeaveWithoutPayFrom         =now();
            $employee->EMGIHUser                        =Auth::user()->name;
            $employee->EMGIHLastCreated                 =now();
            $employee->EMGIHLastUpdated                 =now();
            $employee->save();

            if ($employee) {
                return response()->json(['status' => 'success', 'data' => $employee, 'updateMode' => 'Updated']);
            } else {
                return response()->json(['status' => 'error']);
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'technical_error']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error_log($e);
            return response()->json(['status' => 'technical_error']);
        }
    }
}
