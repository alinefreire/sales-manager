<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\SalesOrderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SalesOrderPresenter
 *
 * @package App\Repositories\Presenters
 */
class SalesOrderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SalesOrderTransformer();
    }
}
