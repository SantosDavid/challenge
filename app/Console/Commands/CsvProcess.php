<?php

namespace App\Console\Commands;

use App\Models\Csv;
use Illuminate\Console\Command;

class CsvProcess extends Command
{
    protected $signature = 'CsvProcess';

    protected $description = 'Command to process csv input customer';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        foreach (Csv::waiting()->get() as $file) {
           

        }
    }
}
