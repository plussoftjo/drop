<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\folder;
use Auth;
class FolderController extends Controller
{
    public function store(Request $req) {
        $folder = folder::create([
            'user_id' => Auth::id(),
            'title' => $req->title,
            'note' => $req->note
        ]);
        return response()->json($folder);
    }

    public function index() {
        $folder = folder::where('user_id',Auth::id())->get();
        return response()->json($folder);
    }
}
