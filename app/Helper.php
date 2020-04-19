<?php

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
