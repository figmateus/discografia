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
    
    public function Create():View
    {
        $album = Album::all();
        return view('track/create',[
            'album' => $album
        ]);
    }

    public function Store(CreateTrackRequest $request):RedirectResponse 
    {
        $data = $request->validated();
        $track = Track::create([
            'track_name' => $data['track_name'],
            'album_id' => $data['album'],
            'position' => $data['position'],
            'duration' => $data['duration']
        ]);
        if($track){

        }

        return redirect('/discografia');
    }

    public function Delete(int $id):RedirectResponse
    {
        $track = Track::find($id);
        $track->delete();
        return redirect('/discografia')->with();
    }
}
