<?php

namespace App\Http\Controllers;

use App\Services\AlbumService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateAlbumRequest;
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

        $albums = $this->service->getAlbums();
        return view('album.index', compact('albums'));
    }

    public function search(Request $request):View
    {
        $search = $request->search;
        $albums = $this->service->search($search);
        return view('album.search',compact('albums'));
    }

    public function create():View
    {
        return view('album.create');
    }

    public function store(CreateAlbumRequest $request):RedirectResponse
    {
        $payload = $request->validated();
        $this->service->store($payload);
        return to_route('discografia')->with(['message' => 'album cadastrado com sucesso!', 'alert' => 'alert-success']);
    }

    public function show(int $id)
    {
        $album = $this->service->get($id);
        return view('album.show', compact('album'));
    }

    public function delete(int $id):RedirectResponse
    {
        $this->service->destroy($id);
        return to_route('discografia')->with(['message' => 'album deletado com sucesso!', 'alert' => 'alert-success']);
    }
}
