<?php


namespace App\Contracts;


interface UpdateProductService
{
    public function update(string $id, array $attributes);
}
