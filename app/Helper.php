<?php
use Illuminate\Support\Str;

if (! function_exists('getSupportedConfigTypes')) {
    function getSupportedConfigTypes($implodeKey = false) {
        return \App\Models\Configuration::getSupportedTypes($implodeKey);
    }
}

if (! function_exists('getConfig')) {
    function getConfig(string $key) {
        return \App\Models\Configuration::where('key', $key)->first()->value_cast ?? '';
    }
}

if (! function_exists('chatWa')) {
    function chatWa(string $phone) {
        $phone = Str::replaceFirst('+62', '62', $phone);
        
        if (Str::startsWith($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        return "https://api.whatsapp.com/send?phone={$phone}";
    }
}
