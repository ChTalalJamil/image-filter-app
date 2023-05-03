<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $imagePath;

    public function __construct($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    public function handle()
    {
        $image = Image::make(storage_path('app/' . $this->imagePath));
        $image->greyscale();
        $image->blur(10);
        $path = $image->save(public_path('processed-image.jpg'));
        $this->nextJob($path);
    }

    protected function nextJob($imagePath)
    {
        $job = (new ProcessGrayscale($imagePath))->onQueue('image-processing');
        dd($job);
        dispatch($job);
    }

 
}

?>