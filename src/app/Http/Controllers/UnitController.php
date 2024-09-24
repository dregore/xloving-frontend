<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Unit;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('https://x.fuckrkn.club/api/units');
        $units = $response->json();

        return view('units', ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('https://x.fuckrkn.club/api/units', [
            'unit_id' => $request->unit_id,
            'phone_model' => $request->phone_model,
            'location' => $request->location,
            'comment' => $request->comment,
            'blocked' => $request->blocked,
            'version' => $request->version,
        ]);

        return redirect()->route('units.index')->withSuccess('Unit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get('https://x.fuckrkn.club/api/units/' . $id);
        $unit = $response->object();

        return view('units_edit', ['units' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put('https://x.fuckrkn.club/api/units/' . $id, [
            'without_timestamp' => true,
            'unit_id' => $request->unit_id,
            'phone_model' => $request->phone_model,
            'location' => $request->location,
            'version' => $request->version,
            'comment' => $request->comment,
            'blocked' => $request->blocked,
        ]);
        $unit = $response->object();

        // return to show post URL
        return redirect()->route('units.index')->withSuccess('Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('https://x.fuckrkn.club/api/units/' . $id);
    }
}
