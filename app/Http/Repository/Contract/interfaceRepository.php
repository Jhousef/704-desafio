<?php

namespace App\Http\Repository\Contract;

use Illuminate\Support\Collection;

interface interfaceRepository {
    public function all(): Collection;
    public function find(int $id): object;
    public function store(array $data): object;
    public function update(array $data, int $id): object;
    public function delete(int $id): void;
}
