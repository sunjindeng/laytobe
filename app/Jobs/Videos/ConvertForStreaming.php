<?php

namespace App\Jobs\Videos;

use App\Models\Videos;
use mysql_xdevapi\Exception;
use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use FFMpeg\Format\Video\X264;

class ConvertForStreaming implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $video;
    public $tries = 10;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Videos $videos)
    {
        $this->video = $videos;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $low = (new X264('aac'))->setKiloBitrate(100);
//        $mid = (new X264('aac'))->setKiloBitrate(250);
//        $high = (new X264('aac'))->setKiloBitrate(500);
//
//        FFMpeg::fromDisk('local')
//            ->open($this->video->path)
//            ->exportForHLS()
//            ->addFormat($low)
//            ->addFormat($mid)
//            ->addFormat($high)
//            ->save("public/videos/{$this->video->id}/{$this->video->id}.m3u8");
        $x264 = new X264('aac');
        $lowBitrate = $x264->setKiloBitrate(250);
        $midBitrate = $x264->setKiloBitrate(500);
        $highBitrate = $x264->setKiloBitrate(1000);
        try {
            FFMpeg::fromDisk('local')
                ->open($this->video->path)
                ->exportForHLS()
//            ->setSegmentLength(10) // optional
                ->addFormat($lowBitrate)
                ->addFormat($midBitrate)
                ->addFormat($highBitrate)
                ->save("public/videos/{$this->video->id}/{$this->video->id}.m3u8");
        }catch ( \Exception $exception){
            var_dump($exception->getTraceAsString());
        }

    }
}
