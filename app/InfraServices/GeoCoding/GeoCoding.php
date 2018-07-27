<?php

namespace InfraServices\GeoCoding;

use GuzzleHttp\Client;
use InfraServices\GeoCoding\Contracts\GeoCodingContract;

class GeoCoding implements GeoCodingContract
{
    protected $baseRequest;

    public function __construct()
    {
        $this->baseRequest = new Client([
            'base_uri' => config('url') . config('format'),
        ]);
    }

    public function getGeocoding(string $address): array
    {
        $response = $this->baseRequest->request('GET', '?address' . $address);

        dd($response);
    }
}
