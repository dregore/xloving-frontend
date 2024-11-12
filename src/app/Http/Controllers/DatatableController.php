<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DatatableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    var $accountsType = [
        'google',
        'tiktok',
        'youtube',
    ];

    public function index()
    {
        // $response = Http::get('https://x.fuckrkn.club/api/accounts');
        // $accounts = $response->json();

        // return view('datatables', ['accounts' => $accounts]);
        return view('datatables');
    }

    public function serverside(Request $request)
    {
        // $response = Http::post('https://x.fuckrkn.club/api/test/', [
        //     'length' => $request->length,
        //     'start' => $request->start,
        //     'draw' => $request->draw
        // ]);
        $response = Http::post(
            'https://x.fuckrkn.club/api/accounts/serverside/',
            $request
        );
        $accounts = $response->json();

        return $accounts;
    }
}
