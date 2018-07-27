<?php

namespace Helpers;

use Carbon\Carbon;
use App\Models\Customer as Model;

class Customer
{
    public function format(array $customer): array
    { 
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
