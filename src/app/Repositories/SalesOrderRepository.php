<?php

namespace App\Repositories;

use App\Contracts\SalesOrderRepository as SalesOrderRepositoryContract;
use App\Models\SalesOrder;
use App\Repositories\Presenters\SalesOrderPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SalesOrderRepository.
 *
 * @package namespace App\Repositories;
 */
class SalesOrderRepository extends BaseRepository implements SalesOrderRepositoryContract
{

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByName(string $name): SalesOrder
    {
        return SalesOrder::where('name', 'like', '%'.$name.'%');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SalesOrder::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return SalesOrderPresenter::class;
    }

}
