<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;

class ProcessBlur implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function handle()
    {
        $blurImage = Image::make(storage_path('app/' . $this->image));
        // $blurImage->greyscale();
        $blurImage->blur(10);
        $path = public_path('blur-image.jpg');
        $blurImage->save($path);
        $this->dispatchNextJob($this->image);
        
    }

    public function dispatchNextJob($path)
    {
        ProcessRotate::dispatch($path);
    }
}


        // $job = new ProcessRotate($path);
        // $this->dispatch($job);
