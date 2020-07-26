<?php

namespace App\Support\Database\Contracts;

interface Crud
{
    /**
     * Get all
     *
     * @return mixed
     */
    public function all();

    /**
     * Get paginate
     *
     * @param int $limit
     * @param $columns
     * @param string $method
     *
     * @return mixed
     */
    public function paginate($limit = null, array $columns = ['*'], $method = 'paginate');

    /**
     * Get by id
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Create a new resource
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update resource
     *
     * @param array $attributes
     * @param int $id
     *
     * @return mixed
     */
    public function update(array $attributes, int $id);

    /**
     * Delete resource
     *
     * @param int $id
     *
     * @return mixed
     */
    public function delete(int $id);
}
