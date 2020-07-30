<?php


namespace App\Contracts;


interface UpdateCustomerService
{
    public function update(string $id, array $attributes);
}
