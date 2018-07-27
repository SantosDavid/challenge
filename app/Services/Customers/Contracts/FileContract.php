<?php

namespace Services\Customers\Contracts;

abstract class FileContract
{
    protected $file;

    public function setFile(string $file)
    {
        $this->file = $file;
    }

    abstract public function getNextLine();
}