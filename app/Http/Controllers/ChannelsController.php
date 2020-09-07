<?php

namespace App\Http\Controllers;

use App\Http\Requests\Channels\UpdateChannelRequest;
use App\Models\Channels;
use App\Models\Videos;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(Channels $channel)
    {
        return view('channels.show',compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(UpdateChannelRequest $request, Channels $channel)
    {
        if($request->hasFile('image')){
            //删除之前上传的所有图片
            $channel->clearMediaCollection('image');
            //上传图像并且入库
            $channel->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }
        $channel->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
