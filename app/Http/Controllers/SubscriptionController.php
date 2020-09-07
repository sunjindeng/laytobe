<?php

namespace App\Http\Controllers;

use App\Models\Channels;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Channels $channels)
    {
        return $channels->subscription()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channels $channels, Subscription $subscription)
    {
        $subscription->delete();
        return response()->json([]);
    }
}
