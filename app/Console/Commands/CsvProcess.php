<?php

namespace App\Console\Commands;

use DB;
use App\Models\UploadCustomer;
use App\Models\Customer;
use Illuminate\Console\Command;
use Services\Customers\FileContext;
use Services\Customers\StrategyFactory;
use Helpers\Customer as Helper;

class CsvProcess extends Command
{
    protected $signature = 'CsvProcess';

    protected $description = 'Command to process csv input customer';

    private $helper;

    public function __construct(Helper $helper)
    {
        parent::__construct();

        $this->helper = $helper;
    }

    public function handle()
    {
        foreach (UploadCustomer::waiting()->get() as $upload) {
            $this->process(StrategyFactory::make($upload->type), $upload);
        }
    }

    private function process(FileContext $strategy, UploadCustomer $upload)
    {
        $strategy->setFile($upload->file);
        
        while ($row = $strategy->getNextLine()) {
          
            DB::beginTransaction();
            
            $customer = $this->helper->format($row);

            Customer::create($customer);
        }
    }
}
