<?php

namespace App\Traits;

use App\Models\Technical_Error;
use Carbon\Carbon;

trait Error
{
    public function error_log($e)
    {
        $now = Carbon::now()->toDateString();
        $current_date =  Carbon::createFromFormat('Y-m-d', $now)->format('Y-m-d h:i:s');
        /* -------Technical Error-----*/
        $Exception_Error = [
            'message' => $e->getMessage(),
            'line' => $e->getLine(),
            'code' => $e->getCode(),
            'file' => $e->getFile()
        ];
        $data = [
            'error' => json_encode($Exception_Error),
            'created_at' => $current_date
        ];
        Technical_Error::create($data);
    }
}
 /*
-------Technical Error-----
            // if(!is_null($e->getSeverity())){
            //     $Exception_Error = [
            //       'message' => $e->getMessage(),
            //       'line' => $e->getLine(),
            //       'code' => $e->getCode(),
            //       'file' => $e->getFile(),
            //       'severity' => $e->getSeverity()
            //     ];
            //     $data = ['error' => json_encode($Exception_Error),
            //              'created_at' => $current_date
            //             ];
            //     Technical_Error::create($data);
            // }else{
                ---------Technical DB Error-----
                // Log::error($e->getmessage());
            //     $DB_Error = [
            //       'sql' => $e->getSql(),
            //       'message' => $e->getmessage(),
            //       'bindings' => $e->getBindings(),
            //       'code' => $e->getCode(),
            //       'file' => $e->getFile()
            //     ];
            //      $data = ['error' => json_encode($DB_Error),
            //              'created_at' => $current_date
            //             ];
            //     Technical_Error::create($data);
            // }

     */
