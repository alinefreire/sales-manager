<?php

namespace App\Services;

use App\Exceptions\ProductNotFoundException;
use App\Repositories\ProductRepository as ProductRepositoryContract;
use App\Support\CrudService;
use App\Contracts\ProductService as ProductServiceContract;

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
     * @return \App\Models\Product[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
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
        $Product = parent::findById($id);
        throw_if(!$Product, new ProductNotFoundException());
        return $Product;
    }

    /**
     * @param string $id
     * @return bool
     * @throws \Throwable
     */
    public function deleteById(string $id):bool
    {
        $Product = $this->findById($id,true);

        return $Product->delete();
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
