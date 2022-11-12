<?php

namespace App\Repositories;

use App\Models\Track;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class TrackRepository implements TrackRepositoryInterface
{
    public function __construct(Model $model)
    {
        $this->model = new Track();
    }

    public function store(array $payload):bool
    {
        $track = $this->model->create($payload);

        if(!$track){
            throw new \Exception("Algo deu errado ao criar uma track");
        }
        return true;
    }

    public function getTracks():LengthAwarePaginator
    {
        return $this->model->paginate($track = 10);
    }

    public function get(int $id):Track
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $payload):Track
    {
        $track = $this->model->find($id);
        $track->update($payload);
        $track->save();
        return $track;
    }

    public function destroy(int $id):bool
    {
        $track = $this->model->find($id);
        $track->delete();
        return true;
    }
}
