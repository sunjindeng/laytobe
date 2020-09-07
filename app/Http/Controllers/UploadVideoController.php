<?php

namespace App\Http\Controllers;

use App\Models\Channels;
use Illuminate\Http\Request;

class UploadVideoController extends Controller
{

    public function index(Channels $channels)
    {
        return view('channels.upload', ['channels' => $channels]);
    }

    public function store(Channels $channels)
    {
        return $channels->videos()->create([
            'title' => request()->title,
            'path' => request()->video->store("channel/{$channels->id}"),
            'channels_id'=>request()->channels_id
        ]);
    }
}
