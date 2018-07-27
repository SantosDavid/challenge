<?php

namespace InfraServices\GeoCoding\Contracts;

interface GeoCodingContract
{
    public function getGeocoding(string $address): array;
}
