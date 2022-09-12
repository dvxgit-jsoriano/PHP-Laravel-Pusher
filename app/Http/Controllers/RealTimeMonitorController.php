<?php

namespace App\Http\Controllers;

use App\Events\AuxChanged;
use App\Models\Employee;
use App\Models\Log;
use App\Models\LogDetail;
use App\Models\Team;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log as FacadesLog;

class RealTimeMonitorController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('realtime-monitor', compact('teams'));
    }

    public function auxChange(Request $request)
    {
        $today = Carbon::today('Asia/Manila')->format('Y-m-d');

        $employee_id = $request->employee_id;
        $aux_main = $request->aux_main;
        $aux_sub = $request->aux_sub;

        $log = Log::where('log_date', $today)
            ->where('employee_id', $employee_id)
            ->first();

        if (!$log) {
            $log = Log::create([
                'employee_id' => $employee_id,
                'log_date' => $today,
                'shift_start' => '08:00',
                'shift_end' => '17:00',
                'shift_timezone' => 'Asia/Manila',
                'remarks' => ''
            ]);
        }

        $log_detail = LogDetail::create([
            'log_id' => $log->id,
            'aux_main' => $aux_main,
            'aux_sub' => $aux_sub,
            'log_datetime' => Carbon::now()
        ]);

        $data = collect();

        $employees = Employee::all();

        foreach ($employees as $employee) {
            FacadesLog::debug($employee);

            $data_log = Log::where('employee_id', $employee->id)
                ->where('log_date', $today)
                ->first();

            if ($data_log) {
                $data_log_detail = LogDetail::where('log_id', $data_log->id)
                    ->latest()
                    ->first();
                FacadesLog::debug($data_log_detail);

                $data = $data->push([
                    'first' => $employee->first,
                    'last' => $employee->last,
                    'team' => $employee->team,
                    'data_log' => $data_log,
                    'data_log_detail' => $data_log_detail,
                ]);
                FacadesLog::debug($data);
            }
        }

        broadcast(new AuxChanged($data));

        return $data;
    }
}
