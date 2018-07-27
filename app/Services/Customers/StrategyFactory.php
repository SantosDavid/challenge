<?php

namespace Services\Customers;

class StrategyFactory
{
    private const NAMESPACE = '\Services\Customers\\';

    private const SLUG = 'Strategy';

    public static function make(string $class) : FileContext
    {
        $class =  Self::NAMESPACE . ucfirst($class) . Self::SLUG;
      
        return new FileContext(new $class);
    }
}