<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $response = Http::get('https://x.fuckrkn.club/api/tasks');
        $tasks = $response->json();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_type' => 'required',
            'app_name' => 'required'
        ]);

        $response = Http::post('https://x.fuckrkn.club/api/tasks', [
            'unit_id' => 666,
            'type' => $request->task_type,
            'attempts' => $request->attempts,
            'delay_min' => $request->delay_min,
            'delay_max' => $request->delay_max,
            'app_name' => $request->app_name,
            'app_bundle' => $request->app_bundle,
            'minutes' => $request->minutes,
            'seconds' => $request->seconds,
        ]);

        return redirect()->route('tasks')->withSuccess('Task created successfully.');
    }
}
