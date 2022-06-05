<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateAlbumRequest;
use App\Http\Requests\FindAlbumRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlbumController extends Controller
{
    
    public function Index():View
    {
        return view('album/index');
    }

    public function List(FindAlbumRequest $request):View
    {
        $keyword = $request->safe()->keyword;
        $data = Album::with('tracks')->whereHas('tracks', function($q) use ($keyword)
        {
            $q->where('name', 'like', '%'.$keyword.'%');
            $q->orWhere('track_name', 'like', '%'.$keyword.'%');
        })->get();
        // dd($data);
       
        return view('album/index',[
            'album' => $data,
            
        ]);
    }

    public function Create():View
    {
        return view('album/create');
    }

    public function Store(CreateAlbumRequest $request):RedirectResponse 
    {

        $data = $request->validated();
        $album = Album::create($data);

        return redirect('/discografia');
    }

    public function Delete(int $id) {
        
    }
}
