<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
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
        $Order = Order::all();

        return view('orders', ['orders' => $Order]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->amount = $request->amount ?? 1;
        $order->type = $request->order_type;
        $order->attempts = $request->attempts;
        $order->delay_min = $request->delay_min;
        $order->delay_max = $request->delay_max;
        $order->app_name = $request->app_name;
        $order->app_bundle = $request->app_bundle;
        $order->delete = $request->delete ?? 0;
        // $order->url = $request->url;
        // $order->like = $request->like;
        $order->share = $request->share;
        $order->minutes = $request->minutes;
        $order->seconds = $request->seconds;

        $order->retention = $request->retention;
        $order->country = $request->country;
        $order->fill_type = $request->fill_type;
        $order->open_time = $request->open_time;

        if ($request->order_type == 'tiktok') {
            $order->url = $request->tiktok_url;
            $order->like = $request->tiktok_like;
        }

        if ($request->order_type == 'youtube') {
            $order->url = $request->youtube_url;
            $order->like = $request->youtube_like;
        }

        if ($request->order_type == 'install') {
            $order->deeplink_page = $request->deeplink_page ?? 0;
        }

        // if ($request->order_type == 'install') {
        //     $order->backup_email_button = "recovery email";
        //     $order->backup_code_button = "backup code";
        //     $order->another_method_button = "another way";
        //     $order->search_field = "Search";
        //     $order->search_scroll = "Refine your search";
        //     $order->install_button = "Install";
        // }

        $order->save();
        $lastInsertedId = $order->id;

        $insert = [
            // 'unit_id' => 666,
            'order_id' => $lastInsertedId,
            'amount' => $request->amount ?? 1,
            'type' => $request->order_type,
            'attempts' => $request->attempts,
            'delay_min' => $request->delay_min,
            'delay_max' => $request->delay_max,
            'app_name' => $request->app_name,
            'app_bundle' => $request->app_bundle,
            'delete' => $request->delete,
            // 'url' => $request->url,
            // 'like' => $request->like,
            'share' => $request->share,
            'minutes' => $request->minutes,
            'seconds' => $request->seconds,

            'retention' => $request->retention,
            'country' => $request->country,
            'fill_type' => $request->fill_type,
            'open_time' => $request->open_time,
        ];

        if ($request->order_type == 'tiktok') {
            $insert['url'] = $request->tiktok_url;
            $insert['like'] = $request->tiktok_like;
        }

        if ($request->order_type == 'youtube') {
            $insert['url'] = $request->youtube_url;
            $insert['like'] = $request->youtube_like;
        }

        $insert['backup_email_button'] = 'recovery email';
        $insert['backup_code_button'] = 'backup code';
        $insert['another_method_button'] = 'another way';
        $insert['search_field'] = 'Search';
        $insert['search_scroll'] = ($request->search_term_null == 1) ? null : 'Refine your search';
        $insert['install_button'] = 'Install';
        $insert['confirm_button'] = 'confirm';
        $insert['ok_button'] = 'ok_button';

        if ($request->order_type == 'install') {
            $insert['search_term'] = $request->search_term ?? $request->app_name;
            $insert['deeplink_page'] = $request->deeplink_page ?? 0;
        }

        $response = Http::post('https://x.fuckrkn.club/api/tasks', $insert);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete order in database
        Order::where('id', $id)->delete();

        // delete tasks
        $response = Http::delete('https://x.fuckrkn.club/api/orders/' . $id);
    }
}
