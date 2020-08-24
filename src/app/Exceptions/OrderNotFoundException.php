<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderNotFoundException extends NotFoundHttpException
{

    public function __construct($message = "Pedido não encontrado!")
    {
        parent::__construct($message);
    }
}
