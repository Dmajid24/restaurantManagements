<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsStaff;
use App\Models\StaffPosition;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = DB::table('msstaff')
            ->join('staffPosition', 'msstaff.staffPositionID', '=', 'staffPosition.staffPositionID')
            ->select(
                'msstaff.staffID',
                'msstaff.staffName',
                'msstaff.staffEmail',
                'staffPosition.staffPosition',
                'staffPosition.staffPositionID'
            )
            ->paginate(10);

        $today = now()->format('l, d F Y');

        return view('staff', [
            'staffs' => $staffs,
            'today' => $today
        ]);
    }

    public function create()
    {
        $positions = StaffPosition::all();
        return view('staff-create', compact('positions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staffID' => 'required|unique:msstaff,staffID',
            'staffName' => 'required|string|max:255',
            'staffEmail' => 'required|email|unique:msstaff,staffEmail',
            'staffPositionID' => 'required|exists:staffPosition,staffPositionID'
        ]);

        MsStaff::create($validated);

        return redirect()->route('staff.index')
                        ->with('success', 'Staff created successfully');
    }
}
