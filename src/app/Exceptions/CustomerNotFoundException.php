<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomerNotFoundException extends NotFoundHttpException
{

    public function __construct($message = "Cliente não encontrado!")
    {
        parent::__construct($message);
    }
}
