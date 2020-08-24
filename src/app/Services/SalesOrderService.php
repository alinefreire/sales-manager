<?php

namespace App\Services;

use App\Contracts\SalesOrderService as SalesOrderServiceContract;
use App\Exceptions\OrderNotFoundException;
use App\Models\SalesOrder;
use App\Repositories\SalesOrderRepository;
use App\Support\CrudService;
use Throwable;

/**
 * Class SalesOrderService
 * @package App\Services
 */
class SalesOrderService extends CrudService implements SalesOrderServiceContract
{

    /**
     * @var SalesOrderRepository
     */
    protected SalesOrderRepository $repository;

    /**
     * SalesOrderService constructor.
     * @param  SalesOrderRepository  $repository
     */
    public function __construct(SalesOrderRepository $repository)
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
     * @return SalesOrder
     * @throws Throwable
     */
    public function findById(string $id): SalesOrder
    {
        return throw_unless(parent::findById($id), new OrderNotFoundException());
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
