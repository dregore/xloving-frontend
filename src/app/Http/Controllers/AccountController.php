<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
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
        $response = Http::get('https://x.fuckrkn.club/api/accounts');
        $accounts = $response->json();

        return view('accounts', ['accounts' => $accounts]);
    }

    public function create()
    {
        $accountsType = $this->accountsType;

        return view('accounts_create', [
            'types' => $accountsType,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_type' => 'required',
            'account_email' => 'required|email',
            'account_password' => 'required',
            'country' => 'required',
        ]);

        $response = Http::post('https://x.fuckrkn.club/api/accounts', [
            'type' => $request->account_type,
            'email' => $request->account_email,
            'password' => $request->account_password,
            'country' => $request->country,
            'backup_email' => $request->account_backup ?? null,
        ]);

        return redirect()->route('accounts.index')->withSuccess('Account created successfully.');
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
        $accountsType = $this->accountsType;

        $response = Http::get('https://x.fuckrkn.club/api/accounts/' . $id);
        $account = $response->object();

        return view('accounts_edit', [
            'accounts' => $account,
            'types' => $accountsType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put('https://x.fuckrkn.club/api/accounts/' . $id, [
            'type' => $request->account_type,
            'email' => $request->account_email,
            'password' => $request->account_password,
            'country' => $request->country,
            'backup_email' => $request->account_backup ?? null,
        ]);
        $account = $response->object();

        // return to show post URL
        return redirect()->route('accounts.index')->withSuccess('Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('https://x.fuckrkn.club/api/accounts/' . $id);
    }
}
