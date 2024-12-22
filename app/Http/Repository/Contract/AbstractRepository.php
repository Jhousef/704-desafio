<?php

namespace App\Http\Repository\Contract;

use App\Http\Repository\Contract\interfaceRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AbstractRepository implements interfaceRepository
{
    protected $model;

    public function all(): Collection{
        try {
            return $this->model->all();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function find(int $id): object {
        try {
            return $this->model->find($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function store(array $data): Model {
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update(array $data, int $id): object {
        try {
            return $this->model->find($id)->update($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function delete(int $id): void {
        try {
            $this->model->where('id', $id)->delete();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
