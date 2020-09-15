<?php

namespace App\Http\Controllers;

use App\Jobs\Videos\ConvertForStreaming;
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
        $video = $channels->videos()->create([
            'title' => request()->title,
            'path' => request()->video->store("channel/{$channels->id}"),
        ]);
        //视频转码，任务分发
        $this->dispatch(new ConvertForStreaming($video));
        return $video;
    }
}
