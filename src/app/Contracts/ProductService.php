<?php

namespace App\Contracts;

/**
 * Interface ProductService
 *
 * @package App\Contracts
 */
interface ProductService
{
    /**
     * Get all
     *
     * @return \App\Models\Product[]
     */
    public function getAll();

    /**
     * Find record
     *
     * @param  string|int $id
     * @param  bool $skipPresenter
     * @return mixed
     */
    public function find(int $id, bool $skipPresenter = false);


    /**
     * Paginate
     *
     * @param  int|null $limit
     * @param  array $columns
     * @param  string $method
     * @return mixed
     */
    public function paginate($limit = null, array $columns = ['*'], $method = 'paginate');

    /**
     * Find by id
     *
     * @param  int $id
     * @return mixed
     */
    public function findById(string $id);

}
