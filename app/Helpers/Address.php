<?php

namespace Helpers;

class Address
{
    public function format($address, $geoCoding) : array
    {    
        $zipCode = count($address) -1;
        
        return [
            'number' => $address[0]->long_name,
            'address' => $address[1]->long_name,
            'neighborhood' => $address[2]->long_name,
            'city' => $address[3]->long_name,
            'latitude' => $geoCoding->lat,
            'longitude' => $geoCoding->lng,
            'zipcode' => preg_replace('/[-]/i', '', $address[$zipCode]->long_name),
        ];
    }
}