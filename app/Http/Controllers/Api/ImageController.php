<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Image;

class ImageController extends Controller
{
    public function StoreImage(Request $request)    {
        $image = $request->file('file');
        $imageName = uniqid().$image->getClientOriginalName();
        $image = Storage::disk('spaces')->putFileAs('image', $image, $imageName,'public');
        $imageUpload = new Image();
        $imageUpload->image = $imageName;
        $imageUpload->save();
        
        return response()->json($imageUpload->image);
    }
}
