<?php

namespace Services\Customers;

use Services\Customers\Contracts\FileContract;

class FileContext
{
    private $fileStrategy;

    public function __construct(FileContract $file)
    {
        $this->fileStrategy = $file;
    }
}