<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface TrackRepositoryInterface
{
    public function __construct(Model $model);
    public function store(array $payload);
    public function getTracks();
    public function get(int $id);
    public function destroy(int $id);
}
