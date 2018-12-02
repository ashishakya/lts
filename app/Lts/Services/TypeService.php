<?php


namespace App\Lts\Services;


use App\Type;

class TypeService
{
    protected $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    public function getAll()
    {
        return $this->type->orderBy('id', 'asc')->get();
    }

    public function store($data)
    {
        return $this->type->create($data);
    }

    public function getLoansByTypeId($id)
    {
        return $this->type = $this->type->with(['loans'])->findOrFail($id);
    }

    public function getById($id)
    {
        return $this->type->findOrFail($id);
    }

    public function update($data, $id)
    {
        $type = $this->type->findOrFail($id);

        return $type->update($data);
    }

    public function delete($id)
    {
        return $this->type->findOrFail($id)->delete();
    }
}