<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;

class ProcessRotate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function handle()
    {
        $rotImage = Image::make(storage_path('app/' . $this->image));
        $rotImage->rotate(45);
        $path = public_path('rotate-image.jpg');
        $rotImage->save($path);
        $this->dispatchNextJob($this->image);
    }

    public function dispatchNextJob($image)
    {
        ProcessGrayscale::dispatch($image);
    }
}

