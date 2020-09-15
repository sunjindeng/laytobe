@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <channels-upload :channel="{{ $channels }}" inline-template>

                <div class="col-md-8">
                    <div class="card p-3 d-flex justify-content-center align-items-center" v-if="!selected">
                        <svg style="cursor: pointer" onclick="document.getElementById('video-files').click()" t="1599443652864" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2199" width="64" height="64" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style type="text/css"></style></defs><path d="M512 167.04C71.706 167.04 64 206.195 64 512s7.706 344.96 448 344.96S960 817.805 960 512s-7.706-344.96-448-344.96z m143.584 359.923l-201.152 93.901c-17.606 8.154-32.032-0.986-32.032-20.429v-176.87c0-19.398 14.426-28.582 32.032-20.429l201.152 93.901c17.606 8.243 17.606 21.683 0 29.926z" fill="#FD021C" p-id="2200"></path></svg>
                        <p>视频上传</p>
                        <input type="file" multiple ref="videos" style="display: none" id="video-files" @change="upload">
                    </div>
                    <div class="card p-3" v-else>
                        <div class="my-4 " v-for="video in videos" >
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" :style="{width: `${progress[video.name]}%`}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center align-items-center" style="height: 180px; color: white; font-size: 18px; background: #808080;">
                                        缩略图 ...
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="text-center">
                                        @{{ video.name }}
                                    </h4>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </channels-upload>
        </div>
    </div>
@endsection
