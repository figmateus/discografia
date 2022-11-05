<?php

namespace App\Services;


use App\Repositories\TrackRepositoryInterface;

class TrackService
{
    private $repository;

    public function __construct(TrackRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $payload)
    {
        return $this->repository->store($payload);
    }

    public function getTracks()
    {
        return $this->repository->getTracks(10);
    }

    public function get(int $id)
    {
        return $this->repository->get($id);
    }

    public function update(int $id,array $payload)
    {
        return $this->repository->update($id, $payload);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
