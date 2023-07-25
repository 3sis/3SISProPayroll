<?php
namespace app\Traits\CommonMasters\GeneralMaster;
use DataTables;
use Illuminate\Support\Facades\Crypt;
trait CommonDataTables {


	public function TableActionTrait($url,$data){
		return DataTables::of($data)
            ->addColumn('action', function ($record) use ($url) {
                return
                '<a href="'.$url.'/edit/'.Crypt::encryptString($record->id).'" class="bs-tooltip edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" data-bs-original-title="Edit" aria-label="Edit" id="' . $record->id . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>

                <a href="javascript:void(0);" class="bs-tooltip delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete" data-bs-original-title="Delete" aria-label="Delete" id="' . $record->id . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
            })
            ->rawColumns(['action'])
            ->make(true);

	}
    public function TableActionEditTrait($url,$data){
		return DataTables::of($data)
            ->addColumn('action', function ($record) use ($url) {
                return
                '<a href="'.$url.'/edit/'.Crypt::encryptString($record->id).'" class="bs-tooltip edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" data-bs-original-title="Edit" aria-label="Edit" id="' . $record->id . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>';
            })
            ->rawColumns(['action'])
            ->make(true);

	}
    public function TableActionRestoreTrait($data){
        return DataTables::of($data)
            ->addColumn('action', function ($record) {
                return
                '<a href="#" class="btn mr-1 btnEditRec3SIS bs-tooltip restore" data-bs-toggle="tooltip" data-bs-placement="top" title="undo" id="' . $record->id . '">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-ccw"><polyline points="1 4 1 10 7 10"></polyline><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path></svg>
                    </a>';

            })
            ->make(true);
    }
}
