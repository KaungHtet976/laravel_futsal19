<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::all();
        return view('videos.index',compact('videos'));
    }

    public function show($id){
        $video = Video::findOrFail($id);

       
        return view('videos.show',compact('video'));

    }

    public function download($id)
{
    $video = Video::findOrFail($id);
    $filePath = storage_path('app/public/' . $video->video);

    if (file_exists($filePath)) {
        return response()->download($filePath);
    }

    return redirect()->back()->with('error', 'File not found.');
}



}
