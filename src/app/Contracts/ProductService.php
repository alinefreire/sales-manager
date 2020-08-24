<?php

namespace App\Contracts;

use App\Models\Product;

/**
 * Interface ProductService
 *
 * @package App\Contracts
 */
interface ProductService
{

    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * Paginate
     *
     * @param  int|null  $limit
     * @param  array  $columns
     * @param  string  $method
     * @return array
     */
    public function paginate($limit = null, array $columns = ['*'], $method = 'paginate'): array;

    /**
     * @param  false  $criteria
     * @return array
     */
    public function paginateByCriteria($criteria = false): array;


    /**
     * Find by id
     *
     * @param  string  $id
     * @return mixed
     */
    public function findById(string $id): Product;


    /**
     * @param  string  $id
     * @return bool
     */
    public function deleteById(string $id): bool;


}
