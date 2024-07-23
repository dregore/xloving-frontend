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
}
