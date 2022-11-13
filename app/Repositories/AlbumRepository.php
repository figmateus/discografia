<?php

namespace App\Repositories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Track;

class AlbumRepository implements AlbumRepositoryInterface
{
    public function __construct(Model $model)
    {
        $this->model = new Album();
    }

    public function store(array $payload):bool
    {
        if(!$this->model->create($payload)){
         throw new \Exception("Algo deu errado ao criar o album");
        }
        return true;
    }

    public function getAlbums():LengthAwarePaginator
    {
        return $this->model->paginate($albums = 5);
    }

    public function get(int $id):Album
    {
        return $this->model->find($id);
    }

    public function search($search):LengthAwarePaginator
    {
        return $this->model->with('tracks')->where('name', 'like', '%'.$search.'%')->paginate($albums = 5);
    }

    public function destroy(int $id):bool
    {
        $albums = $this->model->find($id);
        $albums->delete();
        return true;
    }
}
