<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\MaintenanceRequest;
use App\Models\Guest;
use PDF;

class ReportController extends Controller
{
    /**
     * Display the report generation page.
     */
    public function index()
    {
        return view('reports.index');
    }

    /**
     * Generate a monthly report.
     */
    public function generate(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        $month = $request->month;

        $houses = House::all();
        $maintenanceRequests = MaintenanceRequest::whereMonth('created_at', date('m', strtotime($month)))
            ->whereYear('created_at', date('Y', strtotime($month)))
            ->get();

        $guests = Guest::whereMonth('check_in_time', date('m', strtotime($month)))
            ->whereYear('check_in_time', date('Y', strtotime($month)))
            ->get();

        $data = [
            'month' => $month,
            'houses' => $houses,
            'maintenanceRequests' => $maintenanceRequests,
            'guests' => $guests,
        ];

        $pdf = PDF::loadView('reports.pdf', $data);
        return $pdf->download('monthly_report_' . $month . '.pdf');
    }
}
