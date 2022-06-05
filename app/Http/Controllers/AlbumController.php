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
    
    public function index():View
    {
        return view('album/index');
    }

    public function list(FindAlbumRequest $request):View
    {
        $keyword = $request->safe()->keyword;
        $data = Album::with('tracks')->where('name', 'like', '%'.$keyword.'%')->get();
        
        return view('album/index',[
            'album' => $data,
            
        ]);
    }

    public function create():View
    {
        return view('album/create');
    }

    public function store(CreateAlbumRequest $request):RedirectResponse 
    {

        $data = $request->validated();
        $album = Album::create($data);

        return to_route('discografia');
    }

    public function delete(int $id):RedirectResponse  
    {
        $album = Album::find($id);
        if(isset($album->tracks[0])){
            $tracks = Track::where('album_id',$id)->delete();
            $album->delete();    
        }
        $album->delete();
        return to_route('discografia');
    }
}
