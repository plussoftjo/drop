<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\doc;
use Auth;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;
class docController extends Controller
{
    public function store(Request $req)
    {
        $image = $req->get('image');
        $fileNameImage = Carbon::now()->timestamp . uniqid() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        Image::make($req->get('image'))->save(public_path('images/docs/').$fileNameImage);
        
        $doc = doc::create([
            'user_id' => 2,
            'folder_id' => $req->folder_id,
            'image' => 'images/docs/'.$fileNameImage,
            'note' => 'null'
        ]);

        return response()->json($doc);
        
    }
}
