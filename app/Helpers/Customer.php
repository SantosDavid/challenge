<?php

namespace Helpers;

use Carbon\Carbon;
use App\Models\Customer as Model;

class Customer
{
    private $fieldsName;

    public function __construct(Model $customer)
    {
        $this->fieldsName = $customer->getFieldsName();
    }

    public function format(array $row): array
    {
        $values = array_slice($row, 0, count($this->fieldsName));
            
        $customer = array_combine($this->fieldsName, $values);
      
        $this->formatBirthDay($customer);
        $this->formatCpf($customer);
       
        return $customer;
    }

    private function formatBirthDay(&$customer)
    {
        $customer['birthday'] = Carbon::createFromFormat('d/m/y', $customer['birthday'])->format('Y-m-d');
    }

    private function formatCpf(&$customer)
    {
        $customer['cpf'] = preg_replace('/[\.-]/i', '', $customer['cpf']);
    }
}
