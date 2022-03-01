<?php
namespace App\Models\Traits\CurrentLocation;

use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;

trait  CurrentLocation{
    function userCurrentLocation(){
         /*$ip = request()->ip(); Dynamic IP address */
         $ip = '1.187.168.0'; /* Static IP address */
        return Location::get($ip);


        // @if($location)
        //         <h4>IP: {{ $location->ip }}</h4>
        //         <h4>Country Name: {{ $location->countryName }}</h4>
        //         <h4>Country Code: {{ $location->countryCode }}</h4>
        //         <h4>Region Code: {{ $location->regionCode }}</h4>
        //         <h4>Region Name: {{ $location->regionName }}</h4>
        //         <h4>City Name: {{ $location->cityName }}</h4>
        //         <h4>Zip Code: {{ $location->zipCode }}</h4>
        //         <h4>Latitude: {{ $location->latitude }}</h4>
        //         <h4>Longitude: {{ $location->longitude }}</h4>
        //     @endif
    }

}