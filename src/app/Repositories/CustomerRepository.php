<?php

namespace App\Repositories;

use App\Contracts\CustomerRepository as CustomerRepositoryContract;
use App\Models\Customer;
use App\Repositories\Presenters\CustomerPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

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

    public function findByName(string $name): Customer
    {
        return Customer::where('name', 'like', '%'.$name.'%');
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
