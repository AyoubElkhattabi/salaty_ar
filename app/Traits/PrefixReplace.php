<?php
namespace App\Traits;

use App\Models\CityPrefix;
use App\Models\CountryPrefix;

trait PrefixReplace{
    function prefixReplace($cityOrCountry,$city, $country){
    $cityPrefix='city';
    $countryPrefix='country';
    if($cityOrCountry === 'city')
    {
        $info = CityPrefix::where('language','AR')->first();
        $title = str_replace(
            array($countryPrefix,$cityPrefix),
            array($country,$city),
            $info->title
        );
        $description = str_replace(
            array($countryPrefix,$cityPrefix),
            array($country,$city),
            $info->description
        );
        $keywords = str_replace(
            array($countryPrefix,$cityPrefix),
            array($country,$city),
            $info->keywords
        );
    }
    else if($cityOrCountry === 'country'){
        $info = CountryPrefix::where('language','AR')->first();
        $title = str_replace($countryPrefix,$country,$info->title);
        $description = str_replace($countryPrefix,$country,$info->description);
        $keywords = str_replace($countryPrefix,$country,$info->keywords);
    }



    return [
        'title'=> $title,
        'description' => $description,
        'keywords'=> $keywords,
            ];
    }
}
