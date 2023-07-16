<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll\EmployeeMaster\GeneralInfo;

class PdfController extends Controller
{
    public function invoice(Request $request)
    {
        $stylesheet = "";
        // return view('invoice');
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            // 'format' => [190, 236],
            // 'orientation' => 'L'
        ]);

        $mpdf->WriteHTML(view('invoice'));
        return ($mpdf->Output('state_list.pdf', 'I'));
    }
    public function payslip_list(Request $request)
    {
        // t11101l01
        // t22501
        // t2250111
        $emp_list = GeneralInfo::all();
        return view('payslip_list', compact('emp_list'));
    }

    public function generate_payslip(Request $request)
    {
        $emp_id = $request->emp_ids;
        $month = $request->month;
        $year = $request->year;
        $emp_payslip = GeneralInfo::join('t22501', 't11101l01.EMGIHEmployeeId', '=', 't22501.PYMPHEmpCode')->join('t11903l01', 't11903l01.ESDEHDesignationId', '=', 't11101l01.EMGIHDesignationId')
            ->join('t11903l03', 't11903l03.ESDPHDepartmentId', '=', 't11101l01.EMGIHDepartmentId')
            ->join('t05902l01', 't05902l01.BMBNHBankId', '=', 't11101l01.EMGIHBankId')
            ->join('t11903l04', 't11903l04.ESTYHTypeId', '=', 't11101l01.EMGIHEmploymentTypeId')
            ->whereIn('t11101l01.EMGIHEmployeeId', $emp_id)->where('t22501.PYMPHFiscalMonth', $month)->where('t22501.PYMPHFiscalYear', $year)->select('t11101l01.EMGIHEmployeeId as emp_id', 't11101l01.EMGIHFullName', 't11101l01.EMGIHDateOfJoining', 't11903l01.ESDEHDesc1 as designation', 't11903l03.ESDPHDesc1 as department', 't11101l01.EMGIHIFSCId', 't11101l01.EMGIHBankAccountNo', 't22501.PYMPHCaldendarDays as caldendardays', 't22501.PYMPHLeaveWithoutyPay as lwp', 't22501.PYMPHPaidDays as paiddays', 't22501.PYMPHAbsentDays as absentdays', 't22501.PYMPHWeeklyOff as weeklyoff', 't22501.PYMPHPublicHoliday as publicholiday', 't05902l01.BMBNHDesc1 as bankname', 't11903l04.ESTYHDesc1 as emp_type', 't22501.PYMPHFiscalYear as fiscalyear', 't22501.PYMPHFiscalMonth as fiscalmonth')
            ->get();
        foreach ($emp_payslip as $row) {
            $row->Increament = GeneralInfo::join('t2250111', 't2250111.PYMPDEmpCode', '=', 't11101l01.EMGIHEmployeeId')
                ->where('t2250111.PYMPDEmpCode', $row->emp_id)
                ->where('t2250111.PYMPDFiscalMonth', $month)->where('t2250111.PYMPDFiscalYear', $year)->where('t2250111.PYMPDIncOrDed', 'I')
                ->where('t2250111.PYMPDIsTaxable', '!=', 'N')
                ->orderBy('t2250111.PYMPDUserSorting', 'ASC')
                ->select('t2250111.PYMPDEmpCode', 't2250111.PYMPDDesc', 't2250111.PYMPDIncOrDed', 't2250111.PYMPDUserSorting', 't2250111.PYMPDFiscalYear', 't2250111.PYMPDFiscalMonth', 't2250111.PYMPDGrossIncome', 't2250111.PYMPDGrossPay', 't2250111.PYMPDIsTaxable')
                ->get();

            $row->Decreament = GeneralInfo::join('t2250111', 't2250111.PYMPDEmpCode', '=', 't11101l01.EMGIHEmployeeId')
                ->where('t2250111.PYMPDEmpCode', $row->emp_id)
                ->where('t2250111.PYMPDFiscalMonth', $month)->where('t2250111.PYMPDFiscalYear', $year)->where('t2250111.PYMPDIncOrDed', 'D')
                ->orderBy('t2250111.PYMPDUserSorting', 'ASC')
                ->select('t2250111.PYMPDEmpCode', 't2250111.PYMPDDesc', 't2250111.PYMPDIncOrDed', 't2250111.PYMPDUserSorting', 't2250111.PYMPDFiscalYear', 't2250111.PYMPDFiscalMonth', 't2250111.PYMPDGrossIncome', 't2250111.PYMPDGrossPay', 't2250111.PYMPDIsTaxable')
                ->get();
        }
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            // 'format' => [190, 236],
            // 'orientation' => 'L'
        ]);
        $mpdf->AddPage('p', '', '', '', '', 5, 5, 2, 10, 10, 10);
        $mpdf->SetDisplayMode('fullpage');
        // $mpdf->setFooter('<div style="font-size:16px;font-weight:700;">{PAGENO}</div>');
        $mpdf->WriteHTML(view('payslip', compact('emp_payslip')));
        return ($mpdf->Output('state_list.pdf', 'I'));
    }
}

// $mpdf=new \Mpdf\Mpdf(['mode'=>'utf-8']);
// $mpdf->WriteHTML($stylesheet,1);
// $mpdf->WriteHTML('<h1>Hello world!</h1>');
// $mpdf->WriteHTML($html);
// $file='media/'.time().'.pdf';
// $mpdf->output($file,'I');
//D
//I
//F
//S
