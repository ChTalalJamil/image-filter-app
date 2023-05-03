<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Intervention\Image\Facades\Image;

class ProcessGrayscale implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $processImage = Image::make(storage_path('app/' . $this->image));
        $processImage->greyscale();
        $path = public_path('process-image.jpg');
        $processImage->save($path);
        $this->dispatchNextJob($this->image);
    }

    public function dispatchNextJob($image)
    {
        DisplayImage::dispatch($image);
    }

}
