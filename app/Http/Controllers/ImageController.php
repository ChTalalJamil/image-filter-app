<?php
namespace App\Http\Controllers;

use App\Jobs\ProcessBlur;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file('image');
        if ($image) {
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('images', $filename);
            ProcessBlur::dispatch($path);
            return redirect()->route('display-image')->with('success', 'Image uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Please select an image to upload.');
    
    }

    
}
