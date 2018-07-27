<?php

namespace Services\Customers;

use Services\Customers\Contracts\FileContract;

class CsvStrategy extends FileContract
{
    private $handle = false;

    public function getNextLine()
    {
        if ($this->handle === false) {
            $this->handle = fopen(storage_path(). '/app/' . $this->file, "r");
        }
        
        return fgetcsv($this->handle, 1000, ",");
    }
}