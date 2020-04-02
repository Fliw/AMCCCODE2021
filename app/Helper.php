<?php

if (! function_exists('getSupportedConfigTypes')) {
    function getSupportedConfigTypes($implodeKey = false) {
        return \App\Models\Configuration::getSupportedTypes($implodeKey);
    }
}
