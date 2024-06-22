<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;


class ReportController extends Controller
{
    public function attendanceReport()
    {
        // Ambil data absensi beserta informasi user
        $attendances = Attendance::with('user')->get();

        return view('reports.attendance', compact('attendances'));
    }
}
