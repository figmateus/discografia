<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface AlbumRepositoryInterface
{
    public function __construct(Model $model);
    public function store(array $payload);
    public function getAlbums();
    public function get(int $id);
    public function search(string $search);
    public function destroy(int $id);
}
