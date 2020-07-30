<?php

namespace App\Services;

use App\Exceptions\CustomerNotFoundException;
use App\Repositories\CustomerRepository as CustomerRepositoryContract;
use App\Support\CrudService;
use App\Contracts\CustomerService as CustomerServiceContract;

/**
 * Class CustomerService
 * @package App\Services
 */
class CustomerService extends CrudService implements CustomerServiceContract
{

    /**
     * @var CustomerRepositoryContract
     */
    protected CustomerRepositoryContract $repository;

    /**
     * CustomerService constructor.
     * @param  CustomerRepositoryContract  $repository
     */
    public function __construct(CustomerRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \App\Models\Customer[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
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
     * @param  string  $id
     * @return mixed
     * @throws \Throwable
     */
    public function findById(string $id)
    {
        $customer = parent::findById($id);
        throw_if(!$customer, new CustomerNotFoundException());
        return $customer;
    }

    /**
     * @param string $id
     * @return bool
     * @throws \Throwable
     */
    public function deleteById(string $id):bool
    {
        $customer = $this->findById($id,true);

        return $customer->delete();
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
