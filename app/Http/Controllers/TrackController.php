<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrackRequest;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackController extends Controller
{
    
    public function create():View
    {
        $album = Album::all();
        return view('track/create',[
            'album' => $album
        ]);
    }

    public function store(CreateTrackRequest $request):RedirectResponse 
    {
        $data = $request->validated();
        $track = Track::create([
            'track_name' => $data['track_name'],
            'album_id' => $data['album'],
            'position' => $data['position'],
            'duration' => $data['duration']
        ]);
        return to_route('discografia');
    }

    public function delete(int $id):RedirectResponse
    {
        $track = Track::find($id);
        $track->delete();
        return to_route('discografia');
    }
}
