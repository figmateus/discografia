<?php

namespace App\Services;
use App\Repositories\AlbumRepositoryInterface;

class AlbumService
{
    private $repository;

    public function __construct(AlbumRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $payload)
    {
        return $this->repository->store($payload);
    }

    public function getAlbums()
    {
        return $this->repository->getAlbums(10);
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
