<?php

namespace App\Services;

use App\Contracts\CustomerRepository;
use App\Contracts\CustomerService as CustomerServiceContract;
use App\Exceptions\CustomerNotFoundException;
use App\Models\Customer;
use App\Support\CrudService;
use Throwable;

/**
 * Class CustomerService
 * @package App\Services
 */
class CustomerService extends CrudService implements CustomerServiceContract
{

    /**
     * @var CustomerRepository
     */
    protected CustomerRepository $repository;

    /**
     * CustomerService constructor.
     * @param  CustomerRepository  $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Paginate by link status criteria.
     *
     * @param  int|null  $limit
     * @param  array  $columns
     * @param  string  $method
     *
     * @return mixed
     */
    public function paginate($limit = null, array $columns = ['*'], $method = 'paginate'): array
    {
        return $this->repository
            ->orderBy('name')
            ->paginate($limit);
    }

    /**
     * Paginate by link status criteria.
     *
     * @param  bool  $criteria
     * @return array
     */
    public function paginateByCriteria($criteria = false): array
    {
        $this->repository->resetCriteria();

        if ($criteria) {
            return $this->repository->findByName($criteria)->orderBy('name')
                ->paginate(null);
        }

        return $this->repository->orderBy('name')
            ->paginate(null);
    }

    /**
     * @param  string  $id
     * @return bool
     * @throws Throwable
     */
    public function deleteById(string $id): bool
    {
        return $this->findById($id)->delete();
    }

    /**
     * @param  string  $id
     * @return Customer
     * @throws Throwable
     */
    public function findById(string $id): Customer
    {
        return throw_unless(parent::findById($id), new CustomerNotFoundException());
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
