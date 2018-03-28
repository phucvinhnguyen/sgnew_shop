<?php
namespace App\Repository\Base;

interface RepositoryInterface
{

    public function getAll();

    public function find($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);

}