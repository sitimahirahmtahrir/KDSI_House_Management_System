<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the reports.
     */
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new report.
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created report in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:10240', // Restrict to PDFs with a max size of 10MB
        ]);

        $filePath = $request->file('file')->store('reports');

        Report::create([
            'title' => $validatedData['title'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }

    /**
     * Show the specified report.
     */
    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    /**
     * Download the specified report file.
     */
    public function download(Report $report)
    {
        if (Storage::exists($report->file_path)) {
            return Storage::download($report->file_path);
        }

        return redirect()->route('reports.index')->with('error', 'File not found.');
    }

    /**
     * Show the form for editing the specified report.
     */
    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified report in storage.
     */
    public function update(Request $request, Report $report)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // Delete the old file
            if (Storage::exists($report->file_path)) {
                Storage::delete($report->file_path);
            }

            // Store the new file
            $filePath = $request->file('file')->store('reports');
            $report->file_path = $filePath;
        }

        $report->title = $validatedData['title'];
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    /**
     * Remove the specified report from storage.
     */
    public function destroy(Report $report)
    {
        if (Storage::exists($report->file_path)) {
            Storage::delete($report->file_path);
        }

        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }
}
