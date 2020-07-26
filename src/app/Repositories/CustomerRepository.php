<?php

namespace App\Repositories;

use App\Repositories\Presenters\CustomerPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\CustomerRepository as CustomerRepositoryContract;
use App\Models\Customer;

/**
 * Class CustomerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomerRepository extends BaseRepository implements CustomerRepositoryContract
{
    protected $fieldSearchable = [
        'name' => 'like'
    ];

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByName(string $name)
    {
        return Customer::where('name','like','%'.$name.'%');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return CustomerPresenter::class;
    }

}
