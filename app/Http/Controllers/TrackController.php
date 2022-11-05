<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrackRequest;
use App\Services\AlbumService;
use App\Services\TrackService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TrackController extends Controller
{
    protected $trackService;
    protected $albumService;

    public function __construct(TrackService $trackService, AlbumService $albumService)
    {
        $this->trackService = $trackService;
        $this->albumService = $albumService;
    }

    public function create():View
    {
        $albums = $this->albumService->getAlbums();
        return view('track/create',[
            'albums' => $albums
        ]);
    }

    public function store(CreateTrackRequest $request):RedirectResponse
    {
        $payload = $request->validated();
        $this->trackService->store($payload);
        return to_route('discografia')->with('message', 'Faixa cadastrada com sucesso!');
    }

    public function delete(int $id):RedirectResponse
    {
        $this->trackService->destroy($id);
        return to_route('discografia')->with('message', 'Faixa deletada com sucesso!');
    }
}
