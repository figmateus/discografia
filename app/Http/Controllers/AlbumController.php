<?php

namespace App\Http\Controllers;

use App\Models\Album;
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
        $album = $request->safe()->only('album');
        dd($album[0]);
        $result = Album::where('name', 'LIKE', '%' . $album . '%');
        dd($result);
        return view('album/index');
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

    public function Edit(int $id):View
    {
        return view('album/edit');
    }

    public function Update(int $id, Request $request) {

    }

    public function Delete(int $id) {
        
    }
}
