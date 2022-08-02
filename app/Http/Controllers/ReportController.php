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
            // 'key_terms' => Rule::unique('reports', 'key_terms'),
            'key_terms' => 'nullable',
            'Department' => ['required', Rule::unique('reports', 'Department')],
            // 'requested_by' => 'required',
            'validated_by' => 'required',
            'frequency' => ['required'],
            'updated_by' => 'required',
            'description' => 'required'
        ]);

        // Uploading the image to the report database
        if ($request->hasFile('screenshot')) {
            $formFields['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
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
            // 'requested_by' => 'required',
            'validated_by' => 'required',
            'frequency' => ['required'],
            'updated_by' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('screenshot')) {
            $formFields['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
        }

        $report->update($formFields);

        return back()->with('success', 'Report updated successfully!');
        // return redirect("/")->with('success', 'Report updated successfully!');
    }

    // Delete report
    public function destroy(report $report) {

        // // Make sure logged in user is owner
        // if($report->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

        $report->delete();
        return redirect('/')->with('success', 'Report deleted successfully!');
    }

    // Manage report
    public function manage() {
        return view('reports.manage', ['reports' => auth()->user()->reports()->get()]);
        // return view('reports.manage', ['reports' => auth()->user()->reports->get()]);
    }
}
