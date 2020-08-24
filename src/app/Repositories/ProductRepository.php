<?php

namespace App\Repositories;

use App\Contracts\ProductRepository as ProductRepositoryContract;
use App\Models\Product;
use App\Repositories\Presenters\ProductPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepository extends BaseRepository implements ProductRepositoryContract
{
    protected $fieldSearchable = [
        'description' => 'like'
    ];

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return ProductPresenter::class;
    }

}
