<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProxyController extends Controller
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
        $response = Http::get('https://x.fuckrkn.club/api/proxies');
        $proxies = $response->json();

        return view('proxies', ['proxies' => $proxies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proxies_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $response = Http::post('https://x.fuckrkn.club/api/proxies', [
            'type' => $input['type'],
            'server' => $input['server'],
            'port' => $input['port'],
            'login' => $input['login'],
            'password' => $input['password'],
            'country' => $input['country'],
        ]);

        return redirect()->route('proxies.index')->withSuccess('Proxy created successfully.');
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
        $response = Http::get('https://x.fuckrkn.club/api/proxies/' . $id);
        $proxy = $response->object();

        return view('proxies_edit', ['proxies' => $proxy]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        $response = Http::put('https://x.fuckrkn.club/api/proxies/' . $id, [
            'type' => $input['type'],
            'server' => $input['server'],
            'port' => $input['port'],
            'login' => $input['login'],
            'password' => $input['password'],
            'country' => $input['country'],
        ]);
        $proxy = $response->object();

        // return to show post URL
        return redirect()->route('proxies.index')->withSuccess('Proxy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('https://x.fuckrkn.club/api/proxies/' . $id);
    }
}
