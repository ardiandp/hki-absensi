<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::where('user_id', Auth::id())->get();
        return view('attendances.index', compact('attendances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'check_in' => 'required|date_format:H:i',
        ]);

        Attendance::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('attendances.index');
    }

    public function checkin(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            //'check_in' => 'required|date_format:H:i',
        ]);

        Attendance::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'check_in' => date('H:i:s'),
            //'check_out' => $request->check_out,
        ]);

        return redirect()->route('attendances.index');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $attendance = Attendance::where('user_id', Auth::id())
                        ->where('date', $request->date)
                        ->first();

        if ($attendance && is_null($attendance->check_out)) {
            $attendance->update([
                'check_out' => date('H:i:s'),
            ]);
        }

        return redirect()->route('attendances.index');
    }
}
