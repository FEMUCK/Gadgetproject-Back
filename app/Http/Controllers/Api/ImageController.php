<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;

class ImageController extends Controller
{
    public function StoreImage(Request $request)    {
        $image = $request->file('file');
        $imageName = uniqid().$image->getClientOriginalName();
        $image->move(public_path('/storage/'),$imageName);
        $imageUpload = new Image();
        $imageUpload->image = $imageName;
        $imageUpload->save();
        
        return response()->json($imageUpload->image);
    }
}
