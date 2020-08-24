<?php

namespace App\Providers;

use App\Contracts\CreateCustomerService as CreateCustomerServiceContract;
use App\Contracts\CreateProductService as CreateProductServiceContract;
use App\Contracts\CreateSalesOrderService as CreateSalesOrderServiceContract;
use App\Contracts\CustomerRepository as CustomerRepositoryContract;
use App\Contracts\CustomerService as CustomerServiceContract;
use App\Contracts\ProductRepository as ProductRepositoryContract;
use App\Contracts\ProductService as ProductServiceContract;
use App\Contracts\SalesOrderRepository as SalesOrderRepositoryContract;
use App\Contracts\SalesOrderService as SalesOrderServiceContract;
use App\Contracts\UpdateCustomerService as UpdateCustomerServiceContract;
use App\Contracts\UpdateProductService as UpdateProductServiceContract;
use App\Contracts\UpdateSalesOrderService as UpdateSalesOrderServiceContract;
use App\Repositories\CustomerRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SalesOrderRepository;
use App\Services\CreateCustomerService;
use App\Services\CreateProductService;
use App\Services\CreateSalesOrderService;
use App\Services\CustomerService;
use App\Services\ProductService;
use App\Services\SalesOrderService;
use App\Services\UpdateCustomerService;
use App\Services\UpdateProductService;
use App\Services\UpdateSalesOrderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomerRepositoryContract::class, CustomerRepository::class);
        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);
        $this->app->bind(SalesOrderRepositoryContract::class, SalesOrderRepository::class);
        $this->app->bind(CustomerServiceContract::class, CustomerService::class);
        $this->app->bind(CreateCustomerServiceContract::class, CreateCustomerService::class);
        $this->app->bind(UpdateCustomerServiceContract::class, UpdateCustomerService::class);
        $this->app->bind(ProductServiceContract::class, ProductService::class);
        $this->app->bind(CreateProductServiceContract::class, CreateProductService::class);
        $this->app->bind(UpdateProductServiceContract::class, UpdateProductService::class);
        $this->app->bind(SalesOrderServiceContract::class, SalesOrderService::class);
        $this->app->bind(CreateSalesOrderServiceContract::class, CreateSalesOrderService::class);
        $this->app->bind(UpdateSalesOrderServiceContract::class, UpdateSalesOrderService::class);
    }
}
