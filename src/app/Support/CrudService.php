<?php

namespace App\Support;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

/**
 * abstract Class CrudService
 *
 * @package App\Support
 */
abstract class CrudService
{
    /**
     * Get all
     *
     * @return mixed
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Get paginate
     *
     * @param  null  $limit
     * @param  array  $columns
     * @param  string  $method
     * @return mixed
     */
    public function paginate($limit = null, array $columns = ['*'], $method = 'paginate')
    {
        return $this->repository->skipPresenter()->paginate($limit, $columns, $method);
    }

    /**
     * Find by id
     *
     * @param  int  $id
     * @param  bool  $skipPresenter
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function find($id, $skipPresenter = true)
    {
        if ($skipPresenter) {
            $model = $this->repository->skipPresenter()->find($id);
        } else {
            $model = $this->repository->find($id);
        }

        if (!$model) {
            throw new ModelNotFoundException(
                sprintf('Class model %s not found.', get_called_class())
            );
        }

        return $model;
    }

    /**
     * Find by id
     *
     * @param  int  $id
     * @return mixed
     */
    public function findById(string $id)
    {
        return $this->repository->skipPresenter()->findByField('_id', $id)->first();
    }

    /**
     * Delete model
     *
     * @param  int  $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return DB::transaction(function () use ($id) {
            return $this->repository->delete($id);
        });
    }
}
