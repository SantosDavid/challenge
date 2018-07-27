<?php

namespace App\Console\Commands;

use App\Models\UploadCustomer;
use Services\Customers\StrategyFactory;
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
        foreach (UploadCustomer::waiting()->get() as $upload) {
            $fileContext = StrategyFactory::make($upload->type);
        }
    }
}
