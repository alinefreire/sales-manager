<?php

namespace App\Contracts;

/**
 * Interface CustomerService
 *
 * @package App\Contracts
 */
interface CustomerService
{
    /**
     * Get all
     *
     * @return \App\Models\Customer[]
     */
    public function getAll();

    /**
     * Find record
     *
     * @param  string|int $id
     * @param  bool $skipPresenter
     * @return mixed
     */
    public function find($id, $skipPresenter = true);


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
    public function findById($id);

}
