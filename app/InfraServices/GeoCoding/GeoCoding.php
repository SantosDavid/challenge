<?php

namespace InfraServices\GeoCoding;

use Helpers\Address;
use GuzzleHttp\Client;
use InfraServices\GeoCoding\Contracts\GeoCodingContract;

class GeoCoding implements GeoCodingContract
{
    private $baseRequest;

    private $helper;

    public function __construct(Address $helper)
    {
        $this->helper = $helper;

        $this->baseRequest = new Client([
            'base_uri' => config('geocoding.url') . config('geocoding.format'),
        ]);
    }

    public function getGeocoding(string $address): array
    {
        $response = $this->baseRequest->request('GET', '?address=' . $address);

        $address = json_decode($response->getBody()->getContents());

        $geoCoding = $address->results[0]->geometry->location;

        $address = $address->results[0]->address_components;

        return $this->helper->format($address, $geoCoding);
    }
}
