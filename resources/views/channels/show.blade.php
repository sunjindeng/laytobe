@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $channel->name }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('channels.update',$channel->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row justify-content-center">
                                <div onclick="document.getElementById('image')" class="channel-avatar">

                                </div>
                            </div>
                            <input name="image" id="image" type="file">
                            <div class="form-group">
                                <label for="name" class="form-control-label">
                                    频道名
                                </label>
                                <input id="name" type="text" value="{{ $channel->name }}" class="form-control"
                                       name="name">
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-control-label">
                                    频道描述
                                </label>
                                <textarea name="description" id="description"
                                          {{--cols="30" rows="10" --}}class="form-control">
                                    {{$channel->description}}
                                </textarea>
                                <button class="btn btn-info" type="submit">
                                    保存
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
