<?php

namespace App\Http\Repository\Contract;

interface interfaceRepository {
    public function all(): array;
    public function find(int $id): ?object;
    public function store(array $data): ?object;
    public function update(array $data, int $id): ?bool;
    public function delete(int $id): void;
}
