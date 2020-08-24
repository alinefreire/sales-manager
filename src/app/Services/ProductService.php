<?php

namespace App\Services;

use App\Contracts\ProductService as ProductServiceContract;
use App\Exceptions\ProductNotFoundException;
use App\Models\Product;
use App\Repositories\ProductRepository as ProductRepositoryContract;
use App\Support\CrudService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Prettus\Repository\Exceptions\RepositoryException;
use Throwable;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService extends CrudService implements ProductServiceContract
{

    /**
     * @var ProductRepositoryContract
     */
    protected ProductRepositoryContract $repository;

    /**
     * ProductService constructor.
     * @param  ProductRepositoryContract  $repository
     */
    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return Product[]|LengthAwarePaginator|Collection|mixed
     * @throws RepositoryException
     */
    public function getAll(): array
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->repository->all();
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
     * @param  bool  $criteria
     * @return LengthAwarePaginator|Collection|mixed
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
     * @return Product
     * @throws Throwable
     */
    public function findById(string $id): Product
    {
        return throw_unless(parent::findById($id), new ProductNotFoundException());
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
