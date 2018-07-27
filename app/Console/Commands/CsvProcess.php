<?php

namespace App\Console\Commands;

use DB;
use App\Models\UploadCustomer;
use App\Models\Customer;
use Illuminate\Console\Command;
use Services\Customers\FileContext;
use Services\Customers\StrategyFactory;
use Helpers\Customer as Helper;
use InfraServices\GeoCoding\Contracts\GeoCodingContract;

class CsvProcess extends Command
{
    protected $signature = 'CsvProcess';

    protected $description = 'Command to process csv input customer';

    private $helper;

    private $geoCoding;

    public function __construct(Helper $helper, Customer $customer, GeoCodingContract $geoCoding)
    {
        parent::__construct();

        $this->helper = $helper;
        $this->fieldsName = $customer->getFieldsName();

        $this->geoCoding = $geoCoding;
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
          
            $values = array_slice($row, 0, count($this->fieldsName));
            
            $customer = array_combine($this->fieldsName, $values);
            
            DB::beginTransaction();

            $customer = Customer::create($this->helper->format($customer));

            $address = array_slice($row, count($this->fieldsName));

            dd($this->geoCoding->getGeocoding($address));
        }
    }
}
