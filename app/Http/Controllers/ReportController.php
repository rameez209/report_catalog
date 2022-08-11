<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
     // Show all reports
     public function index() {
         return view('reports.index', [
             'reports' => report::latest()->filter(request(['department', 'search']))->get(),
             'departments' => DB::table('departments')->select('departments')->orderBy('departments', 'asc')->distinct()->get(),
            ]);
        }
 
     // Show single report
     public function show(report $report) {
         return view('reports.show', [
             'report' => $report
         ]);
     }

     // Show create form
    public function create()
    {
        return view('reports.create');
    }

    // Store report data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'report_name' => 'required',
            'key_terms' => 'nullable', // optional
            // 'Department' => ['required', Rule::unique('reports', 'Department')],
            'Department' => ['required'],
            'validated_by' => 'required',
            'frequency' => ['required'],
            'updated_by' => 'required',
            'description' => 'required',
            'run_report_description' => 'nullable', // Descriptions for how to run the report (optional)
            'data_extract_location_link' => 'nullable', // Link for data extract location (optional)
            'data_extract_location_screenshot' => 'nullable', // Screenshot for data extract location (optional)
            'report_example_screenshot' => 'nullable', // screenshot for report example (optional)
        ]);

        // Uploading the image to the report database
        if ($request->hasFile('screenshot')) {
            $formFields['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
        }
        if ($request->hasFile('data_extract_location_screenshot')) {
            $formFields['data_extract_location_screenshot'] = $request->file('data_extract_location_screenshot')->store('screenshots', 'public');
        }
        if ($request->hasFile('report_example_screenshot')) {
            $formFields['report_example_screenshot'] = $request->file('report_example_screenshot')->store('screenshots', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Report::create($formFields);

        return redirect('/')->with('success', 'Report added successfully!');
    }

    // Show Edit Form
    public function edit(Report $report) {
        return view('reports.edit', ['report' => $report]);
    }

    // Update report data
    public function update(Request $request, report $report)
    {
        // // Make sure logged in user is owner
        // if($report->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }
        
        $formFields = $request->validate([
            'report_name' => 'required',
            'key_terms' => ['nullable'],
            'Department' => ['required'],
            'validated_by' => 'required',
            'frequency' => ['required'],
            'updated_by' => 'required',
            'description' => 'required',
            'run_report_description' => 'nullable', // Descriptions for how to run the report (optional)
            'data_extract_location_link' => 'nullable', // Link for data extract location (optional)
            'data_extract_location_screenshot' => 'nullable', // Screenshot for data extract location (optional)
            'report_example_screenshot' => 'nullable', // screenshot for report example (optional)
        ]);

        if ($request->hasFile('screenshot')) {
            $formFields['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
        }
        if ($request->hasFile('data_extract_location_screenshot')) {
            $formFields['data_extract_location_screenshot'] = $request->file('data_extract_location_screenshot')->store('screenshots', 'public');
        }
        if ($request->hasFile('report_example_screenshot')) {
            $formFields['report_example_screenshot'] = $request->file('report_example_screenshot')->store('screenshots', 'public');
        }

        $report->update($formFields);

        return back()->with('success', 'Report Updated Successfully!');
        // return redirect("/")->with('success', 'Report updated successfully!');
    }

    // Delete report
    public function destroy(report $report) {

        // // Make sure logged in user is owner
        // if($report->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

        $report->delete();
        return redirect('/')->with('success', 'Report Deleted Successfully!');
    }

    // Manage report
    public function manage() {
        return view('reports.manage', ['reports' => auth()->user()->reports()->get()]);
        // return view('reports.manage', ['reports' => auth()->user()->reports->get()]);
    }
}
