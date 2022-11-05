<?php

namespace App\Http\Controllers;

use App\Services\AlbumService;
use App\Models\Album;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateAlbumRequest;
use App\Http\Requests\FindAlbumRequest;
use Illuminate\View\View;

class AlbumController extends Controller
{
    protected $service;
    public function __construct(AlbumService $service)
    {
        $this->service = $service;
    }

    public function index():View
    {
        return view('album/index');
    }

    public function list(FindAlbumRequest $request):View
    {
        $keyword = $request->safe()->keyword;
        $album = Album::with('tracks')->where('name', 'like', '%'.$keyword.'%')->get();

        return view('album/index',[
            'album' => $album,
        ]);
    }

    public function create():View
    {
        return view('album/create');
    }

    public function store(CreateAlbumRequest $request):RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);
        return to_route('discografia')->with('message', 'album cadastrado com sucesso!');
    }

    public function delete(int $id):RedirectResponse
    {
        $this->service->destroy($id);
        return to_route('discografia');
    }
}
