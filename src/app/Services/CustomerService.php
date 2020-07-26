<?php

namespace App\Services;

use App\Repositories\CustomerRepository as CustomerRepositoryContract;
use App\Support\CrudService;
use App\Contracts\CustomerService as CustomerServiceContract;

class CustomerService extends CrudService implements CustomerServiceContract
{

    protected CustomerRepositoryContract $repository;

    public function __construct(CustomerRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function getAll()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->repository->all();
    }

    /**
     * Paginate by link status criteria.
     *
     * @param int|null $limit
     * @param array $columns
     * @param string $method
     *
     * @return mixed
     */
    public function paginate($limit = null, array $columns = ['*'], $method = 'paginate')
    {
        return $this->repository
            ->orderBy('name')
            ->paginate($limit);
    }

    /**
     * Paginate by link status criteria.
     *
     * @param int|null $limit
     * @param array $columns
     * @param string $method
     *
     * @return mixed
     */
    public function paginateByCriteria($criteria = false)
    {
        $this->repository->resetCriteria();

        if ($criteria){
            return $this->repository->findByName($criteria)->orderBy('name')
                ->paginate(null);
        }

        return $this->repository->orderBy('name')
            ->paginate(null);
    }

    /**
     * Find by name
     *
     * @param  String  $name
     * @return mixed
     */
    public function findByName(String $name)
    {
        return $this->repository->findByName($name);
    }

    /**
     * Reset criteria'
     *
     * @return $this
     */
    public function resetCriteria()
    {
        $this->repository->resetCriteria();

        return $this;
    }

}
