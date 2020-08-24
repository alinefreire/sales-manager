<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductNotFoundException extends NotFoundHttpException
{

    public function __construct($message = "Produto não encontrado!")
    {
        parent::__construct($message);
    }
}
