<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function createHistory(Request $request)
    {
        $incomingFields = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'starting' => 'required',
            'ending' => 'nullable',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        foreach ($incomingFields as $key => $value) {
            $incomingFields[$key] = strip_tags($value);
        }
        $incomingFields['ending'] = $incomingFields['ending'] === '' ? null : $incomingFields['ending'];

    
        DB::transaction(function () use ($incomingFields) {
            History::create($incomingFields);
        });
    
        return redirect("/histories");
    }
    public function index()
{
    // Fetch all records from the 'histories' table
    $Histories = History::all();

    // Pass the $Histories variable to the view
    return view('histories', ['Histories' => $Histories]);
}
public function destroy($id)
{
    // Find the record by ID and delete it
    $history = History::findOrFail($id);
    $history->delete();

    // Redirect back to the histories page
    return redirect('/histories');
}

public function edit($id)
{
    $history = History::findOrFail($id);
    return view('edit', compact('history'));
}

public function update(Request $request, $id)
{
    // Validate the request inputs
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone_number' => 'required|string|max:15',
        'starting' => 'required',
        'ending' => 'nullable',
        'subject' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Find the history record by ID
    $history = History::findOrFail($id);

    // Update the history record with validated data
    $history->full_name = $request->input('full_name');
    $history->email = $request->input('email');
    $history->phone_number = $request->input('phone_number');
    $history->starting = $request->input('starting');
    $history->ending = $request->input('ending');
    $history->subject = $request->input('subject');
    $history->description = $request->input('description');

    // Save the updated history
    $history->save();

    // Redirect to the histories index with a success message
    return redirect("/histories");
}
public function search(Request $request)
{
    $query = $request->input('search');
     $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    
    // Search logic
    $Histories = History::when($query, function($queryBuilder) use ($query) {
        $queryBuilder->where('full_name', 'LIKE', "%{$query}%")
                     ->orWhere('email', 'LIKE', "%{$query}%")
                     ->orWhere('phone_number', 'LIKE', "%{$query}%")
                     ->orWhere('subject', 'LIKE', "%{$query}%")
                     ->orWhere('description', 'LIKE', "%{$query}%");
    })
    ->when($startDate, function ($queryBuilder) use ($startDate) {
        $queryBuilder->where('starting', '>=', $startDate);
    })
    ->when($endDate, function ($queryBuilder) use ($endDate) {
        $queryBuilder->where('starting', '<=', $endDate);
    })->get();

    return view('/search', compact('Histories'));
}
}
