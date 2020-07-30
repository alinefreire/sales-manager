<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomerNotFoundException extends NotFoundHttpException
{

    public function __construct($message = "Customer não encontrado!") {
        parent::__construct($message);
    }
}
